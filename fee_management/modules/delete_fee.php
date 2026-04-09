<?php
session_start();
include '../config/db.php'; // Ensure the database connection file is included

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input to prevent SQL injection

    // Prepare the DELETE query for the 'feereceipt' table
    $query = "DELETE FROM feereceipt WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Bind the parameter and execute the statement
    if ($stmt->execute([$id])) {
        // Redirect back with a success message
        header('Location: manage_fee.php?success=RecordDeleted');
    } else {
        // Redirect back with an error message
        header('Location: manage_fee.php?error=RecordNotDeleted');
    }
} else {
    // Redirect back if no id is provided in the URL
    header('Location: manage_fee.php?error=NoIDProvided');
    exit();
}
?>
