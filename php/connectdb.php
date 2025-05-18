<?php
$servername = "123.207.72.222:50091";
$username = "root";
$password = "WPR_2333";
$dbname = "WebProj";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}