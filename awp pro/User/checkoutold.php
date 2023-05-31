<?php
    $con = mysqli_connect("localhost", "root", "", "AWPEcommerce");

    if (isset($_POST['buynow'])) {
        $product_id = $_POST['product_id'];

        // Fetch the product details
        $query = "SELECT * FROM products WHERE id = $product_id";
        $result = $con->query($query);

        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            
            // Process the payment using a mock payment processor
            $paymentAmount = $product['price']; // Amount to be paid
            
            // Replace this with your payment gateway integration code
            // Simulating a successful payment for demonstration purposes
            $paymentSuccess = true;

            if ($paymentSuccess) {
                // Payment successful, perform necessary actions
                // such as updating order status, sending notifications, etc.

                echo "Payment successful! Thank you for purchasing " . $product['name'];
            } else {
                echo "Payment failed. Please try again.";
            }
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid request.";
    }
?>










<?php
    require 'vendor/autoload.php'; // Include the PayPal Checkout SDK

    $con = mysqli_connect("localhost", "root", "", "AWPEcommerce");

    if (isset($_POST['buynow'])) {
        $product_id = $_POST['product_id'];

        // Fetch the product details
        $query = "SELECT * FROM products WHERE id = $product_id";
        $result = $con->query($query);

        if (mysqli_num_rows($result) > 0) {
            $product = mysqli_fetch_assoc($result);
            
            // Set up PayPal environment
            $clientId = 'YOUR_PAYPAL_CLIENT_ID';
            $clientSecret = 'YOUR_PAYPAL_CLIENT_SECRET';

            $environment = new \PayPal\Core\SandboxEnvironment($clientId, $clientSecret); // Use Sandbox for testing, change to Live for production
            $client = new \PayPal\PayPalHttpClient($environment);

            // Create PayPal order
            $request = new \PayPalCheckoutSdk\Orders\OrdersCreateRequest();
            $request->prefer('return=representation');
            $request->body = [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => $product['price'],
                    ]
                ]],
            ];

            try {
                // Execute the request and get the PayPal order details
                $response = $client->execute($request);

                // Redirect the user to the PayPal approval URL
                $approvalUrl = null;
                foreach ($response->result->links as $link) {
                    if ($link->rel === 'approve') {
                        $approvalUrl = $link->href;
                        break;
                    }
                }

                if ($approvalUrl) {
                    header("Location: $approvalUrl");
                } else {
                    echo "Failed to create PayPal order.";
                }
            } catch (\PayPalHttp\HttpException $ex) {
                echo $ex->statusCode;
                echo $ex->getMessage();
            }
        } else {
            echo "Product not found.";
        }
    } else {
        echo "Invalid request.";
    }
?>