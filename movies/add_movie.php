<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Movie</title>
    <link rel="stylesheet" href="style/styles.css">
</head>
<body>

<?php include "include/header.php" ?>

<div class="homepage">
    <form action="" method="GET">
        <div class="input-field">
            <label for="title">Title: </label>
            <input type="text" name="title">
        </div>

        <div class="input-field">
            <label for="vote_count">Vote Count: </label>
            <input type="number" name="vote_count">
        </div>

        <div class="input-field">
            <label for="vote_average">Vote Average: </label>
            <input type="number" name="vote_average">
        </div>

        <div class="input-field">
            <label for="back_drops">Image: </label>
            <input type="text" name="back_drop">
        </div>

        <div class="input-field">
            <label for="overview">Overview: </label>
            <textarea name="overview"></textarea>
        </div>
    </form>
</div>

<?php include "include/footer.php" ?>


</body>
</html>