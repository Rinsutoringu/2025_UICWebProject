<?php
include "login.php";
include "register.php";


$_SESSION['logged_in'] = true;
$_SESSION['username'] = $_POST['username'];

exit();