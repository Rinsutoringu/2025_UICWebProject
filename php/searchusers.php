<?php
include "connectdb.php";

$keyword = trim($_POST['keyword'] ?? '');

echo "<h4>Search Result</h4>";

if (empty($keyword)) {
    echo "<p style='color:red;'>Please enter a username.</p>";
    exit();
}

$stmt = $conn->prepare("SELECT ordered FROM users WHERE username = ?");
$stmt->bind_param("s", $keyword);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    echo "<p>User <b>$keyword</b> selected city: <b>{$row['ordered']}</b>.</p>";
} else {
    echo "<p style='color:red;'>No information found for username: <b>$keyword</b>.</p>";
}
?>
