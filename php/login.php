<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usr = $_POST["usr"];
    $pwd = $_POST["pwd"];

    if (!checkTableExists($table)) {
        echo "Table does not exist.";
        header("Location: ../pages/loginfail.html");
        exit();
    }

    if (getPwd($table, $usr) !== null) {
        echo "User already exists.";
        header("Location: ../pages/loginfail.html");
        exit();
    }

    if (!login($table, $usr, $pwd)) {
        echo "Failed to login user.";
        header("Location: ../pages/loginfail.html");
        exit();
    }

    echo "User login successfully.";
    // echo "<script>loadHTML(\"../pages/towns/hometown.html\", \"maintablebody\");</script>";
    header("Location: ../pages/loginsuccess.html");
    exit();
}