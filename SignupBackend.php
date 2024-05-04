<?php

    # We are using SendGrid API to send emails
    # Looking for an API to validate an email address 

    require_once('DBConnection.php');
    require_once('apiKeys.php');

    // This is here to show us errors in our code in the sit has an issue
    // with something server side
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    # Grab First name
    # Grab Last Name
    # Grab Email
    # Grab Password 
    # Verify Password
    # Move to Set Username Page. Store info from 
    # above but dont save to database yet

    $conn = getDBConnection();

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
        $stmnt->bind_param("s", $email);
        // Execute the statement
        $stmnt->execute();
        // Gather results
        $result = $stmnt->get_result()->fetch_assoc();

        // Check if a row was returned
        if($result != NULL){
            header('Location: signup.php?error=email_exists');
            exit();
        }

        // Check if passwords don't match
        if($password != $retypePassword){
            header('Location: signup.php?error=password_mismatch');
            exit();
        }else{
            $hashedPassword = password_hash($passwd, PASSWORD_BCRYPT);
        }

        // Call to API passing in api key and email
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

        // Check returned value to see if the email passed is a valid email
        if ($data['deliverability'] == "UNDELIVERABLE" || $data['deliverability'] == "UNKNOWN") {
            // Invalid email
            header('Location: signup.php?error=invalid_email');
            exit();
        }

        // Start session to hold variables needed for Username Creation
        // Since we do not add to the database until the user picks a unique username
        session_start();

        // Store the data in session variables
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['email'] = $email;
        $_SESSION['hashedPassword'] = $hashedPassword;

        // Redirect to create_username.php
        header('Location: create_username.php');
        exit();

    } 