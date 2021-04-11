<?php
session_start();
require_once 'header.php';
if ($_SESSION['admin'] != 1) {
    header('location: index.php?=user_must_be_an_administrator');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <style>

    </style>
    <title>Mock Latin. Admin</title>
</head>
<link rel="stylesheet" href="stylesheet.css">

<body>

    <div class="center">
        <h1>Welcome to E-Comm</h1>
        <h2>Admin Lounge</h2>
    </div>

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
    <!-- <li class="li"><a href="salesReportCreator.php">Sales Report</a></li> -->
    <!-- </ul> -->


    <div class="loginPos">
        <div class="formHeader">
            <h3>Add a New Product</h3>
        </div>
        <form action="../handlers/addProductHandler.php" method="POST">
            <div class="label">
                <label for="productName">Product Name: </label>
                <input type="text" name="productName" required><br><br>
                <label for="productDescr">Product Description: </label>
                <textarea name="productDescr" required></textarea><br><br>
                <label for="stock">Stock Count: </label>
                <input type="number" name="stock" min="0" required><br><br>
                <label for="price">Price: </label>
                <input type="number" name="price" min="5" max="1000" required><br><br>
                <label for="img">Image Link:</label>
                <input type="text" name="img" required><br><br>
                <input class="button" type="submit" value="Add Product">
            </div>
        </form>
    </div>
    <p>To edit an item, search for the product and select the item to
        view the product.</p>




    <div class="registerPos">
        <div class="formHeader">
            <h3>Create an Account For a New User</h3>
        </div>
        <form action="handlers/registrationHandler.php" method="POST">
            <div class="label">
                <label for="firstName">First Name: </label>
                <input type="text" name="firstName" required><br><br>
                <label for="lastName">Last Name: </label>
                <input type="text" name="lastName" required><br><br>
                <label for="email">E-Mail: </label>
                <input type="email" name="email" required><br><br>
                <label for="userName">Username: </label>
                <input type="text" name="userName" required><br><br>
                <label for="password">Enter Password: </label>
                <input type="password" name="password" required><br><br>
                <label for="confirmpass">Confirm Password: </label>
                <input type="password" name="confirmpass" required><br><br><br>
                <input style="position: absolute; left: 40%; bottom: 8px;" class="button" type="submit"
                    value="Create Account">
            </div>
        </form>
        <p>To edit an account <a href="../handlers/userHandler.php">
                Click Here </a></p>
    </div>



</body>

</html>