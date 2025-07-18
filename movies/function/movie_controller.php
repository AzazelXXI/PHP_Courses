<?php

require_once "config/database.php";

function getUsers($conn) {
    $sql = "SELECT * FROM movies";

    $movies = [];
    if ($result = mysqli_query($conn, $sql)) {
        while ($row = mysqli_fetch_assoc($result)) {
            $movies[] = $row;
        }
    }
    return $movies;
}