<?php
include '../../config/config.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM room_allocation WHERE id='$id'";
    
    if ($conn->query($query) === TRUE) {
        echo '<script>alert("Room allocation deleted successfully."); window.location.href="room_allocation.php";</script>';
    } else {
        echo '<script>alert("Error deleting room allocation: ' . $conn->error . '"); window.location.href="room_allocation.php";</script>';
    }
} else {
    echo '<script>window.location.href="room_allocation.php";</script>';
}
?>
