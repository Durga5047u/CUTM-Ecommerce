<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="slide navbar signup.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="signup.css">
</head>

<style>
.allg:hover{
	color:chartreuse
}
.allg{
	text-decoration: none;
}
</style>

<body>
	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
                <form action="" method="post">
<div style="color:aliceblue">
<?php
// Create connection to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AWPecommerce";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
if(isset($_POST['submit'])){
    $email = $_POST['mail'];
    $pass = $_POST['pass'];

    // Check if username and password are not empty
    if(!empty($email) && !empty($pass)) {
	// // Sanitize username and password to prevent SQL injection attacks
	// $username = mysqli_real_escape_string($conn, $username);
	// $password = mysqli_real_escape_string($conn, $password);

	// // Hash the password to compare with the hashed password in the database
	// $hashed_password = hash('sha256', $password);

	// Prepare SQL query to check if username and hashed password exist in database
	$sql = "SELECT * FROM logindetails WHERE mail='$email' AND password='$pass'";
	$result = mysqli_query($conn, $sql);

	// Check if there is a row with the given username and hashed password
	if (mysqli_num_rows($result) == 1) {
		// Login successful, navigate to next page
		header("Location: Home.php");
		exit();
	} else {
		// Login failed, show error message
		echo "Invalid username or password";
	}
}

}

// Close connection
mysqli_close($conn);
?>
                </div>
					<label for="chk" aria-hidden="true">Login</label>
					<input type="email" name="mail" placeholder="Email" required="">
					<input type="password" name="pass" placeholder="Password" required="">
					<button type="submit" name="submit">Login</button>
                    <div style="font-size: medium;">
					<h6 style="font-size: 15px;color:aliceblue;padding-left:150px">New to Our Site <a href="usignup.php" class="allg" target="_blank" rel="noopener noreferrer" style="font-size: 12px;color:cornsilk;">Signup</a></h6>
					</div>
				</form>
			</div>
	</div>
</body>
</html>