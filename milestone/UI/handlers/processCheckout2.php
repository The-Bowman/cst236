<?php
error_reporting("E_ALL");
ini_set('display_errors', 1);

require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();
if (isset($_SESSION['cart']) && isset($_SESSION['userID'])) {
    $c = $_SESSION['cart'];
    $loginstatus = true;
} else {
    echo "Nothing in the cart yet or you are not yet logged in<br>";
    exit;
}
require_once 'validateCC.php';
include '_userAddressID.php';
$ubs = new UserBusinessService();


$items = $c->getItems();
$total = $c->getTotal();


$order = new Order(null, date("Y/m/d h:i:s"), $_SESSION['userID'], $userAddressID, $total);
$obs = new OrderBusinessService();


$user = $ubs->getUserByID($_SESSION['userID']);
$first = $user->getFirst();
$last = $user->getLast();
$total = $order->getTotal();



$orderID = $obs->checkout($order, $c);
?>

<html>

<head>
    <title>Latin Mock. Order Receipt</title>
</head>
<link rel="stylesheet" href="../views/stylesheet.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<body>

    <div class="center">
        <h1>Welcome to E-Comm</h1>
    </div>

    <ul class="ul">
        <li class="li"><a id="loginBtn" href="login.php">Login</a></li>
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
            if ($_SESSION['admin'] == 1) {
                echo "<li class='li'><a href=admin.php>Admin</a></li>";
            }
        }
        ?>
        <li class="li"><a href="../handlers/productSearchHandler.php">All Products</a></li>
    </ul>
    <div class="container">
        <h3>Order Receipt</h3>
        <p>Order number: <?php echo $orderID; ?> </p>
        <p>Order to: <?php echo $first . " " . $last; ?> </p>
        <p>Order Total: <?php echo $total; ?> </p>
    </div>

    <script>
    let x = <?php echo json_encode($loginstatus); ?>;
    if (x == true) {
        document.getElementById("loginBtn").style.visibility = "hidden";
    }
    </script>

</body>


</html>