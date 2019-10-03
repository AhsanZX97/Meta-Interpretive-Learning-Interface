<?php
   // #!/usr/bin/php
   // Uncomment this if you're using linux
   
   
   
   // ********************************************************************************
   // ENTER CONFIGURABLE VALUES HERE *************************************************
   // ********************************************************************************
   
   
   
   // turn off verbose error reporting in prod
   //ini_set('display_errors', 'On');
   //error_reporting(E_ALL);
   
   
   // The script timeout limit, in seconds.
   set_time_limit(600);
   
   
   // The location of YAP executable, should be accessible by shell
	//   $execStr = '"C:\\Program Files (x86)\\Yap\\bin\\yap.exe"';
   $execStr = '"C:\\Program Files\\swipl\\bin\\swipl.exe"';
  
   
   // This is the working directory on the server.
   //
   // IMPORTANT #1: metagol.pl needs to be located in the parent directory of this folder. 
   //               For example, if the $dirName is set to "C:\\metagol\\temp\\", then
   //              "C:\\metagol\\" should contain metagol.pl
   //
   // IMPORTANT #2: PHP needs full read/write permissions on this folder (and everything in it)
   //
   // IMPORTANT #3: MUST end in a directory separator ("\\" for windows, "//" on linux)
   //
	//   $dirName = "C:\\metagol\\temp\\";
   $dirName = "D:\\Programming\\wamp\\www\\metagolweb\\online\\";
   
   
   
   
   
   
   
   
   
   
   // ********************************************************************************
   // DO NOT EDIT BELOW THIS LINE   **************************************************
   // ********************************************************************************
   
   
   
   
   
   
   
   
   // holds the final output
   $out = "none.";
   $txt = "Starting metagol web interface...";
   
   // set this to true if an error happens
   $err = false;
   
   // holds the list of bk predicates provided by the user
   $prims = array();
   
   // holds the list of arguments provided by the user
   $args = array();
   
   // holds the list of bk predicates and their number of arguments
   $primsNum = array();
   $primsToNums = array();
   
   // if we recieved post data, let's begin processing
   //if(isset($_POST["predicate_1"]))
   //{
      // first, validate the input.
      foreach($_POST as $name => $value)
      {
         //echo $name."=".$value."<br/>";
         
         if($name == "input")
            continue;
         else if(substr($name,0,9) == "pred_num_")
            continue;
         else if(substr($name,0,5) == "meta_")
            continue;
         else if($name == "predicate_name")
            continue;
		else if($name == "runname") // We need the execution to ignore the run name value
            continue;
         else if(!preg_match("/^[a-z][a-zA-Z_0-9]*$/", $value))
         {
            $out = "<font color='red'><br/>Validation error. (1)<br/><br/></font>";
            $err = true;
            break;
         }
      }
      if(!$err)
      {
         // validate the metarules
         $rules = array("Base: metarule([P,Q],([P,A,B]:-[[Q,A,B]]))",
         "Chain: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[R,C,B]]))",
         "Inverse: metarule([P,Q],([P,A,B]:-[[Q,B,A]]))",
         "Precon: metarule([P,Q,R],([P,A,B]:-[[Q,A],[R,A,B]]))",
         "Postcon: metarule([P,Q,R],([P,A,B]:-[[Q,A,B],[R,B]]))",
         "Tailrec: metarule([P,Q,R],([P,A,B]:-[[Q,A,C],[P,C,B]]))");
         
         $i = 1;
         while(isset($_POST["meta_".$i]))
         {
            if(!in_array($_POST["meta_".$i],$rules))
            {
               $out = "<font color='red'><br/>Validation error. (6)<br/><br/></font>";
               $err = true;
               break;
            }
            $i++;
         }
      }
      if(!$err)
      {
         // collect the bk predicates
         $i = 1;
         while(isset($_POST["pred_".$i]))
         {
            if(!isset($_POST['pred_num_'.$i]) || !($_POST['pred_num_'.$i] == "1" || $_POST['pred_num_'.$i] == "2"))
            {
               $out = "<font color='red'><br/>Validation error. (2)<br/><br/></font>";
               $err = true;
               break;
            }
            if(!in_array($_POST["pred_".$i],$prims))
            {
               array_push($prims,$_POST["pred_".$i]);
               array_push($primsNum,$_POST["pred_".$i]."/".$_POST['pred_num_'.$i]);
               $primsToNums[$_POST["pred_".$i]] = $_POST['pred_num_'.$i];
               
            }
            $i++;
         }
      }
      if(!$err)
      {
         // collect the bk arguments
         $i = 1;
         while(isset($_POST["arg_".$i]))
         {
            if(!in_array($_POST["arg_".$i],$args))
            {
               array_push($args,$_POST["arg_".$i]);
            }
            $i++;
         }
      }
      if(!$err)
      {
      
         // assemble the prolog code to execute
         $code = "";
         $code .= ":- use_module('../metagol').\n";
         $code .= "\n";
         $code .= "%% background knowledge\n";

         $i = 1;
         while(isset($_POST["bk_pred_".$i]))
         {
            if(!in_array($_POST["bk_pred_".$i],$prims) || !in_array($_POST["bk_arg1_".$i],$args) || !in_array($_POST["bk_arg2_".$i],$args))
            {
               $out = "<font color='red'><br/>Validation error. (3)<br/><br/></font>";
               $err = true;
               break;
            }
            
            $code .= $_POST["bk_pred_".$i] . "(" . $_POST["bk_arg1_".$i];
            if($primsToNums[$_POST["bk_pred_".$i]] == 1)
               $code .= ").\n";
            else
               $code .= "," . $_POST["bk_arg2_".$i] . ").\n";
            
            $i++;
         }
         
         $code .= "\n";

         $code .= "%% tell metagol to use the BK\n";
         foreach($primsNum as $prim)
            $code .= "prim(".$prim.").\n";

         $code .= "\n";

         $code .= "%% metarules\n";
         
         $i = 1;
         while(isset($_POST["meta_".$i]))
         {
            $rule = $_POST["meta_".$i];
            $rule = substr($rule, strpos($rule, ":") + 2);
            $code .= $rule;
            $code .= ".\n";
            
            $i++;
         }

         $code .= "\n";
         $code .= "%% learn from examples\n";
         
         $num = 1;
         
         $tlist = "";
         $learnStr = "";
         $learnStr .= "a :-\n";
         while(isset($_POST["predicate_".$num]))
         {
            $tlist .= "T".$num.",";
            $learnStr .= "T".$num." = [\n";
            array_push($primsNum,$_POST["predicate_".$num.""]."/2");
            
            $i = 1;
            while(isset($_POST["pos_".$num."_arg1_".$i]))
            {
               if(!in_array($_POST["pos_".$num."_arg1_".$i],$args) || !in_array($_POST["pos_".$num."_arg2_".$i],$args))
               {
                  $out = "<font color='red'><br/>Validation error. (4)<br/><br/></font>";
                  $err = true;
                  break;
               }
               $learnStr .= $_POST["predicate_".$num.""] . "(" . $_POST["pos_".$num."_arg1_".$i] . "," . $_POST["pos_".$num."_arg2_".$i] . "),\n";
               $i++;
            }
            if($i > 1)
               $learnStr = substr($learnStr, 0, -2);
            
            $learnStr .= "\n";
            $learnStr .= "]/[\n";
            $i = 1;
            while(isset($_POST["neg_".$num."_arg1_".$i]))
            {
               if(!in_array($_POST["neg_".$num."_arg1_".$i],$args) || !in_array($_POST["neg_".$num."_arg2_".$i],$args))
               {
                  $out = "<font color='red'><br/>Validation error. (5)<br/><br/></font>";
                  $err = true;
                  break;
               }
               $learnStr .= $_POST["predicate_".$num.""] . "(" . $_POST["neg_".$num."_arg1_".$i] . "," . $_POST["neg_".$num."_arg2_".$i] . "),\n";
               $i++;
            }
            if($i > 1)
               $learnStr = substr($learnStr, 0, -2);
            
            $learnStr .= "\n],\n\n";
            
            $num++;
         }
         $tlist = substr($tlist, 0, -1);
         $code .= $learnStr;
         $code .= "learn_seq([".$tlist."],Prog),\n";
         $code .= "pprint(Prog).\n";
         
         //echo str_replace("\n","<br/>",$code);
         //die();
         
         // generate a "random" filename to write our code to.
         // do not use negative numbers; swipl doesn't like hyphens in filenames
         $fileName = "testFile".mt_rand(0,2147483647);
         $fh = fopen($dirName.$fileName.".pl", 'w') or die("can't open file");
         fwrite($fh, $code);
         fclose($fh);
         
         chmod($dirName.$fileName.".pl",777);
         
         $descriptorspec = array(
            0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
            1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
            2 => array("pipe", "w"),  // stderr is a pipe that the child will write to
            //2 => array("file", $dirName."error.txt", "a") // stderr is a file to write to
         );
         
         // open the shell
         $process = proc_open('cd ' . $dirName . ' && ' . $execStr, $descriptorspec, $pipes);
         
         if(is_resource($process))
         {
            // first check if any user-entered predicates already exist (they would be system predicates).
            
            $checkPredicates = array();
            foreach($primsNum as $prim)
               array_push($checkPredicates,$prim);
            
            $predicateStr = "";
            foreach($checkPredicates as $checkPredicate)
            {
               $predicateStr = 'current_predicate('.$checkPredicate.'),format(\''.$checkPredicate.'=yes\').';
               fwrite($pipes[0], $predicateStr . PHP_EOL);
            }
            
            fclose($pipes[0]);
            $test = stream_get_contents($pipes[1]);
            //echo $test;
            
            foreach($checkPredicates as $checkPredicate)
            {
               $index = strrpos($test,$checkPredicate . "=yes");
               if($index !== FALSE)
               {
                  echo "Error: " . $checkPredicate . " already exists. Pick a new name for your predicate.<br/>";
                  $err = true;
                  $out = "";
               }
            }
            fclose($pipes[1]);
            proc_close($process);
            
            if(!$err)
            {
               // ok, run the user code.
               $process = proc_open('cd ' . $dirName . ' && ' . $execStr, $descriptorspec, $pipes);
               
               if(is_resource($process))
               {
                  fwrite($pipes[0], 'print(\'Starting metagol web interface...\\n\\n\').' . PHP_EOL);
                  fwrite($pipes[0], 'consult('.$fileName.').' . PHP_EOL);
                  // get a rough measure of the running time.
                  $time1 = microtime(true);
                  fwrite($pipes[0], 'a.' . PHP_EOL);
                  fwrite($pipes[0], 'print(\'\\nDone running metagol web interface.\').' . PHP_EOL);
                  fclose($pipes[0]);
                  $output = stream_get_contents($pipes[1]);
                  $stderr = stream_get_contents($pipes[2]);
                  fclose($pipes[2]);
                  fclose($pipes[1]);
                  proc_close($process);
                  $time2 = microtime(true);
                  
                  $runningTime = $formatted_number = number_format((float)($time2-$time1), 3, '.', '');
                  $out = "Done.<br/><br/><kbd>Running time: " . $runningTime . " seconds</kbd><br/><br/>";
                  
                  //echo $output;
                  //echo $stderr;
                  //die();
                  
                  $index = strpos($output,"Starting metagol web interface...");
                  
                  if($index !== FALSE)
                  {
                     $output = substr($output,$index);
                     
                     $cleanStr = "Done running metagol web interface.";
                     $index = strrpos($output,$cleanStr);
                     if($index !== FALSE)
                     {
                        $output = substr($output,0, $index + strlen($cleanStr));
                        $output = str_replace("\n","<BR>",htmlspecialchars($output));
                        $out .= $output;
                        
                        // check if there were any prolog errors, clean up the output and display them to the user.
                        $cleanStr3 = "ERROR!!";
                        $index = strrpos($stderr,$cleanStr3);
                        if($index !== FALSE)
                        {
                           $stderr = substr($stderr,$index);
                           $stderr = str_replace("\n","<BR>",htmlspecialchars($stderr));
                           $out .= "<BR/>".$stderr;
                        }
                     }
                     else
                     {
                        $out = "internal error: 1";
                     }
                  }
                  else
                  {
                     $out = "internal error: 2 ";
                  }
               }
               else
               {
                  $out = "internal error: 3";
               }
            }
         }
         else
         {
            $out = "internal error: 4";
         }
         
         chmod($dirName.$fileName.".pl", 0777);
         unlink($dirName.$fileName.".pl");
      }
   //}
   //else
  // {
   //   $out = "Missing predicate to learn.";
   //}
   
   echo $out;
?>

