<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";
$username = $_SESSION['username'];
$userchoice = $_POST['userchoice'];