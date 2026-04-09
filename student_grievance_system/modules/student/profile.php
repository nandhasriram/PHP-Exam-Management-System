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

// Fetch student details using 'id' instead of 'user_id'
$sql = "SELECT * FROM users WHERE id = :id"; // Changed to 'id'
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $user_id]); // Changed key to 'id'
$student = $stmt->fetch();
?>

<h1>Your Profile</h1>
<table border="1">
    <tr>
        <th>Student ID</th>
        <td><?php echo $student['id']; ?></td> <!-- Changed to 'id' -->
    </tr>
    <tr>
        <th>Name</th>
        <td><?php echo $student['name']; ?></td>
    </tr>
    <tr>
        <th>Email</th>
        <td><?php echo $student['email']; ?></td>
    </tr>
    <tr>
        <th>Department</th>
        <td><?php echo $student['department']; ?></td>
    </tr>
    <!-- Add any other relevant fields -->
</table>
<a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>

<?php include '../../includes/footer.php'; ?>
