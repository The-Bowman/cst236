<?php

function dbConnect()
{
    $user = 'root';
    $password = 'root';
    $db = 'cst_236';
    $host = 'localhost';

    $con = mysqli_connect($host, $user, $password, $db);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $con;
}