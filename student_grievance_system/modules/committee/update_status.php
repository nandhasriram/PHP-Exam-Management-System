<?php
// Start session and check user is committee member
session_start();
if (!isset($_SESSION['committee_id'])) {
    header('Location: ../../login.php');
    exit();
}

// Include database connection
require_once '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grievance_id = $_POST['grievance_id'];
    $status = $_POST['status'];

    // Update the status of the grievance
    $sql = "UPDATE grievances SET status = :status WHERE id = :grievance_id AND assigned_committee = :committee_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'status' => $status,
        'grievance_id' => $grievance_id,
        'committee_id' => $_SESSION['committee_id']
    ]);

    echo "Status updated successfully!";
    header('Location: dashboard.php');
    exit();
} else {
    header('Location: dashboard.php');
    exit();
}
?>
