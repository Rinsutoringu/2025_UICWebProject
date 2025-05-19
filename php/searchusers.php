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
    // Map the hometown values to actual city names
    $hometownMap = [
        'hometown1' => 'Zhuhai',
        'hometown2' => 'Shenzhen',
        'hometown3' => 'Shenyang',
        'hometown4' => 'Guangzhou',
        'hometown5' => 'Hefei',
        'hometown6' => 'Weifang'
    ];
    
    $cityName = $hometownMap[$row['ordered']] ?? $row['ordered'];
    echo "<p>User <b>$keyword</b> selected city: <b>{$cityName}</b>.</p>";
} else {
    echo "<p style='color:red;'>No information found for username: <b>$keyword</b>.</p>";
}
?>
