<?php
session_start();
// HTML path
$directory = "../pages/"; 
// get file name
$filename = isset($_GET['file']) ? $_GET['file'] : ""; 
// Make full path
$filepath = $directory . $filename;
// check file is exist
if (file_exists($filepath) && pathinfo($filepath, PATHINFO_EXTENSION) === "html") {
    echo file_get_contents($filepath); 
} else {
    echo "<p>File not found or invalid file type.</p>";
}
?>