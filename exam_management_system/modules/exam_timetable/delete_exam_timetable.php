<?php
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM exam_timetable WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Timetable deleted successfully."); window.location.href="exam_timetable.php";</script>';
    } else {
        echo '<script>alert("Error deleting timetable: ' . $conn->error . '"); window.location.href="exam_timetable.php";</script>';
    }
} else {
    echo '<script>window.location.href="exam_timetable.php";</script>';
}
?>
