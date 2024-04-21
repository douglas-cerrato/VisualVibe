<?php
    function getDBConnection(){
        // Login Credentials
        $servername = "localhost";
        $username = "visualvibe";
        $password = "visualvibe";
        $database = "visualvibe";

        // Create Connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check Connection
        if ($conn->connect_error){
            die("Connection failed: " . $conn->connect_error);
        }
        return $conn;
    }
?>