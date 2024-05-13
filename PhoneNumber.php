<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="settings.css">
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
        <h1>Add/Edit Phone Number</h1>
        <form method="post">
            <label for="phone">Current Number:</label>
            <input type="text" id="currentphone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>

            <label for="phone">New Number:</label>
            <input type="text" id="newphone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>

            <label for="phone">Confirm New Number:</label>
            <input type="text" id="confirmphone" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="123-456-7890" required>

            <input type="submit" value="Save Changes">
        </form>
    </div>

</body>
</html>
