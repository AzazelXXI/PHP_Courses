<?php 
$server_name = 'localhost';
$username = 'root';
$password = '';
$dbname = 'moviesDB';

$conn = new mysqli($server_name, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Failed to connect' . $conn->connect_error);
}
// echo 'Connected!';