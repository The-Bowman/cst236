<?php
require_once 'header.php';
session_start();
if (!isset($_SESSION['loggedIn']) && $_SESSION['admin'] != 1) {
    header('location: index.php?=must_be_admin');
}
require 'C:\MAMP\htdocs\cst236\milestone\Services\ProductBusinessService.php';
?>

<html>

<head>
    <style>
    html {
        text-align: center;
    }
    </style>
</head>
<link rel="stylesheet" href="stylesheet.css">

<body>
    <?php
    $product = new ProductBusinessService();
    $result = $product->getProductByID($_GET['productID']);
    ?>
    <div class="login_form">
        <div class="formHeader">
            <h3>Edit Account</h3>
        </div>
        <form onsubmit="return confirm('Update this Product?')" action="../handlers/updateProductHandler.php"
            method="POST">
            <div class="label">
                <input type="hidden" name="id" value="<?php echo $_GET['productID']; ?>">
                <label for="productName">Product Name: </label>
                <input type="text" name="productName" value="<?php echo $result->getName(); ?>" required><br><br>
                <label for="productDescr">Product Description: </label>
                <textarea type="text" name="productDescr" value="<?php echo $result->getDescr(); ?>"
                    required></textarea><br><br>
                <label for="stock">Stock: </label>
                <input type="number" name="stock" value="<?php echo $result->getStock(); ?>" min="0" required><br><br>
                <label for="price">Price: </label>
                <input type="number" name="price" value="<?php echo $result->getPrice(); ?>" min="1" max="1000"
                    required><br><br>
                <label for="img">Image URL: </label>
                <input type="text" name="img" value="<?php echo $result->getImg(); ?>" required><br><br>
                <input class="button" type="submit" value="Update Product">
            </div>
        </form>

        <form onsubmit="return remove()" action="../handlers/_removeProduct.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $_GET['productID']; ?>">
            <button class="button" style="position: absolute; top: 28.06em; left: 51em;">Delete Product</button>
        </form>
    </div>
    <script>
    function remove() {
        let confirmation = confirm("Delete Product?");
        if (confirmation == true) {
            if (confirm("Are you sure? This cannot be undone")) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    </script>

</body>

</html>