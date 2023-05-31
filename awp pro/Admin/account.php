<form action="account.php" method="post">
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
        $sql = "SELECT * FROM admin";
        $a = 'email';
    } elseif($selected_option == 'merchant') {
        $sql = "SELECT * FROM sellerlogin";
        $a = 'username';
    } elseif($selected_option == 'customer') {
        $sql = "SELECT * FROM logindetails";
        $a = 'mail';
    }
    $result = mysqli_query($conn, $sql);
    ?>
    <label for="select_option">Select an option:</label>
    <select id="select_option" name="select_option">
        <option value="admin" <?php if($selected_option == 'admin') echo 'selected'; ?>>Admin</option>
        <option value="merchant" <?php if($selected_option == 'merchant') echo 'selected'; ?>>Merchant</option>
        <option value="customer" <?php if($selected_option == 'customer') echo 'selected'; ?>>Customer</option>
    </select>
    <select name="" id="">
        <?php while($res = mysqli_fetch_assoc($result)):?>
            <option value=""><?= $res[$a]?></option>
        <?php endwhile;?>
    </select>
    <input type="submit" value="Submit">
</form>
