<?php
session_start();
include '../funcs.php';
require_once 'C:\MAMP\htdocs\cst236\milestone\Services\models\User.php';
echo "yo dawg<br>";
$con = dbConnect();

if ($con) {
    echo "connected successfully<br>";
}
$id = $_POST['id'];
$user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['userName'], $_POST['password'], 0);


$first = $user->getFirst();
$last = $user->getLast();
$email = $user->getEmail();
$username = $user->getUsername();
$password = $user->getPassword();


$sql = "UPDATE users SET first_name = '$first', last_name = '$last', username = '$username', pass = '$password', email = '$email' WHERE user_id = '$id';";

$result = mysqli_query($con, $sql);
if ($result) {
    echo "Update Successful<br>";
    echo "<a href=../views/admin.php>Admin</a>";
} else {
    echo "something went wrong";
    exit();
}