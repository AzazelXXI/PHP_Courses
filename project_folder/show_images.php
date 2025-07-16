<?php
require 'db.php';

// Get search and filter inputs
$search = isset($_GET['q']) ? trim($_GET['q']) : '';
$typeFilter = isset($_GET['type']) ? $_GET['type'] : 'all';

// Base query
$query = "SELECT filename, filepath FROM images WHERE 1";

// Apply search filter
$params = [];
$types = '';
if ($search !== '') {
    $query .= " AND filename LIKE ?";
    $params[] = '%' . $search . '%';
    $types .= 's';
}

// Apply type filter
if ($typeFilter !== 'all') {
    $query .= " AND filepath LIKE ?";
    $params[] = '%.' . $typeFilter;
    $types .= 's';
}

$query .= " ORDER BY uploaded_at DESC";

$stmt = $conn->prepare($query);

// Bind parameters dynamically
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Image Gallery with Filter</title>
</head>

<body>
    <h2>Uploaded Images</h2>

    <!-- Search and Filter Form -->
    <form method="GET" action="show_images.php">
        <input type="text" name="q" placeholder="Search by filename..." value="<?php echo htmlspecialchars($search); ?>">

        <select name="type">
            <option value="all" <?php if ($typeFilter === 'all') echo 'selected'; ?>>All Types</option>
            <option value="jpg" <?php if ($typeFilter === 'jpg') echo 'selected'; ?>>JPG</option>
            <option value="jpeg" <?php if ($typeFilter === 'jpeg') echo 'selected'; ?>>JPEG</option>

            <option value="png" <?php if ($typeFilter === 'png') echo 'selected'; ?>>PNG</option>
            <option value="gif" <?php if ($typeFilter === 'gif') echo 'selected'; ?>>GIF</option>
        </select>

        <input type="submit" value="Filter">
    </form>

    <br>

    <!-- Show Filtered Images -->
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div style="margin: 10px; display: inline-block;">
                <img src="<?php echo htmlspecialchars($row['filepath']); ?>" width="200" alt="<?php echo htmlspecialchars($row['filename']); ?>">
                <p><?php echo htmlspecialchars($row['filename']); ?></p>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No images found<?php echo $search ? ' for "' . htmlspecialchars($search) . '"' : ''; ?>.</p>
    <?php endif; ?>

</body>

</html>

<?php $conn->close(); ?>