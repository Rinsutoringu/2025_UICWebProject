<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = $_POST["usr"];
    $pwd = $_POST["pwd"];

    if (!checkTableExists($table)) {
        echo "Table does not exist.";
        header("Location: ../pages/loginfail.html");
        session_unset();
        exit();
    }

    if (!login($table, $usr, $pwd)) {
        echo "Invalid username or password.";
        header("Location: ../pages/loginfail.html");
        session_unset();
        exit();
    }
    
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $usr;
    echo "User login successfully.";
    header("Location: ../pages/loginsuccess.html");
    exit();
}