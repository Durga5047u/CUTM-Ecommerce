
<?php 
    // Create connection to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "awpecommerce";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $selected_option = isset($_POST['select_option']) ? $_POST['select_option'] : 'admin'; // preselect the previous selected option or select admin by default
    
    if($selected_option == 'admin') {
        $s = 'admin';
        $sql = "SELECT * FROM $s";
        $a = 'email';
    } elseif($selected_option == 'Distributor') {
        $s = 'sellerlogin';
        $sql = "SELECT * FROM $s";
        $a = 'username';
    } elseif($selected_option == 'customer') {
        $s = 'logindetails';
        $sql = "SELECT * FROM $s";
        $a = 'mail';
    }
    $result = mysqli_query($conn, $sql);
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Accounts</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto:400,700"
    />
    <!-- https://fonts.google.com/specimen/Roboto -->
    <link rel="stylesheet" href="css/fontawesome.min.css" />
    <!-- https://fontawesome.com/ -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- https://getbootstrap.com/ -->
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--
	Product Admin CSS Template
	https://templatemo.com/tm-524-product-admin
	-->
  </head>

  <body id="reportsPage">
    <div class="" id="home">
      <nav class="navbar navbar-expand-xl">
        <div class="container h-100">
          <a class="navbar-brand" href="index.php">
            <h1 class="tm-site-title mb-0">Product Admin</h1>
          </a>
          <button
            class="navbar-toggler ml-auto mr-0"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <i class="fas fa-bars tm-nav-icon"></i>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto h-100">
              <li class="nav-item">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="distributors.php">
                  <i class="fas fa-shopping-cart"></i>Distributors
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link active" href="accounts.php">
                  <i class="far fa-user"></i> Accounts
                </a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                >
                  <i class="fas fa-cog"></i>
                  <span> Settings <i class="fas fa-angle-down"></i> </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="login.php">
                  Admin, <b>Logout</b>
                </a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <form action="accounts.php" method="post">
      <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">Type of Accounts</h2>
              <p class="text-white">Accounts</p>
              <select class="custom-select" id="select_option" name="select_option">
                <option value="0">Select account</option>
                <option value="admin" <?php if($selected_option == 'admin') echo 'selected'; ?>>Admin</option>
                <option value="Distributor" <?php if($selected_option == 'Distributor') echo 'selected'; ?>>Distributor</option>
                <option value="customer" <?php if($selected_option == 'customer') echo 'selected'; ?>>Customer</option>
              </select>
            </div>
            <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block text-uppercase">
                    Refresh Details
                  </button>
            </div>
          </div>
        </div>
        <div class="container mt-5">
        <div class="row tm-content-row">
          <div class="col-12 tm-block-col">
            <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
              <h2 class="tm-block-title">List of Accounts</h2>
              <p class="text-white">Accounts</p>
              <select class="custom-select" id="select_option" name="select_option1">
              <option value="0">Select account</option>
              <?php while($res = mysqli_fetch_assoc($result)):?>
                    <option value="1"><?= $res[$a]?></option>
                    <?php endwhile;?>
              </select>
            </div>
            <div class="col-12">
                  <button name="delete" type="submit" class="btn btn-primary btn-block text-uppercase">
                    Delete the selected Account
                  </button>
            </div>
            <?php
            $s_option = isset($_POST['select_option1']);
            if($s_option == '1') {
              if(isset($_POST['delete'])) {
                $delete_data = $_POST['select_option1'];
                $delete_query = "DELETE FROM $s WHERE $a = '$delete_data'";
                $delete_result = mysqli_query($conn, $delete_query);

                if($delete_result) {
                    echo "Data deleted successfully";
                } else {
                    echo "Error deleting data";
                }
            }

            }
                
            ?>
          </div>
        </div>
        </div>
      </form>
      <footer class="tm-footer row tm-mt-small">
        <div class="col-12 font-weight-light">
          <p class="text-center text-white mb-0 px-4 small">
            Copyright &copy; <b>2018</b> All rights reserved. 
            
            Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
          </p>
        </div>
      </footer>
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
</html>
