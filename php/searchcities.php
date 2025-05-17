<?php
include "connectdb.php";

$keyword = trim($_POST['keyword'] ?? '');

echo "<h4>Search Result</h4>";

if (empty($keyword)) {
    echo "<p style='color:red;'>Please enter a city name.</p>";
    exit();
}

$stmt = $conn->prepare("SELECT username FROM users WHERE ordered = ?");
$stmt->bind_param("s", $keyword);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "<p>Users who selected city <b>$keyword</b>:</p>";
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>{$row['username']}</li>";
    }
    echo "</ul>";
} else {
    echo "<p style='color:red;'>No users found for city: <b>$keyword</b>.</p>";
}
?>
