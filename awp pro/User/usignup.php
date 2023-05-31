<?php

$con = mysqli_connect("localhost","root","","AWpecommerce");

if(isset($_POST["submit"])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    $query = "INSERT INTO logindetails(fname, lname, mail, password) VALUES ('$fname','$lname','$mail','$password')";
    $result = mysqli_query($con,$query);

    if($result)
            {
                echo "Signup complete";
				header("Location: ulogin.php");
            }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Signup</title>
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
				<form action="usignup.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="fname" placeholder="First Name" required="">
					<input type="text" name="lname" placeholder="Last Name" required="">
					<input type="email" name="mail" placeholder="Email" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button type="submit" name="submit">Sign up</button>
					<div style="font-size: medium;">
					<h6 style="font-size: 12px;color:aliceblue;padding-left:150px">Already already exist? <a href="ulogin.php" class="allg" target="_blank" rel="noopener noreferrer" style="font-size: 12px;color:cornsilk;">Login</a></h6>
					</div>
				</form>
			</div>
	</div>
</body>
</html>