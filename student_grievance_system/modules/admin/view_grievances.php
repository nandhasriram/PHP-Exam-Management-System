<?php
// Include the database connection
require_once '../../config/db.php';

// Include the header
include '../../includes/header.php';

include '../admin/sidebar.php';

// Fetch all grievances
$grievances = $pdo->query("SELECT * FROM grievances")->fetchAll();
?>

<h1>All Grievances</h1>
<table border="1">
    <tr>
        <th>Grievance ID</th>
        <th>Student ID</th>
        <th>Grievance Type</th>
        <th>Description</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($grievances as $grievance): ?>
        <tr>
            <td><?php echo $grievance['grievance_id']; ?></td>
            <td><?php echo $grievance['student_id']; ?></td>
            <td><?php echo $grievance['grievance_type']; ?></td>
            <td><?php echo $grievance['description']; ?></td>
            <td><?php echo $grievance['status']; ?></td>
            <td>
                <a href="assign_committee.php?id=<?php echo $grievance['grievance_id']; ?>">Assign to Committee</a>
                <a href="update_status.php?id=<?php echo $grievance['grievance_id']; ?>">Update Status</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php
// Include the footer
include '../../includes/footer.php';
?>
