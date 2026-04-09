<?php include('../../includes/header.php'); ?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-4">
            <h3>Add Student Attendance</h3>
            <p>Add Student Attendance for students.</p>
            <a class="btn btn-info" href="student_attendance.php">Go to Student Attendance</a>
        </div>
        
         <div class="col-md-4">
            <h3>Create Attendance Form</h3>
            <p>Manage report and print form.</p>
            <a class="btn btn-info" href="print_attendance.php">Go to Print Attendance</a>
        </div>

        <div class="col-md-4">
            <h3>Report Attendance</h3>
            <p>Manage Report Attendance.</p>
            <a class="btn btn-info" href="student_attendance_report.php">Go to Report Attendance</a>
        </div>
    </div>
    <div class="row mt-5">
        
        <div class="col-md-4">
            <h3>Print Application</h3>
            <p>Print Student Attendance form model.</p>
            <a class="btn btn-info" href="attendance.php">Go to attendance Form</a>
        </div>
    </div>
</div>

<!-- Optional Back Button -->
<div class="text-center mt-4">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='../../index.php';">Back</button>
</div>

<?php include('../../includes/footer.php'); ?>
