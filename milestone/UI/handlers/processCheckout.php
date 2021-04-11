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
                    <a class="nav-link active" aria-current="page" href="../views/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="loginBtn" onclick="loginOrOut()" style="cursor: pointer;">Login</a>
                </li>
                <!-- <li class="nav-item">
                        <a class="nav-link" href="../handlers/logout.php">Logout</a>
                    </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../views/showCart.php">Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="productSearchHandler.php">All Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="adminLink" href="../views/admin.php">Admin</a>
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
        location.href = "logout.php";
    } else {
        location.href = "../views/login.php";
    }

}
</script>
</head>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="../views/stylesheet.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


<body>
    <?php
    require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
    session_start();

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

    echo "<h2 style='text-align: center;'>Step 1</h2>";
    echo "<h4 style='text-align: center;'>Checkout</h4>";
    ?>

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
        </div>
        <?php
        // if (isset($_SESSION['loggedIn']) == true) {
        // echo "<li class='li'><a href=../handlers/logout.php>Logout</a></li>";
        // }
        ?>
        <li class="li"><a href="../handlers/productSearchHandler.php">All Products</a></li>
        <li class="li"><a href="../handlers/userHandler.php">All Users</a></li>
    </ul> -->
    <div style="padding-left: 8px;">
        <h3>Validation info:</h3>
        <p>Name: Dean Winchester</p>
        <p>Card Number: 1234 5678 9012 3456</p>
        <p>Exp Month: 10</p>
        <p>Exp Year: 2023</p>
        <p>CCV: 123</p>
    </div>
    <script>
    let x = <?php echo json_encode($loginstatus); ?>;
    if (x == true) {
        document.getElementById("loginBtn").style.visibility = "hidden";
    }

    function returnToCart() {
        location.href = "../views/showCart.php";
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
            echo "<td>" . $product->getPrice() . "</td>";
            echo "<td>" . $qty * $product->getPrice() . "</td>";
            echo "</tr>";
        }
        ?>
    </div>
    <br>
    <div class="container" style="max-width: 500px;">
        <form action="processCheckout2.php" method="POST">
            <div class="form-group">
                <label for="owner">Enter Name on Card:</label>
                <input type="text" class="form-control" name="owner" required>
            </div>
            <div class="form-group">
                <label for="cardNum">Enter Card Number: </label>
                <input type="text" class="form-control" name="cardNum" required>
            </div>
            <div class="form-group">
                <label for="month">Enter Expiration Month: </label>
                <input type="text" class="form-control" name="month" required>
            </div>
            <div class="form-group">
                <label for="year">Enter Expiration Year: </label>
                <input type="text" class="form-control" name="year" required>
            </div>
            <div class="form-group">
                <label for="ccv">Enter CCV: </label><br>
                <input type="text" class="form-control" name="ccv" required>
            </div>
            <div class="form-group">
                <label for="discount">Got a Discount Code? Enter it here: </label><br>
                <input type="text" class="form-control" name="discount" placeholder="TAKE10...case sensitive">
            </div>
            <button type="submit" class="btn btn-default">Confirm</button>
        </form>
    </div>
    <br>
</body>

</html>