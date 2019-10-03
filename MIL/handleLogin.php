<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
	// User log in
    if (isset($_POST['login'])) { 
        require 'login.php';
    }
    
	// User registration
    elseif (isset($_POST['register'])) { 
        require 'register.php';
    }
	
	// Saving a run
	elseif (isset($_POST['saverun'])) { 
        require 'saverun.php';
    }
	
	// Dismissing a message
	elseif (isset($_POST['dismiss'])) { 
        require 'dismiss.php';
    }
	
	// Reset password
	elseif (isset($_POST['reset'])) { 
        require 'reset_password.php';
    }
}
?>