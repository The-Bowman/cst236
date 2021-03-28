<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';

class CreditCardServices
{

    private $owner = "";
    private $cardNum = "";
    private $month = "";
    private $year = "";
    private $ccv = "";

    function __construct($owner, $cardNum, $month, $year, $ccv)
    {
        $this->owner = $owner;
        $this->cardNum = $cardNum;
        $this->month = $month;
        $this->year = $year;
        $this->ccv = $ccv;
    }

    function authenticate()
    {
        if (
            $this->owner == "Dean Winchester" && $this->cardNum == "1234 5678 9012 3456" && $this->month == "10" &&
            $this->year == "2023" && $this->ccv == "123"
        ) {
            return true;
        } else {
            return false;
        }
    }
}