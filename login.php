<?php

// Login process, checking if the username and password is correct

// To protect against SQL injections we escape the email address
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

if ( $result->num_rows == 0 ){ // The user does not exist
    $_SESSION['message'] = "User with that email doesn't exist!";
    header("location: index.php");
}
else { // The user exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['active'] = $user['active'];
		$_SESSION['user_id'] = $user['id'];
        
        // How the system knows the user is logged in
        $_SESSION['logged_in'] = true;
		$_SESSION['message'] = "You have succesfully logged in";

        header("location: index.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: index.php");
    }
}
?>

