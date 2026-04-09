<?php
// Include the database connection
require_once '../../config/db.php';

// Fetch some basic statistics, e.g., total grievances, pending grievances, resolved grievances
$totalGrievances = $pdo->query("SELECT COUNT(*) FROM grievances")->fetchColumn();
$pendingGrievances = $pdo->query("SELECT COUNT(*) FROM grievances WHERE status = 'pending'")->fetchColumn();
$resolvedGrievances = $pdo->query("SELECT COUNT(*) FROM grievances WHERE status = 'resolved'")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="statistics">
        <p>Total Grievances: <?php echo $totalGrievances; ?></p>
        <p>Pending Grievances: <?php echo $pendingGrievances; ?></p>
        <p>Resolved Grievances: <?php echo $resolvedGrievances; ?></p>
    </div>
    <div class="actions">
        <a href="view_grievances.php">View All Grievances</a>
        <a href="manage_users.php">Manage Users</a>
        <a href="view_reports.php">View Reports</a>
    </div>
</body>
</html>
