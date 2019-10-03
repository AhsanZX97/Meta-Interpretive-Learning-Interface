<?php
    // loads neural network by its configuration file
    $train_file = (dirname(__FILE__) . "\data_float.net");

    // gets the top line of the file for the 2 labels
    $f = fopen($train_file, 'r');
    $line = fgets($f);

    // cleans the spaces and the numbers of the top line
    $words = preg_replace('/[0-9]+/', '', $line);
    $thetextstring = preg_replace("#[\s]+#", " ", $words);
    trim($thetextstring);

    // remaining labels go into array
    $array = explode(" ", $thetextstring);
    array_shift($array);
    $array[2] = $array[1];
    fclose($f);

    // removes the top line off the float.net
    $newString = preg_replace('/^.+\n/', '',file_get_contents($train_file));
    file_put_contents($train_file,$newString);
    $ann = fann_create_from_file($train_file);
    if (!$ann)
        die("ANN could not be created");

    // corrects the array from javascript format to php format
    $JSinput = $_POST["input"];
    $input = explode(',',$JSinput);

    $calc_out = fann_run($ann, $input);

    // sends the result back to javascript
    echo $array[(int) $calc_out];
    fann_destroy($ann);
?>