<?php 
/* Reset your password form. Sends the reset password modal link */
require 'db.php';
session_start();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User does not exist
    { 
        $_SESSION['message'] = "User with that email address does not exist!";
        header("location: index.php");
    }
    else { // User must exist

        $user = $result->fetch_assoc();
        
        $email = $user['email'];
        $hash = $user['hash'];
        $first_name = $user['first_name'];

        // Session message for the dashboard
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        // Send registration confirmation link with reset.php
        $to      = $email;
        $subject = 'Password Reset Link (Metagol Web Interface)';
        $message_body = '
        Hello '.$first_name.',

        You have requested a password reset.

        Please click the link below to reset your password:

        http://localhost/metagolweb/online/index.php#resetModal?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: index.php");
  }
}
?>
