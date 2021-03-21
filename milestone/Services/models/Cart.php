<?php
class Cart
{

    private $userid; // the user the cart is associated with
    private $items = array(); // associative array of items in the cart (prod_id=>qty, prod_id=>qty, prod_id=>qty)
    private $subtotals = array(); // associative array (prod_id=> price, prod_id=> price, prod_id=> price)
    private $total; // float; total cost of cart

    function __construct($userid)
    {
        $this->userid = $userid;
        $this->items = array();
        $this->subtotals = array();
        $this->total =  0.0;
    }

    function addItem($prod_id)
    {
        if (array_key_exists($prod_id, $this->items)) {
            $this->items[$prod_id] += 1;
        }
        $this->items = $this->items + array($prod_id => 1);
    }

    function updateQTY($prod_id, $newqty)
    {
        if (array_key_exists($prod_id, $this->items)) {
            $this->items[$prod_id] = $newqty;
        }
        $this->items = $this->items + array($prod_id => $newqty);

        if ($this->items[$prod_id] == 0) {
            unset($this->items[$prod_id]);
        }
    }

    function calcTotal()
    {
        $pbs = new ProductBusinessService();

        $subtotals_array = array();
        $this->total = 0;

        foreach ($this->items as $item => $qty) {
            $product = $pbs->getProductByID($item);
            $product_subtotal = $product->getPrice() * $qty;
            $subtotals_array = $subtotals_array + array($item => $product_subtotal);
            $this->total = $this->total + $product_subtotal;
        }

        $this->subtotals = $subtotals_array;
    }

    function getUserID()
    {
        return $this->userid;
    }

    function setUserID($userid)
    {
        $this->userid = $userid;
    }

    function getItems()
    {
        return $this->items;
    }

    function setItems($items)
    {
        $this->items = $items;
    }

    function getSubtotals()
    {
        return $this->subtotals;
    }

    function setSubtotals($subtotals)
    {
        $this->subtotals = $subtotals;
    }

    function getTotal()
    {
        return $this->total;
    }

    function setTotal($total)
    {
        $this->total = $total;
    }
}