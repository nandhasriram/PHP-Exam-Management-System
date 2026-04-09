<?php 
error_reporting(E_ALL ^ E_NOTICE);
error_reporting(0);

include '../config/db.php';

$savereceipt = addslashes($_POST['savereceipt']);
if ($savereceipt == "savereceipt") {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Sanitize form data
        $sno = $_POST['sno'];
        $feereceiptno = $_POST['feereceiptno'];
        $studentRollNumber = $_POST['studentRollNumber'];
        $addmissionno = $_POST['addmissionno'];
        $studentName = $_POST['studentName'];
        $class = $_POST['class'];
        $section = $_POST['section'];
        $year = $_POST['year'];
        $particulars = $_POST['particulars'];
        $amounts = $_POST['amount'];
        $amountpaid = $_POST['amountpaid'];
        $dueamount = $_POST['dueamount'];
        $term = $_POST['term'];
        $duedate = $_POST['duedate'];
        $description = $_POST['description'];
        $addclasswisefeeitem = $_POST['addclasswisefeeitem'];

        try {
            // Begin transaction
            $conn->beginTransaction();

            // Check for duplicate feereceiptno
            $stmtCheck = $conn->prepare("SELECT COUNT(*) FROM main_feereceipt WHERE Feereceiptno = ?");
            $stmtCheck->execute([$feereceiptno]);
            if ($stmtCheck->fetchColumn() > 0) {
                throw new Exception('Duplicate fee receipt number detected.');
            }

            

            // Insert into `main_feereceipt` table
            $stmt1 = $conn->prepare("INSERT INTO main_feereceipt (Sno, Feereceiptno, StudentRollNumber, addmissionno, Studentname, class, section, year, amountpaid, dueamount, term, duedate, description, addclasswisefeeitem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->execute([$sno, $feereceiptno, $studentRollNumber, $addmissionno, $studentName, $class, $section, $year, $amountpaid, $dueamount, $term, $duedate, $description, $addclasswisefeeitem]);

            

            // Loop through particulars and amounts to insert multiple records
            foreach ($particulars as $index => $particular) {
                $amount = $amounts[$index];
                $paid = $amountpaid[$index]; // Assuming `amountpaid` is an array
                $due = $dueamount[$index];
                $terms = $term[$index];
                $totalPaid += $paid;
                $totalDue += $due;
                
                

                // Insert into `feereceipt` table
                $stmt2 = $conn->prepare("INSERT INTO feereceipt (Sno, Feereceiptno, StudentRollNumber, addmissionno, Studentname, class, section, year, particulars, amount, amountpaid, dueamount, term, duedate, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt2->execute([$sno, $feereceiptno, $studentRollNumber, $addmissionno, $studentName, $class, $section, $year, $particular, $amount, $paid, $due, $terms, $duedate, $description]);
            }
            // Calculate total amount paid
            
            $mainTerm = $terms;

            // Update total amount paid in `main_feereceipt`
            $stmtUpdate = $conn->prepare("UPDATE main_feereceipt SET amountpaid = ?, dueamount = ?, term = ? WHERE Feereceiptno = ?");
            $stmtUpdate->execute([$totalPaid, $totalDue, $mainTerm, $feereceiptno]);

            // Commit transaction
            $conn->commit();
            $success = 'New fee record added successfully!';
            header("Location: add_fee.php?success=" . urlencode($success));
            exit;
        } catch (Exception $e) {
            // Rollback transaction on error
            $conn->rollBack();
            $error = 'Error: ' . $e->getMessage();
            header("Location: add_fee.php?error=" . urlencode($error));
            exit;
        }
    }
}
?>
