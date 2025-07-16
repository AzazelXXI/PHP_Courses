<?php
$host = "localhost";
$db = "image_upload_db";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
// echo "ok";
?>