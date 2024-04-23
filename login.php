<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Visual Vibe</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h1>Login to Visual Vibe</h1>
        <form id="login-form">
            <input type="text" id="username" name="username" placeholder="Username or Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <div class="social-login">
            <p>or login with:</p>
            <button class="social-button" id="google-login">Google</button>
            <button class="social-button" id="facebook-login">Facebook</button>
            <button class="social-button" id="twitter-login">Twitter</button>
        </div>
    </div>
    <script src="app.js"></script>
</body>
</html>

