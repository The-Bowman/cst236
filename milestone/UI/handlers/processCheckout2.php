<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();
if (isset($_SESSION['cart']) && isset($_SESSION['userID'])) {
    $c = $_SESSION['cart'];
} else {
    echo "Nothing in the cart yet or you are not yet logged in<br>";
    exit;
}
require_once 'validateCC.php';