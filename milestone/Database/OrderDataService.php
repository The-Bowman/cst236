<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
class OrderDataService
{

    function createNew($order, $con)
    {

        // $db = new Database();
        // $con = $db->getConnection();
        // if ($con->connect_error) {
        //     echo "connection failure";
        // } else {
        //     echo "connection working";
        // }
        $stmt = $con->prepare("INSERT INTO orders (order_date, users_id, addresses_id, total) VALUES (?,?,?,?)");

        if (!$stmt) {
            echo "<br>Something wrong in the binding process. sql error<br>";
            exit;
        }

        // $order_id = $order->getID();
        $order_date = $order->getDate();
        $user_id = $order->getUserID();
        $address_id = $order->getAddressID();
        $order_total = $order->getTotal();

        $stmt->bind_param("siid", $order_date, $user_id, $address_id, $order_total);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {

            return $con->insert_id;
        } else {

            return false;
        }
    }

    function addDetailsLine($order_id, $orderDetails, $con)
    {

        $stmt = $con->prepare("INSERT INTO order_details (order_id, products_id, quantity, current_price, current_description) VALUES (?, ?, ?, ?, ?)");

        if (!$stmt) {

            return -1;
        }
        // $orderDetails = new OrderDetails($id, $order_id, $product_id, $quantity, $current_price, $current_description);
        $product_id = $orderDetails->getProductID();
        $quantity = $orderDetails->getQuantity();
        $price = $orderDetails->getCurrentPrice();
        $description = $orderDetails->getCurrentDescription();

        $stmt->bind_param("iiids", $order_id, $product_id, $quantity, $price, $description);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {

            return $con->insert_id;
        } else {
            echo "<br>fail<br>";
            return -1;
        }
    }
}