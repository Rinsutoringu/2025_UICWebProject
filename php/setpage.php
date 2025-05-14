<?php
// filepath: d:\dev\Web-Developement-Workshop\2025_UICWebProject\src\php\setpage.php
session_start();
// 指定要读取的 HTML 文件路径
$directory = "../pages/"; // HTML 文件所在目录
$filename = isset($_GET['file']) ? $_GET['file'] : ""; // 从请求中获取文件名

// 构建完整路径
$filepath = $directory . $filename;

// 检查文件是否存在并读取内容
if (file_exists($filepath) && pathinfo($filepath, PATHINFO_EXTENSION) === "html") {
    echo file_get_contents($filepath); // 输出 HTML 文件内容
} else {
    echo "<p>File not found or invalid file type.</p>"; // 错误提示
}
?>