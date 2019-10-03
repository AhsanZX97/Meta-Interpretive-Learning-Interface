<?php 
require 'db.php';
session_start();

if ( isset($_SESSION['message']) ) {
	// We unset the message once the user has dismissed the alert
	unset( $_SESSION['message'] );
}
	
?>