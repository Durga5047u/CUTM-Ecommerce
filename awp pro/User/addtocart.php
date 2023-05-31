<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" />
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<style>
  .ct{
  font-size: 1.5rem;
}


@media screen and (min-width: 768px) {
  .ct{
    font-size: 2rem;
  }
}

@media screen and (min-width: 992px) {
  .ct{
    font-size: 2.5rem;
  }

}

  .ct{
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: medium;
    padding: 10px;
    text-size-adjust:inherit;
  }
  .im{
    width: 50;
    height: 50;
    /* aspect-ratio: 3/2; */
  }

  img{
    object-fit: contain;
  }

  /* #ecard{
    padding-left: 10px;
  } */

  body::-webkit-scrollbar{
    display: none;
  }

  .navbar-brand{
        font-weight: 700;
        background: -webkit-linear-gradient( green, orange ,green);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .btn:hover{
      border-color: orange;
    }

    .ma{
        background: -webkit-linear-gradient( green, orange);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .ma:hover{
      -webkit-text-fill-color: black;
      text-decoration: none;
    }

    ul{
        text-decoration: none;
        display: block;
        list-style: none;
    }
    li{
        display:list-item;
    }

    button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 10px;
}

    .button {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

button:hover {
  background-color: #f44336;
  color: white;
}

</style>

<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Cutm Ecommerce</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  categories
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Elecronic</a></li>
                  <li><a class="dropdown-item" href="#">E-Vehicles</a></li>
                  <!-- <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li> -->
                </ul>
              </li>
              <li>
                <a href="ulogin.php" class="nav-link" target="_blank" rel="noopener noreferrer">Signin</a>
              </li>
              <li>
                <a href="usignup.php" class="nav-link" target="_blank" rel="noopener noreferrer">Signup</a>
              </li>
              <li>
                <a href="addtocart.php" class="nav-link" target="_blank" rel="noopener noreferrer">Cart</a>
              </li>
        </div>
              <!-- <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
              </li> -->
            </ul>
            <!-- <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form> -->
          </div>
        </div>
      </nav>
      <br>
<?php
    $con = mysqli_connect("localhost", "root", "", "AWPEcommerce");
    
    // Check if the connection was successful
    if (mysqli_connect_errno()) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    
    $q = "SELECT * FROM addtocart";
    $r = mysqli_query($con, $q);
    
    while ($row = mysqli_fetch_assoc($r)) {
        $id = $row['id'];
        $query = "SELECT * FROM products WHERE id = $id";
        $featured = mysqli_query($con, $query);
    
        while ($product = mysqli_fetch_assoc($featured)) {
            $image = base64_encode($product['image']);
            ?>
            <center>
            <div class="col-md-5">
                <ul>
                    <li><img src="data:image/jpeg;base64, <?= $image ?>" alt="<?= $product['name']; ?>"></li>
                    <li><h4><?= $product['name']; ?></h4></li>
                    <li><p class="lprice">RS <?= $product['price']; ?>/-</p></li>
                    <li><p class="bname"><?= $product['brandname']; ?></p></li>
                </ul>
                <a class="ma" href="homedetails.php?id=<?php echo $id; ?>" target="_blank" rel="noopener noreferrer">More</a>
                <form method="post" action="remove_product.php">
                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                    <button type="submit" class="button" name="remove_btn">Remove</button>
                </form>
            </div>
            </center>
            <hr>
            <?php
        }
        // if(isset($_POST['rm'])){
        //     $dq = "DELETE FROM `addtocart` WHERE id = $id";
        //     $rs = mysqli_query($con,$dq);
        // }
    }
    
    mysqli_close($con);
?>
</body>
</html>