<?php
    // Start the Session
    session_start();

    // Retrieve the data from session variables
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $hashedPassword = $_SESSION['$hashedPassword'];

    // Unset all session variables
    session_unset();
?>