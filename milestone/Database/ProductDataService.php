<?php
require_once 'Database.php';

class ProductDataService
{
    function findByProductName($n)
    {
        $db = new Database();

        $sql = "SELECT * FROM products WHERE product_name LIKE '%$n%';";
        $con = $db->getConnection();

        $result = $con->query($sql);

        if (!$result) {
            //      echo "assume there is an SQL statement error";
            exit;
        }

        if ($result->num_rows == 0) {
            return null;
        } else {
            // echo "I found " . $result->num_rows . " results<br>";

            $index = 0;
            $products = array();
            while ($row = $result->fetch_assoc()) {
                $products[$index] = array($row['id'], $row['product_name'], $row['product_descr'], $row['stock'], $row['price']);
                ++$index;
            }
            return $products;
        }
    }

    function findByProductID($id)
    {
        $db = new Database();
        // echo "<br>and now i'm here";
        $sql = "SELECT * FROM products WHERE id = '$id';";
        $con = $db->getConnection();

        $result = $con->query($sql);

        if (!$result) {
            echo "assume there is an SQL statement error";
            exit;
        }
        // echo "<br> and i got a result";

        if ($result->num_rows == 0) {
            echo "<br>num rows == 0";
            return null;
        } else {
            // echo "I found " . $result->num_rows . " results<br>";



            while ($row = $result->fetch_assoc()) {
                // echo "bump";
                $product = new Product($row['product_name'], $row['product_descr'], $row['stock'], $row['price'], $row['img']);
            }
            // echo $product->getName();
            return $product;
        }
    }
}