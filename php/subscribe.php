<?php
include "dbutils.php";
include "connectdb.php";

session_start();
$table = "users";
$username = $_SESSION['username'];

$input = json_decode(file_get_contents('php://input'), true);
$userchoice = $input['hometown'] ?? null;

if (!$userchoice) {
    echo json_encode(['success' => false, 'message' => 'No hometown provided.']);
    exit();
}

// Update user choice
$sql = "UPDATE $table SET ordered = '$userchoice' WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database update failed.']);
}