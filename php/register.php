<?php
include "dbutils.php";
include "connectdb.php";
//include "loginutils.php";

$table = "users";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regusr = $_POST["regusr"];
    $regpwd = $_POST["regpwd"];
    $realname = $_POST["realname"];

    if (!checkTableExists($table)) {
        echo "Table does not exist.";
        exit();
    }
    echo "Table exists.";

    if (getPwd($table, $regusr) !== null) {
        echo "User already exists.";
        exit();
    }

    if (!register($table, $regusr, $regpwd, $realname)) {
        echo "Failed to register user.";
        exit();
    }
    echo("User registered successfully.");
    header("Location: ../pages/registersuccess.html");
    exit();
}