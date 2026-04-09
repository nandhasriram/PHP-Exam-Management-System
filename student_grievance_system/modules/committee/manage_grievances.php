<?php
// Start session and check if the committee member is logged in
session_start();
if (!isset($_SESSION['committee_id'])) {
    header('Location: ../../login.php');
    exit();
}

// Include database connection and header
require_once '../../config/db.php';
include '../../includes/header.php';

if (isset($_GET['id'])) {
    $grievance_id = $_GET['id'];

    // Fetch the grievance details
    $sql = "SELECT * FROM grievances WHERE id = :grievance_id AND assigned_committee = :committee_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'grievance_id' => $grievance_id,
        'committee_id' => $_SESSION['committee_id']
    ]);
    $grievance = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$grievance) {
        echo "Grievance not found or not assigned to this committee.";
        exit();
    }
} else {
    header('Location: dashboard.php');
    exit();
}
?>

<h1>Manage Grievance #<?php echo $grievance['id']; ?></h1>

<p><strong>Student ID:</strong> <?php echo $grievance['student_id']; ?></p>
<p><strong>Grievance Type:</strong> <?php echo ucfirst($grievance['grievance_type']); ?></p>
<p><strong>Description:</strong> <?php echo $grievance['description']; ?></p>
<p><strong>Status:</strong> <?php echo ucfirst($grievance['status']); ?></p>

<form action="update_status.php" method="post">
    <input type="hidden" name="grievance_id" value="<?php echo $grievance['id']; ?>">
    <label for="status">Update Status:</label>
    <select name="status" id="status" required>
        <option value="pending" <?php echo $grievance['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
        <option value="in_progress" <?php echo $grievance['status'] == 'in_progress' ? 'selected' : ''; ?>>In Progress</option>
        <option value="resolved" <?php echo $grievance['status'] == 'resolved' ? 'selected' : ''; ?>>Resolved</option>
    </select>
    <button type="submit">Update Status</button>
</form>

<?php include '../../includes/footer.php'; ?>
