<?php
session_start();
$loginstatus = $_SESSION['loggedIn'];
?>
<!DOCTYPE HTML>
<html class="main">

<head>
    <style>
    html {
        background-color: lightgray;
    }
    </style>
    <title>E-Comm</title>
</head>
<link rel="stylesheet" href="stylesheet.css">

<body>

    <div class="center">
        <h1>Welcome to E-Comm</h1>
    </div>

    <ul class="ul">
        <li class="li"><a id="loginBtn" href="login.php">Login</a></li>
        <li class="li"><a href="profile.php">Profile</a></li>
        <li class="li"><a href="cart.php">Cart</a></li>
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

    <script>
    let x = <?php echo json_encode($loginstatus); ?>;
    if (x == true) {
        document.getElementById("loginBtn").style.visibility = "hidden";
    }
    </script>

</body>

</html>