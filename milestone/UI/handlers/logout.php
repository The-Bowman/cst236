<?php
//Logs out current user
//author Dustin Johnson
session_start();

$_SESSION = array();

session_destroy();
header('location: ../views/index.php?=logout_success');