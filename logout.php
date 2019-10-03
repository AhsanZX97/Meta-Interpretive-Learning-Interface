<?php
/* Logging out - unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
$_SESSION['message'] = "You are now logged out!";
header("location: index.php");
?>

