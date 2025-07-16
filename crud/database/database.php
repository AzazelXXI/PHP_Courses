<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'php_demo';

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die('Failed to connect' . $conn->error);
}


