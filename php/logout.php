<?php
session_start();
$_SESSION['logged_in'] = false;
$_SESSION['username'] = null;
header("Location: ../index.html");
exit();