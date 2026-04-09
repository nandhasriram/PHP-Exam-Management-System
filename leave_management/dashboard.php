<?php
// Include the database configuration
include('config/database.php');
//include('templates/header.php');
//include('templates/sidebar.php');

// Start session to check if the user is logged in
session_start();



// Fetch statistics for the dashboard


// Total leaves
$leavesQuery = "SELECT COUNT(*) AS total_leaves FROM leaves";
$leavesResult = $conn->query($leavesQuery);
$totalLeaves = $leavesResult->fetch_assoc()['total_leaves'];

// Pending approvals
$pendingQuery = "SELECT COUNT(*) AS pending_leaves FROM leaves WHERE status = 'Pending'";
$pendingResult = $conn->query($pendingQuery);
$pendingLeaves = $pendingResult->fetch_assoc()['pending_leaves'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Student Leave Management</title>
    <link rel="stylesheet" href="assets/css/style.css">

</head>
<body>
    <!-- Header -->
    <header>
        Student Leave Management System
    </header>

    

    <!-- Main Content -->
    <div class="main-content">
        <h1>Welcome to the Dashboard</h1>
        <div class="stats">
            
            <div class="stat-box">
                <h3>Total Leaves</h3>
                <p><?= $totalLeaves ?></p>
            </div>
            <div class="stat-box">
                <h3>Pending Approvals</h3>
                <p><?= $pendingLeaves ?></p>
            </div>
        </div>

         <!-- Add Button Section -->
        <div class="actions">
            <button onclick="window.location.href='add_leave.php'" class="btn">Add New Leave</button>
        </div>

    </div>

    

    <!-- Link to JavaScript -->
    <script src="../assets/js/script.js"></script>
</body>
</html>
<?php include('templates/footer.php'); ?>
<?php
// Close database connection
$conn->close();
?>
