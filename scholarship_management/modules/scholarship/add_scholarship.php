<?php
session_start();
ob_start();  // Start output buffering
include '../../config/db.php';
include '../../templates/header.php';
include '../../templates/navbar.php';

// Initialize a variable to store the message
$message = '';

// Check if the URL contains a 'success' query parameter
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    $message = '<div class="message-box success">Scholarship record added successfully. <a href="list_scholarships.php">Go Back</a></div>';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve posted data
    $scholarship_id = $_POST['scholarship_id'];
    $scholarship_name = $_POST['scholarship_name'];
    $description = $_POST['description'];
    $eligibility_criteria = $_POST['eligibility_criteria'];
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];

    // Insert query to add a scholarship (without 'id' since it's AUTO_INCREMENT)
    $query = "INSERT INTO scholarships 
              (scholarship_id, scholarship_name, description, eligibility_criteria, amount, deadline) 
              VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Execute the query and check for success
    if ($stmt->execute([$scholarship_id, $scholarship_name, $description, $eligibility_criteria, $amount, $deadline])) {
        // Redirect to the same page with a success flag in the URL
        header('Location: ../../dashboard.php?success=true');
        exit();  // Stop further execution after the redirect
    } else {
        $message = '<div class="message-box error">Failed to add scholarship record. Please try again.</div>';
    }
}
?>

<div class="container">
    <h2>Add Scholarship</h2>

    <!-- Display the message if it's set -->
    <?php if ($message) echo $message; ?>

    <form method="POST" action="add_scholarship.php">
        <div class="form-group">
            <label for="scholarship_id">Scholarship ID</label>
            <input type="number" class="form-control" id="scholarship_id" name="scholarship_id" required>
        </div>
        <div class="form-group">
            <label for="scholarship_name">Scholarship Name</label>
            <input type="text" class="form-control" id="scholarship_name" name="scholarship_name" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="eligibility_criteria">Eligibility Criteria</label>
            <textarea class="form-control" id="eligibility_criteria" name="eligibility_criteria" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="amount">Amount</label>
            <input type="number" class="form-control" id="amount" name="amount" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="deadline">Deadline</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Scholarship</button>
    </form>

    <!-- Back Button -->
    <a href="../../dashboard.php" class="btn btn-secondary mt-3">Back</a>
</div>

<?php 
include '../../templates/footer.php'; 
ob_end_flush();  // Flush the output buffer
?>
