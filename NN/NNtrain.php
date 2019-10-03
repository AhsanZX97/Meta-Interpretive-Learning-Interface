<?php

    $file = $_FILES['file']['tmp_name'];
    $topline = strtok(file_get_contents($file), "\n");
    $newString = preg_replace('/^.+\n/', '',file_get_contents($file));
    file_put_contents($file,$newString);
    set_time_limit ( 300 ); // max run time 5 minutes (adjust as needed)

    $num_input = $_POST["num_input"]; // number of input neurons
    $num_output = $_POST["num_output"]; // number of output neurons
    $num_layers = $_POST["num_layers"]; // number of overall layer a neuron has
    $num_neurons_hidden = $_POST["num_neurons_hidden"]; // Number of neurons that will be hidden
    $desired_error = $_POST["desired_error"]; // This is the error margin which if achieved means the neuron network is 100% accurate
    $max_epochs = $_POST["max_epochs"]; // Epoch is the number of times a training data sets used for training
    $epochs_between_reports = $_POST["epochs_between_reports"]; // The number of epoch called per user function

    $ann = fann_create_standard($num_layers, $num_input, $num_neurons_hidden, $num_output);

    if ($ann) {
        echo $epochs_between_reports . " "; 
        fann_set_activation_function_hidden($ann, FANN_SIGMOID_SYMMETRIC);
        fann_set_activation_function_output($ann, FANN_SIGMOID_SYMMETRIC);
        if (fann_train_on_file($ann, $file, $max_epochs, $epochs_between_reports, $desired_error)){
            
            $saveFile = dirname(__FILE__) . "/data_float.net";
            ini_set('memory_limit', '-1') // sets  memory limit to infinite 
            fann_save($ann, $saveFile);
            $topline .= PHP_EOL . file_get_contents($saveFile);
            file_put_contents($saveFile, $topline);
            $f = fopen($saveFile, 'r');
            $line = fgets($f);
            fclose($f);
        }

        fann_destroy($ann);
    }

    echo 'All Done!' . PHP_EOL;
?>