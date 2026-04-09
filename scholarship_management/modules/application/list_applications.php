<?php
session_start();

// Include the database connection file
include '../../config/db.php';  // Make sure this properly initializes $conn (PDO connection)

// Include template files
include '../../templates/header.php';
include '../../templates/navbar.php';

// Fetch application records from the `applications` table using PDO
$query = "SELECT * FROM applications";
$stmt = $conn->prepare($query);  
$stmt->execute();
$application_records = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all records
?>

<div class="container mt-5">
    <h2>Scholarship Applications</h2>
    <!-- Generate Report Button -->
    <a href="generate_report.php" class="btn btn-info mb-3">Generate Report</a>

    <a href="fetch_status.php" class="btn btn-info mb-3">Fetch Status</a>
    <!-- Success/Error Messages -->
    <?php if (isset($_GET['success']) && $_GET['success'] === 'RecordDeleted'): ?>
        <div class="alert alert-success" role="alert">
            Application record deleted successfully.
        </div>
    <?php elseif (isset($_GET['error']) && $_GET['error'] === 'RecordNotDeleted'): ?>
        <div class="alert alert-danger" role="alert">
            Error deleting the application record.
        </div>
    <?php endif; ?>

    <!-- Check if application records exist -->
    <?php if (empty($application_records)): ?>
        <div class="alert alert-warning" role="alert">
            No application records found.
        </div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Scholarship ID</th>
                    <th>Student Name</th>
                    <th>Scholarship Name</th>
                    <th>Department</th>
                    <th>Cast</th>
                    <th>Father Name</th>
                    <th>Father Occupation</th>
                    <th>Mother Name</th>
                    <th>Mother Occupation</th>
                    <th>Application Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($application_records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['id']); ?></td>
                        <td><?php echo htmlspecialchars($record['student_id']); ?></td>
                        <td><?php echo htmlspecialchars($record['scholarship_id']); ?></td>
                        <td><?php echo htmlspecialchars($record['student_name']); ?></td>
                        <td><?php echo htmlspecialchars($record['scholarship_name']); ?></td>
                        <td><?php echo htmlspecialchars($record['department']); ?></td>
                        <td><?php echo htmlspecialchars($record['cast']); ?></td>
                        <td><?php echo htmlspecialchars($record['father_name']); ?></td>
                        <td><?php echo htmlspecialchars($record['father_occupation']); ?></td>
                        <td><?php echo htmlspecialchars($record['mother_name']); ?></td>
                        <td><?php echo htmlspecialchars($record['mother_occupation']); ?></td>
                        <td><?php echo htmlspecialchars($record['application_date']); ?></td>
                        <td><?php echo htmlspecialchars($record['status']); ?></td>
                        <td>
                            <!-- Edit Button -->
                            <a href="edit_application.php?id=<?php echo urlencode($record['id']); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <!-- Delete Button -->
                            <a href="delete_application.php?id=<?php echo urlencode($record['id']); ?>" class="btn btn-outline-danger" onclick="return confirm('Are you sure you want to delete this record?');">
                                <i class="fas fa-trash-alt"></i> Delete
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
    <a href="../../dashboard.php" class="btn btn-secondary mt-3">Back To Dashboard</a>
</div>

<!-- JavaScript to remove query params after page load -->
<script>
    window.addEventListener('DOMContentLoaded', function () {
        if (window.location.search.indexOf('success=RecordDeleted') !== -1 || window.location.search.indexOf('error=RecordNotDeleted') !== -1) {
            setTimeout(function () {
                window.history.replaceState({}, document.title, window.location.pathname);
            }, 3000);
        }
    });
</script>

<?php include '../../templates/footer.php'; ?> 
