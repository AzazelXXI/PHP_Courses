<?php
$server_name = 'localhost';
$username = 'root';
$password = '';
$dbname = 'php_demo';

// create connection
$conn = new mysqli($server_name, $username, $password, $dbname);

// connection checking
if ($conn->connect_error) {
    die("Failed to connect" . $conn->connect_error);
}

$sql = "INSERT INTO User(name, age, email) VALUES ('Hoang Chi Trung', 22, 'trunghoang1124@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo 'User added!';
    return;
}
echo 'Error' . $conn->error;

$conn->close();
