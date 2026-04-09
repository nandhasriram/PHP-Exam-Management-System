<?php
session_start();
include '../../config/db.php'; // Ensure your db.php file uses a PDO connection

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the DELETE query using PDO for the scholarships table
        $query = "DELETE FROM scholarships WHERE id = :id";
        $stmt = $conn->prepare($query);

        // Bind the 'id' parameter and execute the statement
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            // Redirect back to the scholarships list with a success message
            header('Location: list_scholarships.php?success=RecordDeleted');
        } else {
            // Redirect back with an error message
            header('Location: list_scholarships.php?error=RecordNotDeleted');
        }
    } catch (Exception $e) {
        // Handle any database errors
        echo "Error deleting scholarship: " . $e->getMessage();
    }
} else {
    // Redirect back if no id is provided in the URL
    header('Location: list_scholarships.php');
    exit();
}
?>
