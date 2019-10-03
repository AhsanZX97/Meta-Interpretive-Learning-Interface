<?php
/* Registration procedure. Inserts user information into the database and sends account verification email message
 */

// Setting the session variables to be used on index.php
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['user_id'] = $user['id'];

// We escape all of the $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );

// Checking if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// If the rows returned are more than 0, then we know a user with that email exists
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'A user with this email address already exists!';
    header("location: index.php");
    
}
else {

    $sql = "INSERT INTO users (first_name, last_name, email, password, hash) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash')";

    // Adding user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['active'] = 0; // Set to 0 until user activates their account
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Confirmation link has been sent to $email, please verify
                 your account by clicking on the link in the message!";

        // Send registration confirmation link to verify.php
        $to      = $email;
        $subject = 'Account Verification (Metagol Web Interface)';
        $message_body = '
        Hello '.$first_name.',

        Thank you for signing up!

        Please click the link below to activate your account:

        http://localhost/metagolweb/online/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: index.php"); 

    }

    else {
        $_SESSION['message'] = 'Registration failure!';
        header("location: index.php");
    }

}