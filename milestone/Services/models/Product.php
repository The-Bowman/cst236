<?php
class Product
{

    private $id;
    private $name;
    private $descr;
    private $stock;
    private $price;
    private $img;

    public function __construct($id, $name, $descr, $stock, $price, $img)
    {
        $this->id = $id;
        $this->name = $name;
        $this->descr = $descr;
        $this->stock = $stock;
        $this->price = $price;
        $this->img = $img;
    }

    public function getID()
    {
        return $this->id;
    }

    public function setID($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescr()
    {
        return $this->descr;
    }

    public function setDescr($descr)
    {
        $this->descr = $descr;
    }

    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
    }
}