<?php
// Include the database connection and header
include 'config/db.php';
include 'templates/header.php';
include 'templates/navbar.php';

// Query to get counts for dashboard statistics
$scholarship_count = $conn->query("SELECT COUNT(*) FROM scholarships")->fetchColumn();
$application_count = $conn->query("SELECT COUNT(*) FROM applications")->fetchColumn();
$pending_count = $conn->query("SELECT COUNT(*) FROM applications WHERE status = 'Pending'")->fetchColumn();
$approved_count = $conn->query("SELECT COUNT(*) FROM applications WHERE status = 'Approved'")->fetchColumn();
?>

<div class="container-fluid">
    <h1 class="mt-4">Scholarship Management Dashboard</h1>
    <div class="row">

        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4>Total Scholarships</h4>
                    <p class="display-4"><?php echo $scholarship_count; ?></p>
                </div>
                <div class="card-footer text-white">
                    <a href="modules/scholarship/list_scholarships.php" class="text-white">View Details</a>
                </div>
            </div>
        </div>

        <!-- Applications count -->
        <div class="col-lg-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <h4>Total Applications</h4>
                    <p class="display-4"><?php echo $application_count; ?></p>
                </div>
                <div class="card-footer text-white">
                    <a href="modules/application/list_applications.php" class="text-white">View Details</a>
                </div>
            </div>
        </div>

        
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">Add New Scholarship</div>
                <div class="card-body">
                    <a href="modules/scholarship/add_scholarship.php" class="btn btn-primary">Add Scholarship</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional actions -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card mb-4">
                <div class="card-header">Add New Application</div>
                <div class="card-body">
                    <a href="modules/application/add_application.php" class="btn btn-primary">Add Application</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'templates/footer.php'; ?>
