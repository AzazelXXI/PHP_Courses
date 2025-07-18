<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style/styles.css">
</head>

<body>

    <?php include 'include/header.php'; ?>
    <?php include 'function/movie_controller.php'; ?>

    <?php $movies = getUsers($conn); ?>

    <?php foreach ($movies as $movie) { ?>
        <div class="movie-card">
            <div class="movie-img">
                <img src="<?php echo htmlspecialchars($movie['back_drops']) ?>" alt="<?php echo htmlspecialchars($movie['title']) ?>">
            </div>
            <div class="movie-info">
                <span class="movie-title">
                    <?php echo htmlspecialchars($movie['title']) ?>
                </span>
                
                <span class="movie-vote_average">
                    <?php echo htmlspecialchars($movie['vote_average']) . "⭐" ?>
                </span>
            </div>
        </div>
    <?php } ?>

    <?php include 'include/footer.php'; ?>

</body>

</html>