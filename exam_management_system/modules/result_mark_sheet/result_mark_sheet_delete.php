<?php
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete from exam_timetable table
    $deleteTimetableQuery = "DELETE FROM exam_timetable WHERE id='$id'";
    
    if ($conn->query($deleteTimetableQuery) === TRUE) {
        // Optionally, you could also delete associated records from the result_mark_sheet table
        $deleteResultQuery = "DELETE FROM result_mark_sheet WHERE exam_id='$id'";
        
        if ($conn->query($deleteResultQuery) === TRUE) {
            echo '<script>alert("Timetable and associated results deleted successfully."); window.location.href="exam_timetable.php";</script>';
        } else {
            echo '<script>alert("Timetable deleted but error deleting associated results: ' . $conn->error . '"); window.location.href="exam_timetable.php";</script>';
        }
    } else {
        echo '<script>alert("Error deleting timetable: ' . $conn->error . '"); window.location.href="exam_timetable.php";</script>';
    }
} else {
    echo '<script>window.location.href="result_mark_sheet.php";</script>';
}
?>
