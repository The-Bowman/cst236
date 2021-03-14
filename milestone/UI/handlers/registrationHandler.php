<?php
session_start();
include '../funcs.php';
require_once 'C:\MAMP\htdocs\cst236\milestone\Services\models\User.php';

$con = dbConnect();

if ($con) {
    echo "connected successfully<br>";
}

$user = new User($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['userName'], $_POST['password'], 0);


echo "username: " . $user->username . "<br>";

$check = "SELECT * FROM users WHERE USERNAME = '$user->username';";
$result = mysqli_query($con, $check);
$count = mysqli_num_rows($result);

if (!$result) {
    throw new Exception('Could not execute query');
    echo "<br><a href=login.php>Go Back</a>";
    exit;
}

if ($count > 0) {
    echo "Username taken. Please use a different one.<br>";
    echo "<a href=login.php>Go Back</a>";
    exit;
}

$sql = "INSERT INTO users (first_name, last_name, username, pass, email) VALUES ('$user->first', '$user->last', '$user->username', '$user->password', '$user->email');";

$result = mysqli_query($con, $sql);
if ($result) {
    echo "Registration Successful<br>";
    echo "<a href=../views/index.php>Main</a>";
} else {
    echo "something went wrong";
    exit();
}