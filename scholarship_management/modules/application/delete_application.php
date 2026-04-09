<?php
session_start();
include '../../config/db.php'; // Ensure your db.php file uses a PDO connection

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the DELETE query using PDO for the applications table
        $query = "DELETE FROM applications WHERE id = :id";
        $stmt = $conn->prepare($query);

        // Bind the 'id' parameter and execute the statement
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Redirect back to the applications list with a success message
            header('Location: list_applications.php?success=RecordDeleted');
        } else {
            // Redirect back with an error message
            header('Location: list_applications.php?error=RecordNotDeleted');
        }
    } catch (Exception $e) {
        // Handle any database errors
        echo "Error deleting application: " . $e->getMessage();
    }
} else {
    // Redirect back if no id is provided in the URL
    header('Location: list_applications.php');
    exit();
}
?>
