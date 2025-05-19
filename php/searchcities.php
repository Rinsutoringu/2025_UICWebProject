<?php
include "connectdb.php";

$keyword = trim($_POST['keyword'] ?? '');

echo "<h4>Search Result</h4>";

if (empty($keyword)) {
    echo "<p style='color:red;'>Please enter a city name.</p>";
    exit();
}

// Define the hometown mapping
$hometownMap = [
    'hometown1' => 'Zhuhai',
    'hometown2' => 'Shenzhen',
    'hometown3' => 'Shenyang',
    'hometown4' => 'Guangzhou',
    'hometown5' => 'Hefei',
    'hometown6' => 'Weifang'
];

// Reverse mapping to find the database value from the city name
$reverseMap = array_flip($hometownMap);
$searchValue = $reverseMap[$keyword] ?? $keyword;

$stmt = $conn->prepare("SELECT username FROM users WHERE ordered = ?");
$stmt->bind_param("s", $searchValue);
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
