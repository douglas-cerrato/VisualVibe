<?php
// Make DB Connection
require_once('DBConnection.php');
$conn = getDBConnection();
// Start the Session
session_start();

// Retrieve the data from session variables
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$hashedPassword = $_SESSION['$hashedPassword'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){
	$username = $_POST['username'];
	$sql_query = "SELECT * FROM vibeUsers WHERE Username = ?";
	$stmnt = $conn->prepare($sql_query);
	$stmnt->bind_param("s", $username);
	$stmnt->execute();
	$result = $stmnt->get_result()->fetch_assoc();

	if($result != NULL){
		$usernameTaken = true;           
	}else{
		$uniqueUsername = true;     
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Username - Visual Vibe</title>
    <link rel="stylesheet" href="./create_username.css">
</head>
<body>
   <div class="container">
	<h2>Welcome to VisualVibe <?php echo $fname;?>!</h2>
	<form id ="createusername-form" action="create_username.php" method="post">
	<h2> Choose a Username </h2>
	<input type="text" id="username" name="username" required>
	<input type="submit" value="Create">
    </form>
<?php
if($usernameTaken == true){
	echo '<p style="color: red;">Username Already Taken.... Try again!</p>';
}
if($uniqueUsername == true){
	echo '<p style="color: green;">Username Created!</p>';


	    /*
	    // Saving Data to SQL Database
	    $sql_query = "INSERT INTO vibeUsers (Email, Password, Username, firstName, lastName) VALUES (?, ?, ?, ?, ?)";
	    $stmnt = $conn->prepare($sql_query);
	    $stmnt->bind_param("ssss", $email, $hashedPassword, $username, $fname, $lname);
	    $stmnt-execute();
	     */
	echo '<meta http-equiv="refresh" content="1;url=login.php">';
	exit();
}
?>
    </div>

            /*
            // Saving Data to SQL Database
            $sql_query = "INSERT INTO vibeUsers (Email, Password, Username, firstName, lastName) VALUES (?, ?, ?, ?, ?)";
            $stmnt = $conn->prepare($sql_query);
            $stmnt->bind_param("ssss", $email, $hashedPassword, $username, $fname, $lname);
            $stmnt-execute();
            */
            
            // Go to Email Verification page
            
            exit();
        }
    ?>
 ab754639562d260996a3fcf707ec6b267cc670d1
</body>
</html>
