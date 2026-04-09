<?php
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM exam_table WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Exam record deleted successfully."); window.location.href="exam_table.php";</script>';
    } else {
        echo '<script>alert("Error deleting exam record: ' . $conn->error . '"); window.location.href="exam_table.php";</script>';
    }
} else {
    echo '<script>window.location.href="exam_table.php";</script>';
}
?>
