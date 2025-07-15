<?php
include 'header_footer/header.php';
require_once 'function/add_movie.php';
require_once 'config/database.php';

$movies = [];
$sql = "SELECT * FROM movies ORDER BY id DESC";
$result = $conn->query($sql);
if ($result && $result->num_rows > 0) {
    $movies = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<style>
    body {
        background: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    /* Sticky header */
    .header-sticky {
        position: sticky;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 100;
    }

    .movies-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 8px;
        margin: 24px 0 0 0;
        padding: 0 8px;
    }

    .movie-card {
        background: #f6f6f6;
        border-radius: 0;
        box-shadow: none;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: none;
        cursor: pointer;
        position: relative;
        width: 180px;
        margin: 0 auto;
        align-items: stretch;
    }

    .movie-card:hover {
        /* Không hiệu ứng hover để sát như hình */
    }

    .movie-img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        background: #222;
        display: block;
    }

    .movie-info {
        padding: 10px 10px 8px 10px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        background: #f6f6f6;
    }

    .movie-title {
        color: #232946;
        font-size: 0.98rem;
        font-weight: bold;
        margin-bottom: 6px;
        letter-spacing: 0.2px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .movie-overview {
        display: none;
        background: rgba(255, 255, 255, 0.97);
        color: #232946;
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        padding: 24px 18px 18px 18px;
        font-size: 1rem;
        border-radius: 12px;
        z-index: 2;
        box-sizing: border-box;
        overflow-y: auto;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.10);
        transition: opacity 0.2s;
    }

    .movie-card.show-overview .movie-overview {
        display: block;
    }

    .movie-overview-title {
        font-weight: bold;
        margin-bottom: 8px;
        font-size: 1.08rem;
    }

    .movie-overview-close {
        position: absolute;
        top: 10px;
        right: 16px;
        background: none;
        border: none;
        font-size: 1.3rem;
        color: #232946;
        cursor: pointer;
        font-weight: bold;
    }

    .movie-vote {
        background: #393e63;
        color: #ffd700;
        font-weight: bold;
        border-radius: 5px;
        padding: 1px 8px;
        font-size: 0.93rem;
        display: inline-block;
        margin-top: 2px;
    }
</style>

<div class="movies-grid">
    <?php foreach ($movies as $movie): ?>
        <div class="movie-card" onclick="toggleOverview(this)">
            <?php if (!empty($movie['back_drops'])): ?>
                <img class="movie-img" src="<?= htmlspecialchars($movie['back_drops']) ?>" alt="<?= htmlspecialchars($movie['title']) ?>">
            <?php else: ?>
                <div class="movie-img" style="display:flex;align-items:center;justify-content:center;color:#fff;font-size:2rem;">No Image</div>
            <?php endif; ?>
            <div class="movie-info">
                <div class="movie-title"><?= htmlspecialchars($movie['title']) ?></div>
                <div class="movie-vote"><?= number_format($movie['vote_average'], 3) ?></div>
            </div>
            <div class="movie-overview">
                <button class="movie-overview-close" onclick="event.stopPropagation(); this.parentElement.parentElement.classList.remove('show-overview');">&times;</button>
                <div class="movie-overview-title">Overview</div>
                <div><?= nl2br(htmlspecialchars($movie['overview'])) ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>
    function toggleOverview(card) {
        // Đóng tất cả overview khác trước khi mở
        document.querySelectorAll('.movie-card.show-overview').forEach(function(el) {
            if (el !== card) el.classList.remove('show-overview');
        });
        card.classList.toggle('show-overview');
    }
</script>