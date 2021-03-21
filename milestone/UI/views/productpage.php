<?php
session_start();
require 'C:\MAMP\htdocs\cst236\milestone\Services\ProductBusinessService.php';
?>

<html>

<head>
    <style>
    html {
        text-align: center;
    }

    img {
        max-height: 500px;
        max-width: 500px;
    }
    </style>
</head>

<body>
    <?php
    $id = $_GET['productID'];
    $item = new ProductBusinessService();
    $result = $item->getProductByID($_GET['productID']);

    echo "<img src=" . $result->getImg() . ">";
    echo "<p>Product Name: " . $result->getName() . "</p>";
    echo "<p>Description: " . $result->getDescr() . "</p>";
    echo "<p>Inventory Count: " . $result->getStock() . "</p>";
    echo "<p>Price: $" . $result->getPrice() . "</p>";
    echo "<a href='../handlers/addToCart.php?prod_id=$id'>ADD TO CART</a><br>";
    if (isset($_SESSION['loggedIn']) && $_SESSION['admin'] == 1) {
        echo "<a href=updateProduct.php?productID=" . $_GET['productID'] . ">Update Product</a>";
    }
    echo "<br><a href='index.php'>Home</a>";

    ?>
</body>

</html>