<?php
// Include database connection and header
require_once '../../config/db.php';
include '../../includes/header.php';

include '../student/sidebar.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Fetch the grievances submitted by this student
$sql = "SELECT * FROM grievances WHERE student_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT); // Bind the user ID parameter
$stmt->execute();

$grievances = $stmt->fetchAll();
?>

<h1>Your Submitted Grievances</h1>
<table border="1">
    <tr>
        <th>Grievance ID</th>
        <th>Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Submission Date</th>
    </tr>
    <?php foreach ($grievances as $grievance): ?>
        <tr>
            <td><?php echo $grievance['grievance_id']; ?></td>
            <td><?php echo $grievance['grievance_type']; ?></td>
            <td><?php echo $grievance['description']; ?></td>
            <td><?php echo $grievance['status']; ?></td>
            <td><?php echo $grievance['submission_date']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>

<?php include '../../includes/footer.php'; ?>
