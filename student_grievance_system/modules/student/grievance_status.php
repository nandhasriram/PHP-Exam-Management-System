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

// Fetch the grievances with status for this student
$sql = "SELECT grievance_id, status FROM grievances WHERE student_id = :user_id"; // Corrected column name to 'student_id'
$stmt = $pdo->prepare($sql);
$stmt->execute(['user_id' => $user_id]); // Properly bind the parameter
$grievances = $stmt->fetchAll();
?>

<h1>Grievance Status</h1>
<table border="1">
    <tr>
        <th>Grievance ID</th>
        <th>Status</th>
    </tr>
    <?php foreach ($grievances as $grievance): ?>
        <tr>
            <td><?php echo $grievance['grievance_id']; ?></td>
            <td><?php echo $grievance['status']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<!-- Back button to navigate to dashboard -->
<br>
<a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>

<?php include '../../includes/footer.php'; ?>
