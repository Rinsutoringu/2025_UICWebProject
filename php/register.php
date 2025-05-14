<?php
include "dbutils.php";
include "connectdb.php";
include "loginutils.php";

$table = "users";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regusr = $_POST["regusr"];
    $regpwd = $_POST["regpwd"];

    if (!checkTableExists($table)) {
        echo "Table does not exist.";
        exit();
    }
    echo "Table exists.";

    if (getPwd($table, $regusr) !== null) {
        echo "User already exists.";
        exit();
    }

    if (!register($table, $regusr, $regpwd)) {
        echo "Failed to register user.";
        exit();
    }

    echo "User registered successfully.";
    // echo "<script>loadHTML(\"../pages/towns/hometown.html\", \"maintablebody\");</script>";
    header("Location: ../pages/loginsuccess.html");
    setreg();
    exit();
}