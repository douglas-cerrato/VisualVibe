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
        $stmnt->bind_param("s", $email);
        // Execute the statement
        $stmnt->execute();
        // Gather results
        $result = $stmnt->get_result()->fetch_assoc();

        // Check if a row was returned
        if($result != NULL){
            $emailAlreadyExists = true;
        }else{
            // Limited Calls to API for email validation. 
            // That is why we only call this api if we know the email is new 
            // and not in our database

            // Check if both passwords were matching
            if ($password == $retypePassword){
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                // Passwords do match, throwing final check in here to save on 
                // Tokens used for this process. This area only hits if every other
                // process has validated true for every check. 
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

            } else{
                $mismatchedPasswords = true; 
            }
        }

        // If user passed every condition
        if (!$emailAlreadyExists && !$invalidEmail && !$mismatchedPasswords){
            $informationPassed = true;
        }
    } 