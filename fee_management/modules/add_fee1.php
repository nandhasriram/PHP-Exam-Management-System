
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
    $SQuery = "SELECT * FROM admisapplicastuddetail WHERE  AdmissionNo='".$AdmissionNo."'";
    $result = $conn->query($SQuery);$ns=$n=0;
     if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {    
       // echo "t1";
       $AdmissionNo=$row['AdmissionNo'];  $EnrollNo=$row['EnrollNo'];   $Date=$row['Date'];    $StudentName=$row['StudentName'];   
       $StudentSurName=$row['StudentSurName'];
        
  $FatherName=$row['FatherName'];   $MotherName=$row['MotherName'];   $GenderMale=$row['GenderMale'];   $Gender=$row['Gender']; 
  $GenderFemale=$row['GenderFemale'];   $dobdd=$row['DateofBirth'];   $dobmm=$row['dobmm'];   $Age=$row['Age']; 
  $dobyy=$row['dobyy'];   $Religion=$row['Religion']; $Nationality=$row['Nationality']; $Community=$row['Community']; 
  $Caste=$row['Caste'];   $MotherTongue=$row['MotherTongue'];
  
  $Parent_occupation=$row['Parent_occupation'];   $Annual_Income=$row['Annual_Income'];   $Special_Category=$row['Special_Category'];  
   $Quota=$row['Quota']; 
  $Physical_Disability=$row['Physical_Disability'];   $Marital_Status=$row['Marital_Status'];   
  $Blood_Group=$row['Blood_Group'];   $Hostel_Required=$row['Hostel_Required']; 
  $Trans_Board_point=$row['Trans_Board_point'];   $DD_No=$row['DD_No']; $dd_Date=$row['dd_Date']; $Bank=$row['Bank']; 
  $Amount=$row['Amount'];   $MotherTongue=$row['MotherTongue'];
  
  
  $PresentAddress1=$row['PresentAddress1'];   $PresentAddress2=$row['PresentAddress2'];   
  $PresentAddress3=$row['PresentAddress3'];   $PresentAddress4=$row['PresentAddress4'];   
  $PresentPinCode=$row['PresentPinCode']; $PresentState=$row['PresentState'];   $PresentResPhone=$row['PresentResPhone'];   
  
  $PresentEmail=$row['PresentEmail']; 
  $PermanentAddress1=$row['PermanentAddress1'];   $PermanentAddress2=$row['PermanentAddress2'];   
  $PermanentAddress3=$row['PermanentAddress3'];   $PermanentAddress4=$row['PermanentAddress4'];   
  $PermanentPinCode=$row['PermanentPinCode']; $PermanentState=$row['PermanentState'];   $PermanentResPhone=$row['PermanentResPhone'];   
  
  $PermanentEmail=$row['PermanentEmail']; 
  
  
  $admissionClass=$row['admissionClass'];   $Secondlanguage=$row['Secondlanguage'];   
  $GroupinclassXI=$row['GroupinclassXI'];
  

       }
    }

}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
    $feereceipt_id = $_POST['feereceipt_id'];
    $sno = $_POST['sno'];
    $feereceiptno = $_POST['feereceiptno'];
    $studentRollNumber = $_POST['studentRollNumber'];
    $addmissionno = $_POST['addmissionno'];
    $studentName = $_POST['studentName'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    $addclasswisefeeitem = $_POST['addclasswisefeeitem'];
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

        // Loop through particulars and amounts arrays to insert multiple records
        foreach ($particulars as $index => $particular) {
            $amount = $amounts[$index];

            // Insert into `feereceipt` table
            $stmt1 = $conn->prepare("INSERT INTO main_feereceipt (Sno, Feereceiptno, StudentRollNumber, addmissionno, Studentname, class, section, year, amountpaid, dueamount, term, duedate, description, addclasswisefeeitem) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt1->execute([$sno, $feereceiptno, $studentRollNumber, $addmissionno, $studentName, $class, $section, $year, $amountpaid, $dueamount, $term, $duedate, $description]);

            // Insert into `feereceipttemp` table
            $stmt2 = $conn->prepare("INSERT INTO feereceipt (Sno, Feereceiptno, StudentRollNumber, addmissionno, Studentname, class, section, year, particulars, amount, amountpaid, dueamount, term, duedate, description) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
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

// Check if the form is submitted
$date=date("d/m/Y");
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
  <form action="add_fee.php" method="post"> 
  <table class="table table-striped table-bordered " style="text-align: center;"> 
  
      <tr style="height:15px;" >
      <td    >
      Admission Number:</td>
  <td   ><input name="AdmissionNo"/></td>
  <td   ><input name="search" value="search" type="submit" /></td> </tr></table>
    </form>
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
                    <label for="feereceiptno">Fee Receipt No</label>
                    <input type="text" id="feereceiptno" value="<?php echo $feereceiptno; ?>" name="feereceiptno" required>
                </div>
                <div class="form-group">
                    <label for="sno">S.No</label>
                    <input type="number" id="sno" value="<?php echo $sno; ?>" name="sno" required>
                </div>
                
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="studentRollNumber">Student Roll Number</label>
                    <input type="text" id="studentRollNumber" value="<?php echo $studentRollNumber ?>" name="studentRollNumber" required>
                </div>
                <div class="form-group">
                    <label for="addmissionno">Addmission No</label>
                    <input type="text" id="addmissionno" value="<?php echo $AdmissionNo; ?>" name="addmissionno" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="studentName">Student Name</label>
                    <input type="text" id="studentName" value="<?php echo $StudentName; ?>" name="studentName" required>
                </div>
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" id="class" value="<?php echo $admissionClass; ?>" name="class" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="section">Section</label>
                    <input type="text" id="section" value="<?php echo $section; ?>" name="section" required>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" id="year" value="<?php echo $Year; ?>" name="year" required>
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
                    <input type="text" id="term" value="<?php echo $term; ?>" name="term" required>
                </div>
            

            
                <div class="form-group">
                    <label for="duedate">Due Date</label>
                    <input type="date" id="duedate" value="<?php echo $duedate; ?>" name="duedate" required>
                </div>
            </div>
            <div class="button-group">
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" name="description" required>
                </div>
                <div class="form-group">
                    <lable for="addclasswisefeeitem">Add Class Wise Fee</lable>
                    <input type="checkbox" id="addclasswisefeeitem" name="addclasswisefeeitem" value="yes">
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
