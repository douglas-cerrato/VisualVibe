<?php 
    require 'SignupBackend.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Visual Vibe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="signup-container">
        <h1>Join Visual Vibe</h1>
        <form id="signup-form" action="SignupBackend.php" method="post">
            <input type="text" id="fname" name="fname" placeholder="First Name" required>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <input type="password" id="retypePassword" name="retypePassword" placeholder="Retype Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <?php
            // Error Handling for the account creation process 
            if($emailAlreadyExists){
                echo '<p style="color: red;">Email already exists</p>';
            }
            if($invalidEmail){
                echo '<p style="color: red;">This email does not exist</p>';
            }
            if($mismatchedPasswords){
                echo '<p style="color: red;">Passwords do not match</p>';
            }
            if($informationPassed){
                header('Location: create_username.php');
            }
        ?>
    </div>
</body>
</html>

