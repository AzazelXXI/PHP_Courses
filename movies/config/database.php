<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'moviesDB';

$conn = new mysqli($host, $username, $password, $db_name);

if ($conn->connect_error) {
    die('Failed ' . $conn->connect_error);
}

// echo 'Success';