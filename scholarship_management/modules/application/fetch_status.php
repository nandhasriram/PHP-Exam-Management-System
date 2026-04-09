<?php
session_start();
include '../../config/db.php';
include '../../templates/navbar.php';

if (isset($_GET['status'])) {
    $status = $_GET['status'];

    // Prepare query to fetch application records by status
    $query = "SELECT * FROM applications WHERE status = :status";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
    $application_records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Fetch student details (for displaying purpose, here assuming you might want student info for the matched applications)
    if (!empty($application_records)) {
        $student_info = [
            'student_id' => $application_records[0]['student_id'],
            'student_name' => $application_records[0]['student_name'],
            'department' => $application_records[0]['department']
        ];
    }
} else {
    $application_records = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application List</title>

    <!-- Internal CSS Styling -->
    <style>
        .container {
            width: 70%;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .college-logo {
            max-width: 100px;
        }

        .college-name {
            text-align: center;
            flex-grow: 1;
            font-size: 24px;
            font-weight: bold;
        }

        .student-info {
            margin-top: 20px;
            border: 1px solid #000;
            padding: 10px;
        }

        .student-info div {
            margin-bottom: 10px;
        }

        #application-table {
            margin-top: 20px;
        }

        #application-table table {
            width: 100%;
            border-collapse: collapse;
        }

        #application-table th, #application-table td {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }

        #application-table th {
            background-color: #ddd;
        }

        /* CSS for printing */
        @media print {
            body * {
                visibility: visible;
            }

            /* Ensure header section, student info, and application table are visible */
            .header-section, .header-section *, 
            .student-info, .student-info *, 
            #application-table, #application-table * {
                visibility: visible;
            }

            /* Hide elements not needed in print view */
            .footer-section, button, form {
                display: none !important;
            }

            /* Position the header section at the top of the page */
            .header-section {
                position: fixed;
                top: 0;
                width: 100%;
                background-color: #f9f9f9;
                padding: 10px;
                border-bottom: 1px solid #ddd;
            }

            /* Ensure logo and name are displayed properly */
            .college-logo {
                max-width: 100px;
                margin-right: auto;
            }

            .college-name {
                font-size: 24px;
                font-weight: bold;
                text-align: center;
                flex-grow: 1;
            }

            /* Adjust the application table layout for printing */
            .student-info {
                margin-top: 20px;
                padding: 10px;
                page-break-inside: avoid;
            }

            #application-table {
                position: relative;
                margin-top: 20px; /* Space between student-info and application-table */
                width: 100%;
                border-collapse: collapse;
            }

            #application-table th, #application-table td {
                border: 1px solid #000;
                padding: 10px;
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header-section">
        <!-- College Logo on the left -->
        <img src="/lab_management_system/assets/images/Logo.png" alt="College Logo" class="college-logo">
        
        <!-- College Name at the center -->
        <div class="college-name">
            ABC College of Engineering and Technology
        </div>
    </div>

    <h2>Application List</h2>

    <!-- Status Selection Form -->
    <form method="GET" action="">
        <div class="form-group">
            <label for="status">Select Application Status:</label>
            <select name="status" id="status" class="form-control" required>
                <option value="">--Select Status--</option>
                <option value="Pending">Pending</option>
                <option value="Approved">Approved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Fetch Applications</button>
        <a href="list_applications.php" class="btn btn-secondary mt-3">Back</a>
    </form>

    <hr>

    <!-- Print Button -->
    <button class="btn btn-secondary mb-3" onclick="printApplications()">Print</button>
    
    <hr>

    <?php if (empty($application_records)): ?>
        <div class="alert alert-warning" role="alert">
            No application records found for the selected status.
        </div>
    <?php else: ?>
        <!-- Displaying Student Info (for the first matching record) -->
        <div class="student-info">
            <div><strong>Student ID:</strong> <?php echo htmlspecialchars($student_info['student_id']); ?></div>
            <div><strong>Student Name:</strong> <?php echo htmlspecialchars($student_info['student_name']); ?></div>
            <div><strong>Department:</strong> <?php echo htmlspecialchars($student_info['department']); ?></div>
        </div>

        <!-- Application Table -->
        <div id="application-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Scholarship Name</th>
                        <th>Application Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($application_records as $record): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($record['scholarship_name']); ?></td>
                            <td><?php echo htmlspecialchars($record['application_date']); ?></td>
                            <td><?php echo htmlspecialchars($record['status']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="footer-section">
        <!-- Date at the bottom left -->
        <div class="date">
            Date: <?php echo date('Y-m-d'); ?>
        </div>

        <!-- Signature at the bottom right -->
        <div class="signature">
            Signature
        </div>
    </div>
</div>

<script>
function printApplications() {
    window.print();
}
</script>

<?php include '../../templates/footer.php'; ?>

</body>
</html>
