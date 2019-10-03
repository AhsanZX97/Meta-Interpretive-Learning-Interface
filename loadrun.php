<?php 
require 'db.php';
session_start();

$run_id = 64;

if(isset($_POST['runid'])){
    $run_id = $_POST['runid'];
}

$runname = $mysqli->query("SELECT name FROM runs WHERE id = $run_id");
$arguments = $mysqli->query("SELECT arguments.arg FROM runs INNER JOIN arguments ON runs.id = arguments.run_id WHERE runs.id = $run_id");
$predicates = $mysqli->query("SELECT predicates.pred, predicates.pred_num FROM runs INNER JOIN predicates ON runs.id = predicates.run_id WHERE runs.id = $run_id");
$metarules = $mysqli->query("SELECT metarules.metarule FROM runs INNER JOIN metarules ON runs.id = metarules.run_id WHERE runs.id = $run_id");
$backgroundknowledge = $mysqli->query("SELECT backgroundknowledge.pred, backgroundknowledge.arg1, backgroundknowledge.arg2 FROM runs INNER JOIN backgroundknowledge ON runs.id = backgroundknowledge.run_id WHERE runs.id = $run_id");
$learnedpredicates = $mysqli->query("SELECT learnedpredicates.id, learnedpredicates.pred FROM runs INNER JOIN learnedpredicates ON runs.id = learnedpredicates.run_id WHERE runs.id = $run_id");


// GETTING THE RUN NAME
$jsrun = "";
while ($row = $runname->fetch_assoc()) {
	$jsrun = $row['name'];
}

// GETTING THE ARGUMENTS
$jsargs = array();
while ($row = $arguments->fetch_assoc()) {
	array_push($jsargs, $row['arg']);
    //echo $row['arg']."<br>";
}

// GETTING THE PREDICATES
$jspreds = array();
$jspredsnames = array();
$jspredsnums = array();
while ($row = $predicates->fetch_assoc()) {
	// Putting all the data into the expected order
	array_push($jspredsnames, $row['pred']);
	array_push($jspredsnums, $row['pred_num']);
}
$jspreds = array($jspredsnames, $jspredsnums);

// GETTING THE METARULES
$jsmetarules = array();
while ($row = $metarules->fetch_assoc()) {
	array_push($jsmetarules, $row['metarule']);
}

// GETTING THE BACKGROUND KNOWLEDGE
$jsbk = array();
while ($row = $backgroundknowledge->fetch_assoc()) {
	array_push($jsbk, array($row['pred'],$row['arg1'],$row['arg2']));
}

// GETTING THE LEARNED PREDICATES
$jslpreds = array();


$learnedpredicate = "";
$lpreds_id = 5;
while ($row = $learnedpredicates->fetch_assoc()) {
	$jslpred = array();
	array_push($jslpred, $row['pred']);
	$learnedpredicate = $row['pred'];
	
	$jslpos = array();
	$lpreds_id = $row['id'];
	$learnedpositives = $mysqli->query("SELECT learnedpositives.arg1, learnedpositives.arg2 FROM learnedpredicates INNER JOIN learnedpositives ON learnedpredicates.id = learnedpositives.lpred_id WHERE learnedpredicates.id = '$lpreds_id'");
	while ($row2 = $learnedpositives->fetch_assoc()) {
		array_push($jslpos, array($learnedpredicate, $row2['arg1'], $row2['arg2']));
	}
	$jslneg = array();
	$learnednegatives = $mysqli->query("SELECT learnednegatives.arg1, learnednegatives.arg2 FROM learnedpredicates INNER JOIN learnednegatives ON learnedpredicates.id = learnednegatives.lpred_id WHERE learnedpredicates.id = '$lpreds_id'");
	while ($row3 = $learnednegatives->fetch_assoc()) {
		array_push($jslneg, array($learnedpredicate, $row3['arg1'], $row3['arg2']));
	}
	// Putting all the data into the expected order
	array_push($jslpred, $jslpos);
	array_push($jslpred, $jslneg);
	array_push($jslpreds, $jslpred);
}


// Sending the array values back in JSON format
echo json_encode(array_values(array(array_values($jsargs),array_values($jspreds),array_values($jsmetarules),array_values($jsbk),array_values($jslpreds),$jsrun)));
?>
