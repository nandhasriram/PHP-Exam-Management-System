<?php
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Use a prepared statement for security to prevent SQL injection
    $query = $conn->prepare("DELETE FROM exam_subject_table WHERE id = ?");
    $query->bind_param("i", $id); // Bind the `id` as an integer

    if ($query->execute()) {
        echo '<script>alert("Subject record deleted successfully."); window.location.href="exam_subject_table.php";</script>';
    } else {
        echo '<script>alert("Error deleting subject record: ' . $conn->error . '"); window.location.href="exam_subject_table.php";</script>';
    }

    $query->close(); // Close the prepared statement
} else {
    echo '<script>window.location.href="exam_subject_table.php";</script>';
}

$conn->close(); // Close the database connection
?>
