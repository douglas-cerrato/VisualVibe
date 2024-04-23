<?php
    require_once('DBConnection.php');

    // Output errors we are having
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    $mismatchedPasswords = false;
    $accountCreated = false;
    $emailAlreadyExists = false;

    // Setting Connection
    $conn = getDBConnection();

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $passwd = $_POST['password'];
        $verify_passwd = $_POST['repassword'];
        $username = $_POST['username'];

        if ($passwd == $verify_passwd){
            $hashedPassword = password_hash($passwd, PASSWORD_BCRYPT);

            // Creating SQL Query
            $sql_query = "INSERT INTO vibeUsers (Email, Password, firsrName, lastName) VALUES (?,?,?,?)";

            // Create a prepared statement
            $stmnt = $conn->prepare($sql_query);

            // Bind the parameters to the placeholders
            $stmnt->bind_param("ssss", $email, $hashedPassword, $fname, $lname);

            try {
                // Execute the statement
                $stmnt->execute();
                $accountCreated = true;
            } catch (Exception $e) {
                // Check if the error message contains the duplicate entry error code
                if (strpos($e->getMessage(), "Duplicate entry") !== false) {
                    $emailAlreadyExists = true;
                } else {
                    // Other errors
                    die("Error inserting data: " . $e->getMessage());
                }
            }

            // Close the statement and connection
            $stmnt->close();
            $conn->close();

        } else{
            $mismatchedPasswords = true;
        }
    }
?>