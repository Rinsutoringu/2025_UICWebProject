<?php
include "connectdb.php";
session_start();

$id = $_POST['id'] ?? '';
$id = intval($id);

$stmt = $conn->prepare("DELETE FROM guestbook WHERE id = ? AND username = ?");
$stmt->bind_param("is", $id, $_SESSION['username']);
$stmt->execute();

header("Location: loadmessage.php");
exit();
?>
