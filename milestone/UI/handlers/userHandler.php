<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require 'C:\MAMP\htdocs\cst236\milestone\Services\UserBusinessService.php';

$name = "";




$pbs = new UserBusinessService();

$users = $pbs->searchByUserName($name);

?>
<h3>Search Results</h3>
<a href="../views/admin.php">Back to Admin</a>
<?php


if ($users) {
    include '_displayUsers.php';
} else {
    echo "no results";
}