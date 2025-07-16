<?php
require 'db.php';

$targetDir = "uploads/";
// $filename = basename($_FILES["image"]["name"]);
$extension = strtolower(pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION));
$filename = uniqid("img_", true) . "." . $extension;

// uploads/a121.jpg
$targetFile = $targetDir . $filename;
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$uploadOk = 1;

if (isset($_POST["submit"])) {
    // check if it's a image or not
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }

    // File already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // File size check (2MB)
    if ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allowed formats
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowed)) {
        echo "Only JPG, JPEG, PNG & GIF are allowed.<br>";
        $uploadOk = 0;
    }

    // Move & Save
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            // Insert into DB
            $stmt = $conn->prepare("INSERT INTO images (filename, filepath) VALUES (?, ?)");
            $stmt->bind_param("ss", $filename, $targetFile);

            if ($stmt->execute()) {
                echo "File uploaded and saved to database successfully.";
            } else {
                echo "Database error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    }
}

$conn->close();
