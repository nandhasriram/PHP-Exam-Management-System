<?php
// Include database connection and header
require_once '../../config/db.php';
include '../../includes/header.php';

include '../student/sidebar.php';

session_start();

// Ensure session contains student_id
if (!isset($_SESSION['user_id'])) {
    echo "Error: Student is not logged in.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_SESSION['user_id']; // Retrieve student_id from session
    $student_name = $_POST['student_name'];
    $grievance_type = $_POST['grievance_type'];
    $description = $_POST['description'];

    // Insert the new grievance into the database
    $sql = "INSERT INTO grievances (student_id, student_name, grievance_type, description, status, submission_date) 
            VALUES (:student_id, :student_name, :grievance_type, :description, 'pending', CURRENT_TIMESTAMP)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'student_id' => $student_id,
        'student_name' => $student_name,
        'grievance_type' => $grievance_type,
        'description' => $description
    ]);

    echo "Grievance submitted successfully!";
}
?>

<h1>Submit New Grievance</h1>
<form action="submit_grievance.php" method="post" class="grievance-form">
    <div class="form-group">
        <label for="student_name">Student Name:</label>
        <input type="text" name="student_name" id="student_name" required>
    </div>

    <div class="form-group">
        <label for="grievance_type">Grievance Type:</label>
        <select name="grievance_type" id="grievance_type" required>
            <option value="academic">Academic</option>
            <option value="administrative">Administrative</option>
            <option value="hostel">Hostel</option>
            <option value="infrastructure">Infrastructure</option>
            <!-- Add other types as needed -->
        </select>
    </div>

    <div class="form-group">
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="5" required></textarea>
    </div>
    
    <div class="form-buttons">
        <button type="submit" class="submit-btn">Submit</button>
        <a href="../../dashboard.php" class="back-btn">Back</a>
    </div>
</form>

<a href="dashboard.php" class="btn btn-primary">Back to Dashboard</a>

<?php include '../../includes/footer.php'; ?>
