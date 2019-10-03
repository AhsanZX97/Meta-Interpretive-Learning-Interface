<?php 
require 'db.php';
session_start();

if(isset($_POST['runid'])){
    $run_id = $_POST['runid'];
	
	// SQL query to delete the run
	$sql = $mysqli->query("DELETE FROM runs WHERE id = $run_id");

	if ($mysqli->query($sql) === TRUE) {
		$_SESSION['message'] = "Run deleted successfully";
	} 
} else {
	$_SESSION['message'] = "Error deleting run!";
}

?>
