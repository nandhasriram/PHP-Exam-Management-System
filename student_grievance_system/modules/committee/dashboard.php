<?php
// Start session and check if the user is a committee member
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../../login.php');
    exit();
}

// Include database connection and header
require_once '../../config/db.php';
include '../../includes/header.php';

// Fetch grievances assigned to the logged-in committee member using the committee_assignments table
$sql = "SELECT g.id, g.student_id, g.grievance_type, g.status, ca.assigned_at
        FROM grievances g
        JOIN committee_assignments ca ON g.id = ca.grievance_id
        WHERE ca.committee_member_id = :committee_member_id";

$stmt = $pdo->prepare($sql);
$stmt->execute(['committee_member_id' => $_SESSION['user_id']]);
$grievances = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h1>Committee Dashboard</h1>
<p>Welcome to the Committee Dashboard, here you can view and manage grievances assigned to your committee.</p>

<table>
    <thead>
        <tr>
            <th>Grievance ID</th>
            <th>Student ID</th>
            <th>Grievance Type</th>
            <th>Status</th>
            <th>Assigned At</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($grievances as $grievance): ?>
        <tr>
            <td><?php echo $grievance['id']; ?></td>
            <td><?php echo $grievance['student_id']; ?></td>
            <td><?php echo ucfirst($grievance['grievance_type']); ?></td>
            <td><?php echo ucfirst($grievance['status']); ?></td>
            <td><?php echo $grievance['assigned_at']; ?></td>
            <td>
                <a href="manage_grievances.php?id=<?php echo $grievance['id']; ?>">Manage</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php include '../../includes/footer.php'; ?>
