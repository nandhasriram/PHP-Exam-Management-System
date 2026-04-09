<?php
// Include the database connection
require_once '../../config/db.php';

// Check if the ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    // Redirect to manage_users.php after deletion
    header('Location: manage_users.php');
}
