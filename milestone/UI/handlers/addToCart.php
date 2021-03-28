<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();

$id = $_GET['prod_id'];

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
} else {
    if (isset($_SESSION['userID'])) {
        $c = new Cart($_SESSION['userID']);
    } else {
        echo "Please login first <br>";
        exit;
    }
}

$c->addItem($id);
$c->calcTotal();

$_SESSION['cart'] = $c;
// echo "<pre>";']);
// echo "</pre>";
// print_r($_SESSION['cart
header('location: ../views/showCart.php');