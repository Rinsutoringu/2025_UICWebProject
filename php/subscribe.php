<?php
include "dbutils.php";
include "connectdb.php";

$table = "users";
$username = $_SESSION['username'];
$userchoice = $_POST['userchoice'];

// change the user choice in the database
$sql = "UPDATE $table SET userchoice = '$userchoice' WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false]);
}