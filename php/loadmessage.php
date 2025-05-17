<?php
include "connectdb.php";
session_start();

$result = $conn->query("SELECT * FROM guestbook ORDER BY post_time ASC");

while ($row = $result->fetch_assoc()) {
    echo "<div class='messagebox'>";
    echo "<strong>" . htmlspecialchars($row['username']) . "</strong> ";
    echo "<em>(" . $row['post_time'] . ")</em><br>";
    echo nl2br(htmlspecialchars($row['content'])) . "<br>";

    if (isset($_SESSION['username']) && $_SESSION['username'] === $row['username']) {
        echo "<form method='POST' action='deletemessage.php' class='deleteform'>";
        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
        echo "<input type='submit' value='Delete'>";
        echo "</form>";
    }

    echo "</div>";
}
?>
