<?php

    # We are using SendGrid API to send emails
    # Looking for an API to validate an email address 

    require_once('DBConnection.php');
    require_once('apiKeys.php');

    # Grab First name
    # Grab Last Name
    # Grab Email
    # Grab Password 
    # Verify Password
    # Move to Set Username Page. Store info from 
    # above but dont save to database yet

    $conn = getDBConnection();
    $emailAlreadyExists = false;
    $mismatchedPasswords = false;
    $invalidEmail = false;
    $informationPassed = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve data from POST request
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $retypePassword = $_POST['retypePassword'];

        // Check if email already exists in database
        $sql_query = "SELECT * FROM vibeUsers WHERE Email = ?";
        // Create a prepared statement
        $stmnt = $conn->prepare($sql_query);
        // Bind parameters
        $stmnt->bindParam(1, $email);
        // Execute the statement
        $stmnt->execute();
        // Gather results
        $result = $stmnt->fetch();

        // Check if a row was returned
        if($result){
            $emailAlreadyExists = true;
        }


        // Validating whether the email exists
        $api_key = returnAbstractApiKey();

        $ch = curl_init();

        curl_setopt_array($ch, [
            CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true
        ]);

        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response, true);

        if ($data['deliverability'] == "UNDELIVERABLE" || $data['deliverability'] == "UNKNOWN"){
            $invalidEmail = true;
        }
        
        // Check if both passwords were matching
        if ($password == $retypePassword){
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        } else{
            $mismatchedPasswords = true;
        }
    } 