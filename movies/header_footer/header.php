<style>
    .navbar {
        width: 100%;
        background: #343a40;
        padding: 12px 15px 10px 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .navbar .nav-links {
        display: flex;
        justify-content: center;
        gap: 18px;
    }

    .navbar a button {
        background: #007bff;
        color: #fff;
        border: none;
        padding: 8px 22px;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.2s;
    }

    .navbar a button:hover {
        background: #0056b3;
    }

    .navbar .search-container {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .navbar .search-input {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        width: 180px;
    }

    .navbar .search-input:focus {
        outline: none;
        border-color: #007bff;
    }

    .navbar .search-btn {
        padding: 8px 16px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
    }

    .navbar .search-btn:hover {
        background: #218838;
    }

    .navbar .clear-btn {
        padding: 8px 16px;
        background: #6c757d;
        color: white;
        text-decoration: none;
        border-radius: 4px;
        display: inline-block;
        font-size: 14px;
    }

    .navbar .clear-btn:hover {
        background: #5a6268;
    }
</style>

<nav class="navbar">
    <div class="nav-links">
        <a href="index.php"><button>Home</button></a>
        <a href="movies.php"><button>Add Movie</button></a>
    </div>

    <div class="search-container">
        <form method="GET" action="index.php" style="display: flex; align-items: center; gap: 8px;">
            <input type="text" name="search" placeholder="Tìm kiếm phim..."
                value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>"
                class="search-input">
            <button type="submit" class="search-btn">Tìm kiếm</button>
            <?php if (isset($_GET['search']) && !empty($_GET['search'])): ?>
                <a href="index.php" class="clear-btn">Xóa bộ lọc</a>
            <?php endif; ?>
        </form>
    </div>
</nav>