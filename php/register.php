<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (!checkTableExists($table)) echo "Table does not exist.";exit();

    if (getPwd($table, $username) !== null) echo "User already exists.";exit();

    if (!register($table, $username, $password)) echo "Failed to register user.";exit();

    echo "User registered successfully.";
}