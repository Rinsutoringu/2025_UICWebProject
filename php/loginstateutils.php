<?php
include "login.php";
include "register.php";

function setlogin() {
    session_start();
    $_SESSION['logged_in'] = true;
    $_SESSION['username'] = $_POST['logusr'];
}
function unsetlogin() {
    session_start();
    unset($_SESSION['logged_in']);
    unset($_SESSION['username']);
    session_unset();
}

function checklogin() {
    session_start();
    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        return true;
    } else {
        return false;
    }
}


exit();