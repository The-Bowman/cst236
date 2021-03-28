<?php

class OrderDetails
{

    private $id;
    private $order_id;
    private $products_id;
    private $quantity;
    private $current_price;
    private $current_description;

    function __construct($id, $order_id, $products_id, $quantity, $current_price, $current_description)
    {
        $this->id = $id;
        $this->order_id = $order_id;
        $this->products_id = $products_id;
        $this->quantity = $quantity;
        $this->current_price = $current_price;
        $this->current_description = $current_description;
    }

    function getID()
    {
        return $this->id;
    }

    function getOrderID()
    {
        return $this->order_id;
    }

    function getProductID()
    {
        return $this->products_id;
    }

    function getQuantity()
    {
        return $this->quantity;
    }

    function getCurrentPrice()
    {
        return $this->current_price;
    }

    function getCurrentDescription()
    {
        return $this->current_description;
    }
}