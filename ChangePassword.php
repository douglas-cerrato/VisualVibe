<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="./settings.css">
</head>
<body>
     <header>
        <!-- Navigation bar -->
        <nav>
            <div class="logo">VisualVibe</div>
            </div>
            <!-- Other navigation links -->
            <ul class="nav-links">
                <li><a href="./explore.html">Home</a></li>
                <li><a href="./settings.php">Settings</a></li>
                <li><a href="./ChangePassword.php">Change Password</a></li>
                <li><a href="./PhoneNumber.php">Add/edit Phone Number</a></li>
                <li><a href="./signout.php">Sign Out</a></li>
                <li><a href="./delete.php">Delete Account</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h1>Change Password</h1>
        <form method="post">
            <label for="password">Current Password:</label>
            <input type="password" id="currentpassword" name="currentpassword" value="example_username" required>

            <label for="newpassword">New Password:</label>
            <input type="password" id="newpassword" name="newpassword" value="example@example.com" required>

            <label for="confirmpassword">Confirm New Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>

            <input type="submit" value="Save Changes">
        </form>
    </div>

</body>
</html>
