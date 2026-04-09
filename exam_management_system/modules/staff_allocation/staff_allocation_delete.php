<?php
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM staff_allocation WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Staff allocation deleted successfully."); window.location.href="staff_allocation.php";</script>';
    } else {
        echo '<script>alert("Error deleting staff allocation: ' . $conn->error . '"); window.location.href="staff_allocation.php";</script>';
    }
} else {
    echo '<script>window.location.href="staff_allocation.php";</script>';
}
?>
