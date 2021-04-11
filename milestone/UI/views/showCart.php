<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();
$loginstatus = $_SESSION['loggedIn'];
?>
<html>

<!-- For whatever reason, including the header page in this file resulted in only the header being 
     able to be seen. I copied the code over and directly input into this file and the page performed
     as expected.  -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MLS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="loginBtn" onclick="loginOrOut()" style="cursor: pointer;">Login</a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="../handlers/logout.php">Logout</a>
                    </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="showCart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../handlers/productSearchHandler.php">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="adminLink" href="admin.php">Admin</a>
                </li>

            </ul>
            <form class="d-flex" action="../handlers/productSearchHandler.php">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    name="productName">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<script>
var x = <?php echo json_encode($loginstatus); ?>;
var y = <?php echo json_encode($adminStatus); ?>;
if (x == true) {
    document.getElementById("loginBtn").innerHTML = "Logout";
}
if (y != 1) {
    document.getElementById("adminLink").style.visibility = "hidden";
}

function loginOrOut() {
    if (x == true) {
        location.href = "../handlers/logout.php";
    } else {
        location.href = "login.php";
    }

}
</script>
</head>


<body>
    <?php


    $pbs = new ProductBusinessService();
    $ubs = new UserBusinessService();

    if (isset($_SESSION['cart'])) {
        $c = $_SESSION['cart'];
    } else {
        echo "Nothing in the cart yet<br>";
        exit;
    }

    if (isset($_SESSION['userID'])) {
        $userid = $_SESSION['userID'];
        $loginstatus = true;
    } else {
        echo "You are not logged in<br>";
        exit;
    }

    if ($c->getUserID() != $userid) {
        echo "This is not your cart. Please login again <br>";
        exit;
    }

    $user = $ubs->getUserByID($_SESSION['userID']);

    echo "<h2 style='text-align: center;'>Your Cart</h2>";
    echo "<h4 style='text-align: center;'>Cart for user: " . $user->getUsername() . "</h4>";
    ?>

    <!-- Original navbar being dropped in favor of bootstrap -->
    <!-- <ul class="ul">
        <li class="li"><a id="loginBtn" href="login.php">Login</a></li>
        <li class="li"><a href="index.php">Home</a></li>
        <li class="li"><a href="profile.php">Profile</a></li>
        <li class="li"><a href="showCart.php">Cart</a></li>
        <div class="search-container">
            <form action="../handlers/productSearchHandler.php">
                <input type="text" name="productName" placeholder="Search for a product name...">
                <input type="submit" value="Search">
            </form>
        </div> -->
    <?php
    // if (isset($_SESSION['loggedIn']) == true) {
    // echo "<li class='li'><a href=../handlers/logout.php>Logout</a></li>";
    // }
    ?>
    <!-- <li class="li"><a href="../handlers/productSearchHandler.php">All Products</a></li> -->
    <!-- <li class="li"><a href="../handlers/userHandler.php">All Users</a></li> -->
    <!-- </ul> -->

    <script>
    // let x = <?php echo json_encode($loginstatus); ?>;
    // if (x == true) {
    //     document.getElementById("loginBtn").style.visibility = "hidden";
    // }

    function goToCheckout() {
        location.href = "../handlers/processCheckout.php";
    }

    function goHome() {
        location.href = "index.php";
    }

    function changeCheckoutColor() {
        document.getElementById("checkout").style.backgroundColor = "green";
    }

    function revertCheckoutColor() {
        document.getElementById("checkout").style.backgroundColor = "blue";
    }
    </script>
    <div>
        <?php

        echo "<table class='table table-dark table-striped'";

        echo "<th>";

        echo "<td>Product ID</td>";
        echo "<td>Name</td>";
        echo "<td>Description</td>";
        echo "<td>Photo</td>";
        echo "<td>Quantity</td>";
        echo "<td>Price Each</td>";
        echo "<td>Subtotal</td>";
        echo "</th>";

        foreach ($c->getItems() as $product_id => $qty) {
            $product = $pbs->getProductByID($product_id);
            echo "<tr>";
            echo "<td>" . $product->getID() . "</td>";
            echo "<td>" . $product->getName() . "</td>";
            echo "<td>" . $product->getDescr() . "</td>";
            echo "<td>" . $product->getImg() . "</td>";
            echo "<td>" . $qty . "</td>";
            echo "<td>$" . $product->getPrice() . "</td>";
            echo "<td>$" . $qty * $product->getPrice() . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </div>
    <div class="center">
        <button class="goHome" onclick="goHome()">CONTINUE SHOPPING</button>
        <button class="shiver" id="checkout" onclick="goToCheckout()" onmouseover="changeCheckoutColor()"
            onmouseout="revertCheckoutColor()">CHECKOUT</button>
        <br><br>
    </div>

</body>

</html>