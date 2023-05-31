
<center style="color:aliceblue;">
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
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    // Check if username and password are not empty
    if(!empty($uname) && !empty($pass)) {
	$sql = "SELECT * FROM admin WHERE name='$uname' AND password='$pass'";
	$result = mysqli_query($conn, $sql);

	// Check if there is a row with the given username and hashed password
	if (mysqli_num_rows($result) == 1) {
		// Login successful, navigate to next page
		header("Location: index.php");
		exit();
	} else {
		// Login failed, show error message
		echo "Invalid Admin username or password";
	}
}

}
// Close connection
mysqli_close($conn);
?>
</center>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Open+Sans -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!-- <link rel="icon" type="image/x-icon" href="img/cutmlogo.png"> -->
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body>
    <div class="container tm-mt-big tm-mb-big">
      <div class="row">
        <div class="col-12 mx-auto tm-login-col">
          <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
            <div class="row">
              <div class="col-12 text-center">
                <h2 class="tm-block-title mb-4">Welcome to Admin Dashboard, Login</h2>
              </div>
            </div>
            <div class="row mt-2">
              <div class="col-12">
                <!-- <div>
                <center><img src="img/cutmlogo.png" alt="" ></center>
                </div> -->
                <form action="login.php" method="post" class="tm-login-form">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input
                      name="uname"
                      type="text"
                      class="form-control validate"
                      id="username"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input
                      name="pass"
                      type="password"
                      class="form-control validate"
                      id="password"
                      value=""
                      required
                    />
                  </div>
                  <div class="form-group mt-4">
                    <button
                      type="submit" name="submit"
                      class="btn btn-primary btn-block text-uppercase"
                    >
                      Login
                    </button>
                  </div>
                  <!-- <button class="mt-5 btn btn-primary btn-block text-uppercase">
                    Forgot your password?
                  </button> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
