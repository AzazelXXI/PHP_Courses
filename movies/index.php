<!DOCTYPE html>
<html>

<head>
    <title>Movies</title>
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
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 8px;
            margin: 24px 0 0 0;
            padding: 0 16px;
            justify-items: center;
        }

        .movie-card {
            background: #f6f6f6;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.2s;
            cursor: pointer;
            position: relative;
            width: 180px;
            align-items: stretch;
        }

        .movie-card:hover {
            transform: translateY(-2px);
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

        /* Search functionality */
        .search-container {
            position: relative;
            display: inline-block;
        }

        .search-input {
            padding: 8px 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            width: 200px;
        }

        .search-input:focus {
            outline: none;
            border-color: #007bff;
        }
    </style>
</head>

<body>
    <?php
    include 'header_footer/header.php';
    require_once 'function/add_movie.php';
    require_once 'config/database.php';

    $movies = [];
    $search = isset($_GET['search']) ? trim($_GET['search']) : '';

    if ($search) {
        $sql = "SELECT * FROM movies WHERE title LIKE ? ORDER BY id DESC";
        $stmt = $conn->prepare($sql);
        $searchTerm = '%' . $search . '%';
        $stmt->bind_param('s', $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        $sql = "SELECT * FROM movies ORDER BY id DESC";
        $result = $conn->query($sql);
    }

    if ($result && $result->num_rows > 0) {
        $movies = $result->fetch_all(MYSQLI_ASSOC);
    }
    ?>

    <div class="movies-grid">
        <?php if (empty($movies)): ?>
            <div style="grid-column: 1 / -1; text-align: center; padding: 40px; color: #666;">
                <?php if ($search): ?>
                    Không tìm thấy phim nào với từ khóa "<?= htmlspecialchars($search) ?>"
                <?php else: ?>
                    Không có phim nào được tìm thấy.
                <?php endif; ?>
            </div>
        <?php else: ?>
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
        <?php endif; ?>
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
</body>

</html>