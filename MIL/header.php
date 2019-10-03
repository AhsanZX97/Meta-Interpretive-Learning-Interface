<?php 
require 'db.php';
session_start();
$runs_array = array();

// If the user is logged in, then we set the variables
if (isset($_SESSION['logged_in'])) {
	$first_name = $_SESSION['first_name'];
	$last_name = $_SESSION['last_name'];
	$email = $_SESSION['email'];
	$active = $_SESSION['active'];
	$user_id = $_SESSION['user_id'];
}

// This used is the user is resetting their password
// Making sure email and hash variables aren't empty
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
	echo $email;
	echo $hash;
    // Making sure a user email with matching hash exists
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "You have entered invalid URL for password reset!";
        header("location: index.php");
    }
}
?>