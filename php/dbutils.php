<?php
include "connectdb.php";


/**
 * get All data from a table
 * @param string $table
 * @return array All data from the table
 * @throws Exception if the table does not exist
 */
function getAll($table) {
    session_start();
    global $conn;
    $sql = "SELECT * FROM $table";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

/**
 * get UserPassword from a table
 * @param string $table which table to get the password from
 * @param string $id the id of the user
 * @return string|null the password of the user or null if not found
 */
function getPwd($table, $usr) {
    //session_start();
    global $conn;
    $sql = "SELECT password FROM $table WHERE username = '$usr'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return $result->fetch_assoc()['password'];
    } else {
        return null;
    }
}

/**
 * register a new user
 * @param string $table which table to register the user in
 * @param string $id the id of the user
 * @param string $password the password of the user
 * @return bool true if the user was registered successfully, false otherwise
 * @throws Exception if the table does not exist
 */
function register($table, $username, $password, $realname) {
    session_start();
    global $conn;
    $sql = "INSERT INTO $table (username, password, regdate, state, ordered, real_name) VALUES ('$username', '$password', NOW(), 1, 'none', '$realname')";
    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        throw new Exception("Failed to register user: " . $conn->error);
    }
}


function login($table, $username, $password) {
    session_start();
    global $conn;
    $sql = "SELECT * FROM $table WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}


/**
 * check if a table exists
 * @param string $table the name of the table to check
 * @return bool true if the table exists, false otherwise
 */
function checkTableExists($table) {
    //session_start();
    global $conn;
    // $sql = "SELECT "
    $sql = "SHOW TABLES LIKE '$table'";
    $result = $conn->query($sql);
    return $result->num_rows > 0;
}