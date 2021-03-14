<?php
require '../funcs.php';
session_start();
if (!isset($_SESSION['loggedIn']) || $_SESSION['admin'] != 1) {
    header('location: index.php?=must_be_admin');
}
$con = dbConnect();
$id = $_POST['id'];

$sql = "UPDATE users SET admin = 1 WHERE user_id = '$id'";
$result = mysqli_query($con, $sql);

if ($result) {
    header('location: ../views/admin.php?promotion_successful');
} else {
    header('location: ../views/userpage.php?promotion_failed');
}