<?php
// Include the database connection file
//include 'LoginBackend.php';
require_once('DBConnection.php');

session_start();

$connection = getDBConnection();

// Example query
$query = "SELECT * FROM vibeUsers";
$result = mysqli_query($connection, $query);

// Check if the query was successful
if ($result) {
    // Loop through the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Print the data
        echo "ID: " . $row['id'] . " - Name: " . $row['name'] . "<br>";
    }
} else {
    // Print an error message if the query fails
    echo "Error: " . mysqli_error($connection);
}

// Close the database connection
$connection->close();
?>
