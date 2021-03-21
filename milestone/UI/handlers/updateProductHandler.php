<?php
session_start();
include '../funcs.php';
require_once 'C:\MAMP\htdocs\cst236\milestone\Services\models\Product.php';
echo "yo dawg<br>";
$con = dbConnect();

if ($con) {
    echo "connected successfully<br>";
}
$id = $_POST['id'];
$product = new Product($id, $_POST['productName'], $_POST['productDescr'], $_POST['stock'], $_POST['price'], $_POST['img']);


$name = $product->getName();
$descr = $product->getDescr();
$stock = $product->getStock();
$price = $product->getPrice();
$img = $product->getImg();


$sql = "UPDATE products SET product_name = '$name', product_descr = '$descr', stock = '$stock', price = '$price', img = '$img' WHERE id = '$id';";

$result = mysqli_query($con, $sql);
if ($result) {
    echo "Update Successful<br>";
    echo "<a href=../views/admin.php>Admin</a>";
} else {
    echo "something went wrong";
    exit();
}