<?php include('../../includes/header.php'); ?>

<div class="container mt-5">
    <div class="row mt-5">
        <div class="col-md-4">
            <h3>Add Result Mark Sheet</h3>
            <p>Add result mark sheet for students.</p>
            <a class="btn btn-info" href="result_mark_sheet.php">Go to Staff Attendance</a>
        </div>
        
         <div class="col-md-4">
            <h3>Create Attendance Form</h3>
            <p>Manage report and print form.</p>
            <a class="btn btn-info" href="print_marksheet.php">Go to Print Marksheet</a>
        </div>

        <div class="col-md-4">
            <h3>Report Attendance</h3>
            <p>Manage Report Attendance.</p>
            <a class="btn btn-info" href="result_mark_sheet_report.php">Go to Report Attendance</a>
        </div>
    </div>
    
</div>

<!-- Optional Back Button -->
<div class="text-center mt-4">
    <button type="button" class="btn btn-secondary" onclick="window.location.href='../../index.php';">Back</button>
</div>

<?php include('../../includes/footer.php'); ?>
