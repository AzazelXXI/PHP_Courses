<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
    <?php $base_url = '/PHP_Courses/crud/' ?>
    <link rel="stylesheet" href="<?php echo $base_url . "css/styles.css"?>">
</head>
<body>
    <nav>
        <p><a href="<?php echo $base_url . "index.php"?>">Home</a></p>
        <p><a href="<?php echo $base_url . "views/create.php"?>">Create</a></p>
        <p><a href="<?php echo $base_url . "views/read.php"?>">Read</a></p>
        <p><a href="<?php echo $base_url . "views/update.php"?>">Update</a></p>
        <p><a href="<?php echo $base_url . "views/delete.php"?>">Delete</a></p>
    </nav>
</body>
</html>