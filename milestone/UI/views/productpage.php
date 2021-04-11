<?php
session_start();
require 'C:\MAMP\htdocs\cst236\milestone\Services\ProductBusinessService.php';
require_once 'header.php';
?>

<html>

<head>
    <title>Mock Latin. Product Page</title>
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
    <div style="margin-top: 2rem;">
        <?php
        $id = $_GET['prod_id'];
        $item = new ProductBusinessService();
        $result = $item->getProductByID($_GET['prod_id']);

        echo "<img src=" . $result->getImg() . ">";
        echo "<p>Product Name: " . $result->getName() . "</p>";
        echo "<p>Description: " . $result->getDescr() . "</p>";
        echo "<p>Inventory Count: " . $result->getStock() . "</p>";
        echo "<p>Price: $" . $result->getPrice() . "</p>";
        echo "<a class='btn btn-primary' href='../handlers/addToCart.php?prod_id=$id'>ADD TO CART</a><br>";
        if (isset($_SESSION['loggedIn']) && $_SESSION['admin'] == 1) {
            echo "<a style='margin: 2px;' class='btn btn-secondary' href='updateProduct.php?productID=$id'>Update Product</a>";
        }
        echo "<br><a class='btn btn-primary' href='index.php'>Home</a>";

        ?>
    </div>
</body>

</html>