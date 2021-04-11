<?php
require_once '../views/header.php';
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();
require 'C:\MAMP\htdocs\cst236\milestone\Services\ProductBusinessService.php';

if (!empty($_GET['productName'])) {
    $name = $_GET['productName'];
} else {
    $name = "";
}



$pbs = new ProductBusinessService();

$products = $pbs->searchByProductName($name);

?>
<h3>Search Results</h3>
<?php


if ($products) {
    // include '_displayProducts.php';
    include '_displayProductCards.php';
} else {
    echo "no results";
}