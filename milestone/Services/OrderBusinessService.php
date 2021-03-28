<?php

error_reporting("E_ALL");
ini_set('display_errors', 1);

require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';

class OrderBusinessService
{
    function checkout($order, $cart)
    {
        // create new line in order table
        $db = new Database();
        $con = $db->getConnection();

        $con->autocommit(FALSE);
        $con->begin_transaction();

        $ods = new OrderDataService();
        $orderID = $ods->createNew($order, $con);
        $success = false;


        $pbs = new ProductBusinessService();

        foreach ($cart->getItems() as $product_id => $qty) {

            $product = $pbs->getProductByID($product_id);

            $orderDetails = new OrderDetails(null, $orderID, $product_id, $qty, $product->getPrice(), $product->getDescr());

            $result = $ods->addDetailsLine($orderID, $orderDetails, $con);

            if ($result) {

                $success = true;
            }
        }

        if ($orderID > 0 && $success == true) {
            echo "success";
            $con->commit();
            return $orderID;
        } else {
            echo "failure";
            $con->rollback();
        }
    }
}