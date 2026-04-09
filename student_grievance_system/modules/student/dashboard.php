<?php
// Include the necessary files
require_once '../../config/db.php';
include '../../includes/header.php';
include '../student/sidebar.php';

// Start the session for student management
session_start();

// Ensure the student is logged in, if not redirect to login page
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../auth/login.php');
    exit();
}

// Retrieve the student ID from session
$user_id = $_SESSION['user_id'];
?>

<h1>Welcome, Student</h1>

<div class="container">
    <div class="actions">
        <a href="submit_grievance.php">Submit New Grievances</a>
        <a href="view_grievance.php">View Submitted Grievances</a>
        <a href="grievance_status.php">Check Grievance Status</a>
        <a href="profile.php">View Profile</a>
    </div>
</div>

<?php include '../../includes/footer.php'; ?>
