<?php
    require_once('DBConnection.php');

    # Grab First name
    # Grab Last Name
    # Grab Email
    # Grab Password 
    # Verify Password
    # Move to Set Username Page. Store info from 
    # above but dont save to database yet

    $conn = getDBConnection();
    $mismatchedPasswords = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from POST request
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $retypePassword = $_POST['retypePassword'];
        
        if ($password = $retypePassword){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            
            // Creating SQL Query
            
        } else{
            $mismatchedPasswords = true;
        }
    }

?>  