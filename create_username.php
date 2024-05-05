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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Username - Visual Vibe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Create Username</h1>
    <p>Welcome to Visual Vibe, <?php echo $fname; ?>!</p>
    <form action="create_username.php" method="post">
        <label for="username">Choose a Username</label>
        <input type="text" id="username" name="username" required>
        <input type="submit" value="Submit">
    </form>
</body>
</html>