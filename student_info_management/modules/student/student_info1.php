<?php
session_start();

// Include the database connection file
include '../../config/db.php';  // Ensure this initializes $conn for a PDO connection

// Include template files
include '../../templates/header.php';

try {
    // Fetch student application records from the `admisapplicastuddetai` table
    $query = "SELECT * FROM admisapplicastuddetail";
    $stmt = $conn->prepare($query);  
    $stmt->execute();
    $student_records = $stmt->fetchAll(PDO::FETCH_ASSOC);  // Fetch all records
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<div class="container mt-5">
    <h2>Student Applications</h2>
    <!-- Generate Report Button -->
    <a href="generate_report.php" class="btn btn-info mb-3">Generate Report</a>

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

    <!-- Check if student application records exist -->
    <?php if (empty($student_records)): ?>
        <div class="alert alert-warning" role="alert">
            No student application records found.
        </div>
    <?php else: ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Admission No</th>
                    <th>Student Name</th>
                    <th>Date of Birth Date</th>
                    <th>Date of Birth Month</th>
                    <th>Date of Birth Year</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Mother Tongue</th>
                    <th>Caste</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($student_records as $record): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($record['id']); ?></td>
                        <td><?php echo htmlspecialchars($record['AdmissionNo']); ?></td>
                        <td><?php echo htmlspecialchars($record['StudentName']); ?></td>
                        <td><?php echo htmlspecialchars($record['dobdd']); ?></td>
                        <td><?php echo htmlspecialchars($record['dobmm']); ?></td>
                        <td><?php echo htmlspecialchars($record['dobyy']); ?></td>
                        <td><?php echo htmlspecialchars($record['Gender']); ?></td>
                        <td><?php echo htmlspecialchars($record['Age']); ?></td>
                        <td><?php echo htmlspecialchars($record['MotherTongue']); ?></td>
                        <td><?php echo htmlspecialchars($record['Caste']); ?></td>
                        <td><?php echo htmlspecialchars($record['PresentAddress1']); ?></td>
                        <td>
                            

                            <a href="view.php?id=<?php echo urlencode($record['id']); ?>" class="btn btn-outline-primary">
                                <i class="fas fa-view"></i> View
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
