<?php
include "connectdb.php";
session_start();

if (!isset($_SESSION['username'])) {
    exit;
}

$content = trim($_POST['content'] ?? '');
$username = $_SESSION['username'];

$stmt = $conn->prepare("INSERT INTO guestbook (username, content) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $content);
$stmt->execute();

header("Location: loadmessage.php");
exit();
?>
