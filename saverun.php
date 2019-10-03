<?php
   
   if(!isset($_SESSION['user_id']))
   {
      $_SESSION['message'] = "Your session has expired. Log in and try again.";
      die();
   }

$_SESSION['message'] = $user_id;
$runname = $_POST['runname'];
$run_id = "THIS IS ID";
$lpred_id = "THIS IS ID";

$sql = "INSERT INTO runs (user_id, name)
VALUES ('$user_id', '$runname')";

if ($mysqli->query($sql) === TRUE) {
    $_SESSION['message'] = "Run record created successfully";
	$run_id = $mysqli->insert_id; // Capturing the run id for the db dependencies
} else {
    $_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
}
$_SESSION['message'] = $run_id;

// Handling the Arguments
$a = 1;
while(isset($_POST["arg_".$a]))	{
	$arg = $_POST["arg_".$a];
	$sql = "INSERT INTO arguments (run_id, arg)
	VALUES ('$run_id', '$arg')";

	if ($mysqli->query($sql) === TRUE) {
		$_SESSION['message'] = "Argument record created successfully";
	} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
	}
	$a++;
}

// Handling the Metarules
$m = 1;
while(isset($_POST["meta_".$m]))	{
	$metarule = $_POST["meta_".$m];
	$sql = "INSERT INTO metarules (run_id, metarule)
	VALUES ('$run_id', '$metarule')";

	if ($mysqli->query($sql) === TRUE) {
		$_SESSION['message'] = "Metarule record created successfully";
	} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
	}
	$m++;
}

// Handling the Predicates
$p = 1;
while(isset($_POST["pred_".$p]))	{
	$pred = $_POST["pred_".$p];
	$prednum = $_POST["pred_num_".$p];
	$sql = "INSERT INTO predicates (run_id, pred, pred_num)
	VALUES ('$run_id', '$pred', '$prednum')";

	if ($mysqli->query($sql) === TRUE) {
		$_SESSION['message'] = "Predicate record created successfully";
	} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
	}
	$p++;
}


// Handling the Background Knowledge
$bk = 1;
while(isset($_POST["bk_pred_".$bk]))	{
	$bkpred = $_POST["bk_pred_".$bk];
	$arg1 = $_POST["bk_arg1_".$bk];
	$arg2 = $_POST["bk_arg2_".$bk];
	$sql = "INSERT INTO backgroundknowledge (run_id, pred, arg1, arg2)
	VALUES ('$run_id', '$bkpred', '$arg1', '$arg2')";

	if ($mysqli->query($sql) === TRUE) {
		$_SESSION['message'] = "Background knowledge record created successfully";
	} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
	}
	$bk++;
}

// Handling the Predicates to Learn
$lp = 1;
while(isset($_POST["predicate_".$lp]))	{
	$lpred = $_POST["predicate_".$lp];
	$sql = "INSERT INTO learnedpredicates (run_id, pred)
	VALUES ('$run_id', '$lpred')";

	if ($mysqli->query($sql) === TRUE) {
		$_SESSION['message'] = "Learned predicate record created successfully";
		$lpred_id = $mysqli->insert_id; // Capturing the predicate to learn id for the db dependencies

	} else {
		$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
	}
	
	
	// Positive Examples
	$pos=1;
	while(isset($_POST["pos_".$lp."_arg1_".$pos]))	{
		$arg1 = $_POST["pos_".$lp."_arg1_".$pos];
		$arg2 = $_POST["pos_".$lp."_arg2_".$pos];
		$sql = "INSERT INTO learnedpositives (lpred_id, arg1, arg2)
		VALUES ('$lpred_id', '$arg1', '$arg2')";
		
		if ($mysqli->query($sql) === TRUE) {
			$_SESSION['message'] = "Learned positive record created successfully";
		} else {
			$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
		}
		$pos++;
	}
	
	// Negative Examples
	$neg=1;
	while(isset($_POST["neg_".$lp."_arg1_".$neg]))	{
		$arg1 = $_POST["neg_".$lp."_arg1_".$neg];
		$arg2 = $_POST["neg_".$lp."_arg2_".$neg];
		$sql = "INSERT INTO learnednegatives (lpred_id, arg1, arg2)
		VALUES ('$lpred_id', '$arg1', '$arg2')";
		
		if ($mysqli->query($sql) === TRUE) {
			$_SESSION['message'] = "Learned negative record created successfully";
		} else {
			$_SESSION['message'] = "Error: " . $sql . "<br>" . $mysqli->error;
		}
		$neg++;
	}
	$lp++;
}

?>
<?php 
$_SESSION['message'] = "Run: ".$_POST['runname']." has been succesfully saved"; ?>
