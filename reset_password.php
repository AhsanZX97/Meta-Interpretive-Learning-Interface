<?php
/* The password reset, which updates database with the users new password */
require 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    // Making sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

		// Encrypting new password
        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        
        $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Your password has been reset successfully!";
        header("location: index.php");    

        }

    }
    else {
        $_SESSION['message'] = "The two passwords entered do not match, please try again!";
        header("location: index.php");    
    }

}
?>