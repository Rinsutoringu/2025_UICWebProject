<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $regusr = $_POST["regusr"];
    $regpwd = $_POST["regpwd"];


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
    header("Location: ../pages/registersuccess.html");
    setreg();
    exit();
}