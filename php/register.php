<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!checkTableExists($table)) {
        echo "Table does not exist.";
        exit();
    }
    echo "Table exists.";

    if (getPwd($table, $username) !== null) {
        echo "User already exists.";
        exit();
    }

    if (!register($table, $username, $password)) {
        echo "Failed to register user.";
        exit();
    }

    echo "User registered successfully.";
    // echo "<script>loadHTML(\"../pages/towns/hometown.html\", \"maintablebody\");</script>";
    header("Location: ../pages/loginsuccess.html");
    exit();
}