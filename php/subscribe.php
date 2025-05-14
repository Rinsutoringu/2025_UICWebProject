<?php
include "dbutils.php";
include "connectdb.php";

session_start();
$table = "users";
$username = $_SESSION['username'];

// 解析 JSON 数据
$input = json_decode(file_get_contents('php://input'), true);
$userchoice = $input['hometown'] ?? null; // 从 JSON 数据中获取 'hometown'

if (!$userchoice) {
    echo json_encode(['success' => false, 'message' => 'No hometown provided.']);
    exit();
}

// 更新数据库中的用户选择
$sql = "UPDATE $table SET ordered = '$userchoice' WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Database update failed.']);
}