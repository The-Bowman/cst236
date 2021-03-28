<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';

$owner = $_POST['owner'];
$cardNum = $_POST['cardNum'];
$month = $_POST['month'];
$year = $_POST['year'];
$ccv = $_POST['ccv'];

$ccServ = new CreditCardServices($owner, $cardNum, $month, $year, $ccv);
if ($ccServ->authenticate()) {
    echo "<h4>Authentication Succeeded</h4>";
} else {
    echo "<h4>Failed to Authenticate</h4>";
    exit;
}