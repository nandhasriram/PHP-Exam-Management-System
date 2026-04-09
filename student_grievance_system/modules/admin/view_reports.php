<?php
// Include the database connection
require_once '../../config/db.php';

include '../../includes/header.php';

include '../admin/sidebar.php';

// Fetch reports data
$reportData = $pdo->query("
    SELECT grievance_type, COUNT(*) as count 
    FROM grievances 
    GROUP BY grievance_type
")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Reports</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h1>Grievance Reports</h1>
    <table border="1">
        <tr>
            <th>Grievance Type</th>
            <th>Number of Grievances</th>
        </tr>
        <?php foreach ($reportData as $report): ?>
            <tr>
                <td><?php echo $report['grievance_type']; ?></td>
                <td><?php echo $report['count']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
<?php
// Include the footer
include '../../includes/footer.php';
?>
</html>
