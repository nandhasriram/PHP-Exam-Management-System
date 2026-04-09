
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
// Include the database connection file
include '../config/db.php';
include '../template/header.php';
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(0);
// Initialize variables for form fields and error messages
$error = '';
$success = '';


//searching using addmissionno
$search=addslashes($_POST['search']);
if($search=="search"){
    $AdmissionNo=addslashes($_POST['AdmissionNo']);
    $fRQuery = "SELECT * FROM feereceipt WHERE  Studentname='".$Studentname."' AND class='".$class."' AND section='".$section."' AND year='".$year."'";
    $result = $mysqli->query($fRQuery);$ns=$n=0;
     if ($result->num_rows > 0) {
       while($row1 = $result->fetch_assoc()) {    
       // echo "t1";
       }
    }

}

// Check if the form is submitted
$savereceipt=addslashes($_POST['savereceipt']);
if($savereceipt=="savereceipt"){
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
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

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Loop through particulars and amounts arrays to insert multiple records
        foreach ($particulars as $index => $particular) {
            $amount = $amounts[$index];

            // Insert into `feereceipt` table
            $stmt1 = $conn->prepare("INSERT INTO feereceipt (Sno, Feereceiptno, StudentRollNumber, addmissionno, Studentname, class, section, year, particulars, amount, amountpaid, dueamount, term, duedate, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->execute([$sno, $feereceiptno, $studentRollNumber, $addmissionno, $studentName, $class, $section, $year, $particular, $amount, $amountpaid, $dueamount, $term, $duedate, $description]);

            // Insert into `feereceipttemp` table
            $stmt2 = $conn->prepare("INSERT INTO feereceipttemp (Sno, Feereceiptno, StudentRollNumber, addmissionno, Studentname, class, section, year, particulars, amount, amountpaid, dueamount, term, duedate, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt2->execute([$sno, $feereceiptno, $studentRollNumber, $addmissionno, $studentName, $class, $section, $year, $particular, $amount, $amountpaid, $dueamount, $term, $duedate, $description]);
        }

        // Commit transaction
        $conn->commit();
        $success = 'New fee record added successfully!';
        // Redirect to the same page with a success message
        header("Location: add_fee.php?success=" . urlencode($success));
        exit;
    } catch (PDOException $e) {
        $conn->rollBack();
        $error = 'Error: ' . $e->getMessage();
    }
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Fee Receipt</title>
    <style>
        /* CSS styles */
        .container {
            width: 70%;
            margin: 20px auto;
            border: 3px solid #a3d07a;
            padding: 20px;
            font-family: Arial, sans-serif;
            box-sizing: border-box;
        }
        .container h2 {
            text-align: center;
            font-size: 1.4em;
            color: #333;
            border-bottom: 3px solid #a3d07a;
            padding-bottom: 10px;
            margin-top: 0;
        }
        .message {
            text-align: center;
            padding: 10px;
            margin-bottom: 15px;
        }
        .success {
            color: green;
            background-color: #e7f4e4;
        }
        .error {
            color: red;
            background-color: #f8d7da;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }
        .form-group {
            flex: 1;
            margin: 0 10px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
            font-size: 1em;
            box-sizing: border-box;
        }
        .button-group {
            text-align: center;
            margin-top: 20px;
        }
        .button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            font-size: 1em;
            border-radius: 3px;
            font-weight: bold;
            margin: 5px;
        }
        .button:hover {
            background-color: #45a049;
        } 
    </style>
</head>
<body>
    <div class="container">
    <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
      Search Admission Number
  </button>
  <div class="collapse" id="collapseExample">
  <div class="card card-body">
  <table class="table table-striped table-bordered " style="text-align: center;"> 
  <form action="add_fee.php" method="post"> 
      <tr style="height:15px;" >
      <td    >
      Admission Number:</td>
  <td   ><input name="AdmissionNo"/></td>
  <td   ><input name="search" value="search" type="submit" /></td> </tr></table>
  </div> 
</div>
        <h2>Student Fee Receipt</h2>

        <!-- Display success or error message -->
        <?php if (isset($_GET['success'])): ?>
            <p class="message success"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php elseif ($error): ?>
            <p class="message error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="add_fee.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="sno">S.No</label>
                    <input type="number" id="sno" name="sno" required>
                </div>
                <div class="form-group">
                    <label for="feereceiptno">Fee Receipt No</label>
                    <input type="text" id="feereceiptno" name="feereceiptno" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="studentRollNumber">Student Roll Number</label>
                    <input type="text" id="studentRollNumber" name="studentRollNumber" required>
                </div>
                <div class="form-group">
                    <label for="addmissionno">Addmission No</label>
                    <input type="text" id="addmissionno" name="addmissionno" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="studentName">Student Name</label>
                    <input type="text" id="studentName" name="studentName" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" id="class" name="class" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="section">Section</label>
                    <input type="text" id="section" name="section" required>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" id="year" name="year" required>
                </div>
            </div>

            <div id="particulars-container">
                <div class="form-row">
                    <div class="form-group">
                        <label for="particulars[]">Particulars</label>
                        <input type="text" name="particulars[]" required>
                    </div>
                    <div class="form-group">
                        <label for="amount[]">Amount</label>
                        <input type="number" name="amount[]" required>
                    </div>
                    <button type="button" onclick="addRow()">Add</button>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="amountpaid">Amount Paid</label>
                    <input type="number" id="amountpaid" name="amountpaid" required>
                </div>
                <div class="form-group">
                    <label for="dueamount">Due Amount</label>
                    <input type="number" id="dueamount" name="dueamount" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="term">Term</label>
                    <input type="text" id="term" name="term" required>
                </div>
            

            
                <div class="form-group">
                    <label for="duedate">Due Date</label>
                    <input type="date" id="duedate" name="duedate" required>
                </div>
            </div>
            <div class="button-group">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required>
                </div>
        </div>

            <div class="button-group">
                <button type="submit" name="savereceipt" valuve="savereceipt" class="button">Submit</button>
                <button type="button" class="button" onclick="window.location.href='add_fee_dashboard.php'">Back</button>
            </div>
        </form>
    </div>

    <script>
        // JavaScript function to add new row for particulars and amount
        function addRow() {
            const container = document.getElementById('particulars-container');
            const row = document.createElement('div');
            row.classList.add('form-row');
            row.innerHTML = `
                <div class="form-group">
                    <label for="particulars[]">Particulars</label>
                    <input type="text" name="particulars[]" required>
                </div>
                <div class="form-group">
                    <label for="amount[]">Amount</label>
                    <input type="number" name="amount[]" required>
                </div>
                <button type="button" onclick="removeRow(this)">Remove</button>
            `;
            container.appendChild(row);
        }

        // JavaScript function to remove a row
        function removeRow(button) {
            const row = button.parentElement;
            row.remove();
        }
    </script>
</body>
</html>
