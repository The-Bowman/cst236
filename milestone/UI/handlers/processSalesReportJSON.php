<?php

include_once 'C:\MAMP\htdocs\cst236\milestone\AutoLoader.php';

$start = $_GET['startDate'];
$end = $_GET['endDate'];

$obs = new OrderBusinessService();

$report = $obs->getOrdersBetweenDates($start, $end);

if ($report == null) {
    echo "No sales to report between those dates.<br>";
    exit;
}
header('Content-type: text/javascript');
echo json_encode($report, JSON_PRETTY_PRINT);