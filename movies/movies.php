<?php
include 'header_footer/header.php';
require_once 'function/add_movie.php';

$message = '';
if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['submitMovie'])
) {
    $message = addMovie($conn);
}
?>

<style>
    body {
        background: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .movies-header {
        width: 100%;
        background: #343a40;
        color: #fff;
        padding: 18px 0 14px 0;
        text-align: center;
        font-size: 2rem;
        font-weight: bold;
        letter-spacing: 1px;
        margin-bottom: 32px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
    }

    .movies-container {
        max-width: 500px;
        margin: 40px auto;
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 32px 28px 24px 28px;
    }

    .movies-container h2 {
        text-align: center;
        margin-bottom: 24px;
        color: #333;
    }

    .movies-form label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #444;
    }

    .movies-form input[type="text"],
    .movies-form input[type="number"],
    .movies-form textarea {
        width: 100%;
        padding: 8px 10px;
        margin-bottom: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 1rem;
        background: #f9f9f9;
        resize: vertical;
    }

    .movies-form textarea {
        min-height: 60px;
    }

    .movies-form input[type="submit"] {
        width: 100%;
        background: #007bff;
        color: #fff;
        border: none;
        padding: 10px 0;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
    }

    .movies-form input[type="submit"]:hover {
        background: #0056b3;
    }

    .movies-message {
        text-align: center;
        margin-bottom: 18px;
        color: #28a745;
        font-weight: bold;
    }
</style>



<div class="movies-container">
    <h2>Add Movie</h2>
    <?php if (!empty($message)) : ?>
        <div class="movies-message"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>
    <form class="movies-form" action="" method="POST">
        <label for="title">Title</label>
        <input type="text" id="title" name="title">

        <label for="back_drops">Back Drops</label>
        <input type="text" id="back_drops" name="back_drops">

        <label for="vote_count">Vote Count</label>
        <input type="number" id="vote_count" name="vote_count">

        <label for="vote_average">Vote Average</label>
        <input type="number" step="0.1" id="vote_average" name="vote_average">

        <label for="overview">Overview</label>
        <textarea id="overview" name="overview" placeholder="Enter overview"></textarea>

        <input type="submit" name="submitMovie" value="Submit">
    </form>
</div>