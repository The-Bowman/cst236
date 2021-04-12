<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Latin Mock. Order Receipt</title>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MLS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
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
                        <a class="nav-link" href="../handlers/productSearchHandler.php">All Products</a>
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
            location.href = "../handlers/logout.php";
        } else {
            location.href = "../views/login.php";
        }

    }
    </script>


</head>

<?php

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

if ($discount == "TAKE10") {
    $total = round($total - ($total * .1), 2);
}

$order = new Order(null, date("Y/m/d h:i:s"), $_SESSION['userID'], $userAddressID, $total);
$obs = new OrderBusinessService();


$user = $ubs->getUserByID($_SESSION['userID']);
$first = $user->getFirst();
$last = $user->getLast();
$total = $order->getTotal();



$orderID = $obs->checkout($order, $c);
?>



<link rel="stylesheet" href="../views/stylesheet.css">

<body>

    <div class="center">
        <h1>Receipt Confirmation</h1>
    </div>


    <h3>Order Receipt</h3>
    <table class="table table-dark table-striped table-hover">
        <tr>

            <th>Order Number</th>
            <th>Order To</th>
            <th>Total</th>

        </tr>
        <tr>
            <td> <?php echo $orderID; ?> </td>
            <td> <?php echo $first . " " . $last; ?> </td>
            <td> <?php echo $total; ?> </td>
        </tr>

    </table>


</body>


</html>