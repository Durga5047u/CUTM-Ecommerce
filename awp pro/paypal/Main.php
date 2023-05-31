<?php

    $con = mysqli_connect("localhost","root","","AWPEcommerce");
    $query = "SELECT * FROM products WHERE featured = 1";
    $featured = $con->query($query);

?>

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
    <div class="row">
         <?php 
            while($product = mysqli_fetch_assoc($featured)):
            $image = base64_encode($product['image']);
          ?>
          <!-- &nbsp; -->
        <div class="col-lg-2 col-md-3 col-sm-4" id="ecard">
          <div class="card my-2 shadow-0">
            <a class="">
              <div class="mask" >
                <div class="d-flex justify-content-start align-items-start h-100 m-2">
                  <h6><span class="badge bg-danger pt-1">New</span></h6>
                </div>
              </div>
              <div class="im">
              <img src="data:image/jpeg;base64, <?= $image ?>" class="card-img-top rounded-2" style="aspect-ratio: 1 / 1"/>
              </div>
            </a>
            <div class="card-body p-0 pt-3">
              <a href="#!" class="btn btn-light border px-2 pt-2 float-end icon-hover"><i class="fas fa-heart fa-lg px-1 text-secondary"></i></a>
              <h5 class="card-title" style="font-size:medium;">RS <?= $product['price'];?>/-</h5>
              <hr>
              <div>
              <p class="card-text ct"><?= $product['name'];?></p>
              </div>
            </div>
            <center><a class="ma" href="details.php" target="_blank" rel="noopener noreferrer">More</a></center><br>
          </div>
        </div>
        <?php endwhile; ?>
    </div>
</body>
</html>