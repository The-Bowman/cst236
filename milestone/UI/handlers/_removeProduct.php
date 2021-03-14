<?php
require '../funcs.php';
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['admin'] != 1) {
    header('location: index.php?=must_be_admin');
}
$con = dbConnect();
$id = $_POST['id'];

$sql = "DELETE FROM products WHERE id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    header('location: ../views/admin.php?deletion_successful');
} else {
    header('location: ../views/userpage.php?deletion_failed');
}