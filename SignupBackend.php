<?php

    # We are using SendGrid API to send emails
    # Looking for an API to validate an email address 

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
        
        

    }

?>  