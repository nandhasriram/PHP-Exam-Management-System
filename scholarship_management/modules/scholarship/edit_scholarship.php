<?php
session_start();
ob_start();
include '../../config/db.php'; // Ensure your db.php file uses PDO connection
include '../../templates/header.php';
include '../../templates/navbar.php';

// Fetch scholarship record by ID
$scholarship = null;
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the SQL query using PDO to fetch the scholarship record by ID
        $query = "SELECT * FROM scholarships WHERE scholarship_id = :id";
        $stmt = $conn->prepare($query);

        // Bind parameters and execute
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Fetch result
        $scholarship = $stmt->fetch(PDO::FETCH_ASSOC); // Use fetch() for PDO

        // Check if scholarship record was found
        if (!$scholarship) {
            // Redirect to the scholarship list if the ID is not valid
            header("Location: list_scholarships.php?error=notfound");
            exit();
        }
    } catch (Exception $e) {
        // Handle any database errors
        echo "Error fetching scholarship: " . $e->getMessage();
        exit();
    }
}

// Process form update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $scholarship_name = $_POST['scholarship_name'];
    $description = $_POST['description'];
    $eligibility_criteria = $_POST['eligibility_criteria'];
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];

    try {
        // Prepare the update query using PDO
        $query = "UPDATE scholarships SET scholarship_name = :scholarship_name, description = :description, 
                  eligibility_criteria = :eligibility_criteria, amount = :amount, 
                  deadline = :deadline WHERE scholarship_id = :id";
        $stmt = $conn->prepare($query);

        // Bind parameters and execute the statement
        $stmt->bindParam(':scholarship_name', $scholarship_name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':eligibility_criteria', $eligibility_criteria);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':deadline', $deadline);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Redirect back to the scholarship list after successful update
        header("Location: list_scholarships.php?success=updated");
        exit();
    } catch (Exception $e) {
        // Handle any database errors
        echo "Error updating scholarship: " . $e->getMessage();
        exit();
    }
}
?>

<div class="container">
    <h2>Edit Scholarship</h2>

    <?php if ($scholarship): ?>
    <form method="POST" action="edit_scholarship.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($scholarship['scholarship_id']); ?>">

        <div class="form-group">
            <label for="scholarship_name">Scholarship Name</label>
            <input type="text" class="form-control" id="scholarship_name" name="scholarship_name" value="<?php echo htmlspecialchars($scholarship['scholarship_name']); ?>" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required><?php echo htmlspecialchars($scholarship['description']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="eligibility_criteria">Eligibility Criteria</label>
            <textarea class="form-control" id="eligibility_criteria" name="eligibility_criteria" rows="3" required><?php echo htmlspecialchars($scholarship['eligibility_criteria']); ?></textarea>
        </div>

        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="<?php echo htmlspecialchars($scholarship['amount']); ?>" required>
        </div>

        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" value="<?php echo htmlspecialchars($scholarship['deadline']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Scholarship</button>
        <a href="list_scholarships.php" class="btn btn-secondary">Back</a>
    </form>
    <?php else: ?>
        <p class="text-danger">Scholarship not found. Please go back to the <a href="list_scholarships.php">scholarship list</a>.</p>
    <?php endif; ?>
</div>

<?php include '../../templates/footer.php'; ?>
