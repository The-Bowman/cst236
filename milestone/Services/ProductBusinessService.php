<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
// require_once 'C:\MAMP\htdocs\cst236\milestone\Database\ProductDataService.php';
// require_once 'models/Product.php';

class ProductBusinessService
{

    function searchByProductName($name)
    {
        $search = new ProductDataService();

        return $arr = $search->findByProductName($name);
    }

    function getProductByID($id)
    {
        $search = new ProductDataService();
        // echo "i got to here";
        $arr = $search->findByProductID($id);
        return $arr;
    }
}