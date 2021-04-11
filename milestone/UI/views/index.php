<?php
require 'header.php';
require '../../AutoLoader.php';
// session_start();
// $loginstatus = $_SESSION['loggedIn'];
?>
<!DOCTYPE HTML>
<html>

<head>

    <title>Mock Latin. Home</title>
</head>
<link rel="stylesheet" type="text/css" href="stylesheet.css">

<body>

    <div class="center">
        <h1>Welcome to the Mock Latin Store</h1>
    </div>

    <!-- <ul class="ul">
        <li class="li"><a id="loginBtn" href="login.php">Login</a></li>
        <li class="li"><a href="profile.php">Profile</a></li>
        <li class="li"><a href="showCart.php">Cart</a></li>
        <div class="search-container">
            <form action="../handlers/productSearchHandler.php">
                <input type="text" name="productName" placeholder="Search">
                <input type="submit" value="Search">
            </form>
        </div>
        <?php
        // if (isset($_SESSION['loggedIn']) == true) {
        // echo "<li class='li'><a href=../handlers/logout.php>Logout</a></li>";
        // if ($_SESSION['admin'] == 1) {
        // echo "<li class='li'><a href=admin.php>Admin</a></li>";
        // }
        // }
        ?>
        <li class="li"><a href="../handlers/productSearchHandler.php">All Products</a></li>
    </ul> -->
    <?php

    $num = rand(0, 1000);
    $pbs = new ProductBusinessService();
    $featured = $pbs->getProductByID($num);
    ?>
    <div class="container-md">
        <span class="d-block p-2 bg-success text-white" style="text-align: center;">Featured Product</span>
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <div class="card" style="width: 20rem;   margin-top: 1rem;">
                    <img src="<?php echo $featured->getImg(); ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $featured->getName(); ?></h5>
                        <p class="card-text"><?php echo $featured->getDescr(); ?></p>
                        <p class="card-text">$<?php echo $featured->getPrice(); ?></p>
                        <form action="../handlers/addToCart.php">
                            <input type="hidden" name="prod_id" value="<?php echo $featured->getID(); ?>">
                            <input class="btn btn-primary" type="submit" value="Add to Cart">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    let x = <?php //echo json_encode($loginstatus); 
                ?>;
    if (x == true) {
        document.getElementById("loginBtn").style.visibility = "hidden";
    }
    </script>

</body>

</html>