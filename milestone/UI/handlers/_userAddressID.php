<?php
require_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';
session_start();
$ubs = new UserBusinessService();

$userAddressID = $ubs->getAddressIDByUserID($_SESSION['userID']);
echo "<br>user adress id: " . $userAddressID;