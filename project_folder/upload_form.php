<!DOCTYPE html>
<html>

<head>
    <title>Upload Image</title>
</head>

<body>
    <h2>Upload an Image</h2>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label>Select image:</label>
        <input type="file" name="image" required>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>

</html>