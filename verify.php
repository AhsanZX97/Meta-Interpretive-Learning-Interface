<?php 
/* Verification of the users email. The email sent out includes a link to this page
*/
require 'db.php';
session_start();

// Checking that the email and hash variables are set
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // SQL query to select the user with same email and hash, and an unverified account
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email' AND hash='$hash' AND active='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Your account has already been activated or the URL is invalid!";

        header("location: index.php");
    }
    else {
        $_SESSION['message'] = "Your account has now been activated!";
        
        // Setting the user status to now actived.. active = 1
        $mysqli->query("UPDATE users SET active='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['active'] = 1;
        
        header("location: index.php");
    }
}
else {
    $_SESSION['message'] = "Error when verifying account!";
    header("location: index.php");
}     
?>