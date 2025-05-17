<?php
$file = $_GET['file'] ?? '';
$baseDir = realpath(__DIR__ . '/../pages/');
$target = realpath($baseDir . '/' . $file);

if ($target && strpos($target, $baseDir) === 0 && file_exists($target)) {
    readfile($target);
} else {
    http_response_code(404);
    echo "File not found.";
}