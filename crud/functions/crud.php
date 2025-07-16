<?php

include 'database/database.php';

// 
function addUser($conn, $name, $age, $email)
{
    

    $stmt = $conn->prepare("INSERT INTO user(name, age, email) VALUES (?, ?, ?)");

    $stmt->bind_param("sis", $name, $age, $email);

    if ($stmt->execute()) {
        echo "<h2>User added successully</h2>";
    } else {
        echo "Error: " . $stmt;
    }

    $stmt->close();
}
