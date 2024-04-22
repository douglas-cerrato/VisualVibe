<?php
// Include the database connection file
include_once 'DBConnection.php';

$connection = getDBConnection();

// Get the username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password (assuming it was hashed before storing in the database)
$hashed_password = hash('sha256', $password);

// Query to check if the username and password match
$query = "SELECT * FROM vibeUsers WHERE Username = '$username' AND Password = '$hashed_password'";

// Perform the query
$result = mysqli_query($connection, $query);

// Check if the query returned any rows
if (mysqli_num_rows($result) > 0) {
    // Authentication successful
    echo 'Login successful';
    // Redirect to a success page or perform other actions
} else {
    // Authentication failed
    echo 'Invalid username or password';
    // Redirect to a login page or perform other actions
}

// Close the database connection
mysqli_close($connection);
?>

