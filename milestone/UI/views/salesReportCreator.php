<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();
$loginstatus = $_SESSION['loggedIn'];
if ($_SESSION['admin'] != 1 && !isset($_SESSION['loggedIn'])) {
    header('location: index.php?=user_must_be_an_administrator');
}
?>
<!DOCTYPE html>
<html>

<head>
    <style>
    * {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Mock Latin. Sales Report</title>
</head>

<body>

    <div class="center">
        <h1>Sales Report Generation</h1>

    </div>

    <!-- begin nav-bar  -->
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
    <!-- end nav-bar -->

    <div>
        <h3>Select dates to generate the report</h3>
    </div>
    <div class="container42">
        <form class="inputForm" action="../handlers/processSalesReport.php" method="$_GET">
            <div class="form-group">
                <label for="startDate">Start Date:</label>
                <input class="form-control" name="startDate" type="date" required>
            </div>
            <div class="form-group">
                <label for="endDate">End Date:</label>
                <input class="form-control" name="endDate" type="date" required>
            </div>
            <div style="display: flex; justify-content: space-around; padding: 8px;">
                <a class="btn btn-light" href="index.php">Cancel</a>
                <input class="btn btn-primary" type="submit" value="Generate Report">
        </form>
    </div>
    <script>
    let x = <?php echo json_encode($loginstatus); ?>;
    if (x == true) {
        document.getElementById("loginBtn").style.visibility = "hidden";
    }
    </script>
</body>

</html>