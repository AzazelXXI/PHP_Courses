<style>
    .navbar {
        width: 100%;
        background: #343a40;
        padding: 12px 0 10px 0;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        margin-bottom: 32px;
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
</style>

<nav class="navbar">
    <div class="nav-links">
        <a href="index.php"><button>Home</button></a>
        <a href="movies.php"><button>Add Movie</button></a>
    </div>
</nav>