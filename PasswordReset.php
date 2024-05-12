<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <link rel="stylesheet" href="./PasswordReset.css">
</head>
<body>
    <div class="container">
        <h2>Password Reset</h2>
        <form action="/reset-password" method="post">
            <label for="new-password">New Password</label>
            <input type="password" id="new-password" name="new-password" required>
            <label for="confirm-password">Confirm Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <input type="submit" value="Reset Password">
        </form>
    </div>
</body>
</html>
