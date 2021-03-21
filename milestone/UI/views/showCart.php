<html>

<head>

</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<link rel="stylesheet" href="stylesheet.css">


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

    <ul class="ul">
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
        if (isset($_SESSION['loggedIn']) == true) {
            echo "<li class='li'><a href=../handlers/logout.php>Logout</a></li>";
        }
        ?>
        <li class="li"><a href="../handlers/productSearchHandler.php">All Products</a></li>
        <li class="li"><a href="../handlers/userHandler.php">All Users</a></li>
    </ul>

    <script>
    let x = <?php echo json_encode($loginstatus); ?>;
    if (x == true) {
        document.getElementById("loginBtn").style.visibility = "hidden";
    }
    </script>
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
    <br>
    <div class="center">
        <button class="shiver" href=#checkout>CHECKOUT</button>
    </div>
    <br>
</body>

</html>