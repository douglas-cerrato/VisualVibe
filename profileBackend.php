<?php
include_once 'DBConnection.php'; // Include the database connection function

// Connect to the database
$conn = getDBConnection();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch user information
$sql = "SELECT * FROM vibeUsers WHERE ID = 1"; // Assuming user ID 1 for now

// Perform the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result->num_rows > 0) {
    // Output data of the first row (assuming there is only one user with ID 1)
    $row = $result->fetch_assoc();
    echo "Username: " . $row["Username"] . "<br>";
    echo "Email: " . $row["Email"] . "<br>";
    // Output other user information as needed
} else {
    echo "0 results";
}

// Close the connection
$conn->close();
?>
