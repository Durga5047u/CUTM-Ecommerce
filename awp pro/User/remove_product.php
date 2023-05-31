<?php
    // Check if the form was submitted and the product ID is provided
    if (isset($_POST['remove_btn']) && isset($_POST['product_id'])) {
        $con = mysqli_connect("localhost", "root", "", "AWPEcommerce");

        // Check if the connection was successful
        if (mysqli_connect_errno()) {
            die("Failed to connect to MySQL: " . mysqli_connect_error());
        }

        // Get the product ID from the submitted form
        $product_id = $_POST['product_id'];

        // Delete the product from the addtocart table based on the product ID
        $query = "DELETE FROM addtocart WHERE id = $product_id";
        $result = mysqli_query($con, $query);

        if ($result) {
            // Product removed successfully, you can perform additional actions or display a success message
            echo "Product removed successfully.";
        } else {
            // Failed to remove the product, you can display an error message or perform error handling
            echo "Failed to remove the product.";
        }

        mysqli_close($con);
    } else {
        // If the form was not submitted or the product ID is not provided, redirect the user back to the cart page
        header("Location: addtocart.php");
        exit();
    }
?>