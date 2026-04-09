<?php
// Include the database connection
require_once '../../config/db.php';

$grievance_id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $status = $_POST['status'];

    // Update the status of the grievance
    $sql = "UPDATE grievances SET status = :status WHERE grievance_id = :grievance_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['status' => $status, 'grievance_id' => $grievance_id]);

    echo "Grievance status updated successfully!";
}

// Fetch current grievance status
$grievance = $pdo->query("SELECT * FROM grievances WHERE grievance_id = $grievance_id")->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Grievance Status</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h1>Update Status for Grievance ID: <?php echo $grievance_id; ?></h1>
    <form action="update_status.php" method="post">
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="pending" <?php echo ($grievance['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
            <option value="in progress" <?php echo ($grievance['status'] == 'in progress') ? 'selected' : ''; ?>>In Progress</option>
            <option value="resolved" <?php echo ($grievance['status'] == 'resolved') ? 'selected' : ''; ?>>Resolved</option>
        </select>
        <button type="submit">Update Status</button>
    </form>
</body>
</html>
