<?php
// Include database configuration
require_once 'config/database.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize inputs
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $body = htmlspecialchars(trim($_POST['body']));

    // Basic validation
    if (empty($name) || empty($email) || empty($body)) {
        die("Please fill in all fields.");
    }

    // Prepare SQL insert
    $sql = "INSERT INTO feedback (name, email, body) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind and execute
    $stmt->bind_param("sss", $name, $email, $body);
    if ($stmt->execute()) {
        echo "Feedback submitted successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
