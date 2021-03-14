<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    include '_displayProducts.php';
} else {
    echo "no results";
}