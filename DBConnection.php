<?php

function getDBConnection() {
    // Database credentials
    $host = 'localhost'; // Change this to your database host
    $username = 'visualvibe'; // Change this to your database username
    $password = 'visualvibe'; // Change this to your database password
    $database = 'visualvibe'; // Change this to your database name

    // Attempt to connect to the database
    $connection = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    } else {
        //echo "Connection successful";
    }
    return $connection;
}
?>
