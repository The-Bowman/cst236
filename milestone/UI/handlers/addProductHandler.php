<?php
session_start();
include '../funcs.php';
require_once 'C:\MAMP\htdocs\cst236\milestone\Services\models\Product.php';

$con = dbConnect();

if ($con) {
    echo "connected successfully<br>";
}

$product = new Product($_POST['productName'], $_POST['productDescr'], $_POST['stock'], $_POST['price'], $_POST['img']);

$name = $product->getName();
$descr = $product->getDescr();
$stock = $product->getStock();
$price = $product->getPrice();
$image = $product->getImg();
echo "product name: " . $name . "<br>";

$check = "SELECT * FROM products WHERE product_name = '$name';";
$result = mysqli_query($con, $check);
$count = mysqli_num_rows($result);

if (!$result) {
    throw new Exception('Could not execute query');
    echo "<br><a href=login.php>Go Back</a>";
    exit;
}

if ($count > 0) {
    echo "Product name taken. Please use a different one.<br>";
    echo "<a href=login.php>Go Back</a>";
    exit;
}

$sql = "INSERT INTO products (product_name, product_descr, stock, price, img) VALUES ('$name', '$descr', '$stock', '$price', '$image');";

$result = mysqli_query($con, $sql);
if ($result) {
    echo "Registration Successful<br>";
    echo "<a href=../views/index.php>Main</a>";
} else {
    echo "something went wrong";
    exit();
}