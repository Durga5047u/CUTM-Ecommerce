<?php

    $con = mysqli_connect("localhost","root","","AWPEcommerce");
    $query = "SELECT * FROM products WHERE featured = 1";
    $featured = $con->query($query);

?>

<div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <h2 class="text-center">Product Details</h2><br>
                <?php 
                    while($product = mysqli_fetch_assoc($featured)):
                    $image = base64_encode($product['image']);
                ?>
                <div class="col-md-5">
                    <h4><?= $product['name'];?></h4>
                    <img src="data:image/jpeg;base64, <?= $image ?>" alt="<?php $product['name'];?>">
                    <p class="lprice">RS <?= $product['price'];?>/-</p>
                    <p class="bname"><?= $product['brandname'];?></p>
                    <p class="desc"><?= $product['description'];?></p>
                </div><hr>
                <?php endwhile; ?>
            </div>
</div>
