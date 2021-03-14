<?php
//Logs user in to site verifying against database and params
//Author: Dustin Johsnon
session_start();
include '../funcs.php';
//obtain data from form
$username = $_POST['username'];
$pwd = $_POST['password'];


// since field forms are required, we do not need to check for empty fields
$con = dbConnect();

// prepare the statement, use ? placeholder for security purposes
$sql = "SELECT * FROM users WHERE USERNAME=?;";
$stmt = mysqli_stmt_init($con);

// prepares statement and checks if it will be capable of getting a result
if (!mysqli_stmt_prepare($stmt, $sql)) {
    echo 'SQL ERROR';
    mysqli_close($con);
    exit();
} else {
    //binds statement into $stmt variable, executes and stores result
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    //checks result exists, if it doesn't writes no user found to screen
    if ($row = mysqli_fetch_assoc($result)) {

        // checks password entered matches database
        if ($pwd == $row['pass']) {
            $_SESSION['userID'] = $row['user_id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['admin'] = $row['admin'];
            $_SESSION['loggedIn'] = true;


            header('location: ../views/index.php?=login_success');
            mysqli_close($con);
            exit();
        } else {
            echo 'INCORRECT PASSWORD <br>';
            mysqli_close($con);
            exit();
        }
    } else {
        echo 'NO USER FOUND';
        mysqli_close($con);
        exit();
    }
}