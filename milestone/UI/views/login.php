<?php
session_start();
require '../funcs.php';
require_once 'header.php';
require_once '../../AutoLoader.php';
?>
<!DOCTYPE HTML>
<html>

<head>
    <style>
    html {
        background-color: grey;
    }
    </style>
    <title>Mock Latin. Login</title>
    <div class="center">
        <header>
            <h2> Sign in or Create an Account</h2>
        </header>
    </div>
</head>
<link rel="stylesheet" href="stylesheet.css">

<body>
    <!-- <ul class="ul">
        <li class="li"><a href="index.php">Home</a></li>
        <li class="li"><a href="profile.php">Profile</a></li>
        <li class="li"><a href="cart.php">Cart</a></li>
        <?php
        // if (isset($_SESSION['loggedIn']) == true) {
        //     echo "<li class='li'><a href=handlers/logout.php>Logout</a></li>";
        // }
        ?>
    </ul> -->
    <div class="loginPos">
        <div class="formHeader">
            <h3>Login</h3>
            <p></p>
        </div>
        <form action="../handlers/loginHandler.php" method="POST">
            <div class="label">
                <label for="username">Username: </label>
                <input type="text" name="username" required><br><br>
                <label for="password">Password: </label>
                <input type="password" name="password" required><br><br>
                <input style="position: absolute; left: 40%; bottom: 4px;" class="button" type="submit"
                    value="Login"><br>
            </div>
        </form>
    </div>
    <div class="registerPos">
        <div class="formHeader">
            <h3>Create an Account</h3>
        </div>
        <form action="../handlers/registrationHandler.php" method="POST">
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
    </div>
</body>

</html>