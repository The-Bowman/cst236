<?php

class Order
{

    private $id;
    private $date;
    private $user_id;
    private $address_id;
    private $total;

    function __construct($id, $date, $user_id, $address_id, $total)
    {
        $this->id = $id;
        $this->date = $date;
        $this->user_id = $user_id;
        $this->address_id = $address_id;
        $this->total = $total;
    }

    function getID()
    {
        return $this->id;
    }

    function getDate()
    {
        return $this->date;
    }

    function getUserID()
    {
        return $this->user_id;
    }

    function getAddressID()
    {
        return $this->address_id;
    }

    function getTotal()
    {
        return $this->total;
    }
}