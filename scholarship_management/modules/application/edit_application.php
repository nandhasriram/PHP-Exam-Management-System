<?php
session_start();
ob_start();
include '../../config/db.php'; // Ensure your db.php file uses PDO connection
include '../../templates/header.php';
include '../../templates/navbar.php';

// Fetch application record by ID
$application = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the SQL query using PDO to fetch the application record by ID
        $query = "SELECT * FROM applications WHERE id = :id";
        $stmt = $conn->prepare($query);

        // Bind parameters and execute
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch result
        $application = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() for PDO

        // Check if application record was found
        if (!$application) {
            // Redirect to the application list if the ID is not valid
            header("Location: list_applications.php?error=notfound");
            exit();
        }
    } catch (Exception $e) {
        // Handle any database errors
        echo "Error fetching application: " . $e->getMessage();
        exit();
    }
}

// Process form update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $scholarship_name = $_POST['scholarship_name'];
    $department = $_POST['department'];
    $cast = $_POST['cast'];
    $father_name = $_POST['father_name'];
    $father_occupation = $_POST['father_occupation'];
    $mother_name = $_POST['mother_name'];
    $mother_occupation = $_POST['mother_occupation'];
    $status = $_POST['status'];

    try {
        // Prepare the update query using PDO
        $query = "UPDATE applications SET student_name = :student_name, scholarship_name = :scholarship_name, 
                  department = :department, cast = :cast, 
                  father_name = :father_name, father_occupation = :father_occupation, 
                  mother_name = :mother_name, mother_occupation = :mother_occupation, 
                  status = :status WHERE id = :id";
        $stmt = $conn->prepare($query);

        // Bind parameters and execute the statement
        $stmt->bindParam(':student_name', $student_name);
        $stmt->bindParam(':scholarship_name', $scholarship_name);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':cast', $cast);
        $stmt->bindParam(':father_name', $father_name);
        $stmt->bindParam(':father_occupation', $father_occupation);
        $stmt->bindParam(':mother_name', $mother_name);
        $stmt->bindParam(':mother_occupation', $mother_occupation);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect back to the application list after successful update
        header("Location: list_applications.php?success=updated");
        exit();
    } catch (Exception $e) {
        // Handle any database errors
        echo "Error updating application: " . $e->getMessage();
        exit();
    }
}
?>

<div class="container">
    <h2>Edit Application</h2>

    <?php if ($application): ?>
    <form method="POST" action="edit_application.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($application['id']); ?>">

        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" class="form-control" id="student_name" name="student_name" value="<?php echo htmlspecialchars($application['student_name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="scholarship_name">Scholarship Name</label>
            <input type="text" class="form-control" id="scholarship_name" name="scholarship_name" value="<?php echo htmlspecialchars($application['scholarship_name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <input type="text" class="form-control" id="department" name="department" value="<?php echo htmlspecialchars($application['department']); ?>" required>
        </div>

        <div class="form-group">
            <label for="cast">Cast</label>
            <input type="text" class="form-control" id="cast" name="cast" value="<?php echo htmlspecialchars($application['cast']); ?>" required>
        </div>

        <div class="form-group">
            <label for="father_name">Father's Name</label>
            <input type="text" class="form-control" id="father_name" name="father_name" value="<?php echo htmlspecialchars($application['father_name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="father_occupation">Father's Occupation</label>
            <input type="text" class="form-control" id="father_occupation" name="father_occupation" value="<?php echo htmlspecialchars($application['father_occupation']); ?>" required>
        </div>

        <div class="form-group">
            <label for="mother_name">Mother's Name</label>
            <input type="text" class="form-control" id="mother_name" name="mother_name" value="<?php echo htmlspecialchars($application['mother_name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="mother_occupation">Mother's Occupation</label>
            <input type="text" class="form-control" id="mother_occupation" name="mother_occupation" value="<?php echo htmlspecialchars($application['mother_occupation']); ?>" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="Pending" <?php if ($application['status'] == 'Pending') echo 'selected'; ?>>Pending</option>
                <option value="Approved" <?php if ($application['status'] == 'Approved') echo 'selected'; ?>>Approved</option>
                <option value="Rejected" <?php if ($application['status'] == 'Rejected') echo 'selected'; ?>>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Application</button>
        <a href="list_applications.php" class="btn btn-secondary">Back</a>
    </form>
    <?php else: ?>
        <p class="text-danger">Application not found. Please go back to the <a href="list_applications.php">application list</a>.</p>
    <?php endif; ?>
</div>

<?php include '../../templates/footer.php'; ?>
