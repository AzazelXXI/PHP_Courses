<?php
require_once 'config/database.php';

function isEmpty()
{
    return (
        empty($_POST['title']) ||
        empty($_POST['back_drops']) ||
        empty($_POST['vote_count']) ||
        empty($_POST['vote_average']) ||
        empty($_POST['overview'])
    );
}

function addMovie($conn)
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isEmpty()) {
            return 'Please fill in all fields.';
        }

        $title = htmlspecialchars(trim($_POST['title']));
        $back_drops = htmlspecialchars(trim($_POST['back_drops']));
        $vote_count = htmlspecialchars(trim($_POST['vote_count']));
        $vote_average = htmlspecialchars(trim($_POST['vote_average']));
        $overview = htmlspecialchars(trim($_POST['overview']));

        $sql = "INSERT INTO movies (title, back_drops, vote_count, vote_average, overview)
                VALUES ('$title', '$back_drops', $vote_count, $vote_average, '$overview')";

        if ($conn->query($sql) === TRUE) {
            header("Location: " . $_SERVER['PHP_SELF'] . "?success=1");
            exit();
        } else {
            return 'Error: ' . $conn->error;
        }
    }
    return '';
}
