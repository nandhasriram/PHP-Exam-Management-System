<?php
// Include header and database connection
include '../template/header.php';
include '../config/db.php';
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(0);
// Check if the database connection was successful
if (!$conn) {
    die("Connection failed: " . implode(", ", $conn->errorInfo()));
}

$result = [];
$classWiseFeeResult = [];
$mainFeeResult = [];
$relatedClassWiseFeeData = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form input values
    $class = $_POST['class'] ?? '';
    $section = $_POST['section'] ?? '';
    $year = $_POST['year'] ?? '';
    $particulars = $_POST['particulars'] ?? '';

    // Query for `feereceipt` table
    $query = "SELECT * FROM feereceipt WHERE 1=1";
    $params = [];

    if (!empty($class)) {
        $query .= " AND class LIKE ?";
        $params[] = "%$class%";
    }
    if (!empty($section)) {
        $query .= " AND section LIKE ?";
        $params[] = "%$section%";
    }
    if (!empty($year)) {
        $query .= " AND year LIKE ?";
        $params[] = "%$year%";
    }
    if (!empty($particulars)) {
        $query .= " AND particulars LIKE ?";
        $params[] = "%$particulars%";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Query for `class_wise_fee` table
    $classWiseFeeQuery = "SELECT * FROM class_wise_fee WHERE 1=1";
    $classWiseParams = [];

    if (!empty($class)) {
        $classWiseFeeQuery .= " AND class LIKE ?";
        $classWiseParams[] = "%$class%";
    }
    if (!empty($section)) {
        $classWiseFeeQuery .= " AND section LIKE ?";
        $classWiseParams[] = "%$section%";
    }
    if (!empty($year)) {
        $classWiseFeeQuery .= " AND year LIKE ?";
        $classWiseParams[] = "%$year%";
    }
    if (!empty($particulars)) {
        $classWiseFeeQuery .= " AND particulars LIKE ?";
        $classWiseParams[] = "%$particulars%";
    }

    $classWiseStmt = $conn->prepare($classWiseFeeQuery);
    $classWiseStmt->execute($classWiseParams);
    $classWiseFeeResult = $classWiseStmt->fetchAll(PDO::FETCH_ASSOC);

    // Query for `main_feereceipt` table
    $mainFeeReceiptQuery = "SELECT * FROM main_feereceipt WHERE 1=1";
    $mainFeeParams = [];

    if (!empty($class)) {
        $mainFeeReceiptQuery .= " AND class LIKE ?";
        $mainFeeParams[] = "%$class%";
    }
    if (!empty($section)) {
        $mainFeeReceiptQuery .= " AND section LIKE ?";
        $mainFeeParams[] = "%$section%";
    }
    if (!empty($year)) {
        $mainFeeReceiptQuery .= " AND year LIKE ?";
        $mainFeeParams[] = "%$year%";
    }

    $mainFeeStmt = $conn->prepare($mainFeeReceiptQuery);
    $mainFeeStmt->execute($mainFeeParams);
    $mainFeeResult = $mainFeeStmt->fetchAll(PDO::FETCH_ASSOC);

    // Check `addclasswisefeeitem` in main_fee_result and fetch related `class_wise_fee`
    foreach ($mainFeeResult as $row) {
        if (strtolower($row['addclasswisefeeitem']) === 'yes') {
            $relatedFeeQuery = "SELECT * FROM class_wise_fee WHERE class = ? AND section = ? AND year = ?";
            $relatedFeeStmt = $conn->prepare($relatedFeeQuery);
            $relatedFeeStmt->execute([$row['class'], $row['section'], $row['year']]);
            $relatedClassWiseFeeData[] = [
                'main_receipt' => $row,
                'related_fee' => $relatedFeeStmt->fetchAll(PDO::FETCH_ASSOC)
            ];
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annual Fee Receipt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media print {
            form, .btn, .back-to-dashboard, .header, footer {
                display: none !important;
            }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Generate Annual Fee Receipt</h2>

    <!-- Form to enter class, section, and year -->
    <form method="POST" action="annual_fee_report.php">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="class">Class</label>
                <input type="text" id="class" name="class" class="form-control" placeholder="Enter Class">
            </div>

            <div class="form-group col-md-4">
                <label for="section">Section</label>
                <input type="text" id="section" name="section" class="form-control" placeholder="Enter Section">
            </div>

            <div class="form-group col-md-4">
                <label for="year">Year</label>
                <input type="text" id="year" name="year" class="form-control" placeholder="Enter Year">
            </div>

            <div class="form-group col-md-4">
                <label for="particulars">Particular</label>
                <input type="text" id="particulars" name="particulars" class="form-control" placeholder="Enter Particular">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generate Report</button>
        <a href="../dashboard.php" class="btn btn-secondary mt-3 ml-2 back-to-dashboard">Back to Dashboard</a>
    </form>

    <!-- Display main fee receipt details -->
  <?php if (!empty($mainFeeResult)): ?>
        <h3 class="text-center mt-5">Main Fee Receipt Details</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Fee Receipt No</th>
                    <th>Student Roll Number</th>
                    <th>Admission No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                    
                    <th>Add Class-Wise Fee Item</th>
                    <th>Amount Paid</th>
                    <th>Due Amount</th>
                    <th>Due Date</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                
                $feereceipt_id=$row['feereceipt_id'];
                $Sno=$row['Sno'];
                $Feereceiptno=$row['Feereceiptno'];
                $date=$row['date'];
                $StudentRollNumber=$row['StudentRollNumber'];
                $addmissionno=$row['addmissionno'];
                $Studentname=$row['Studentname'];$class=$row['class'];
                $section=$row['section'];
                $year=$row['year'];
                $addclasswisefeeitem=$row['addclasswisefeeitem'];
                $duedate=$row['duedate'];
                $description=$row['description'];
                

                
                
                foreach ($mainFeeResult as $row): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['Feereceiptno']); ?></td>
                        <td><?= htmlspecialchars($row['StudentRollNumber']); ?></td>
                        <td><?= htmlspecialchars($row['addmissionno']); ?></td>
                        <td><?= htmlspecialchars($row['Studentname']); ?></td>
                        <td><?= htmlspecialchars($row['class']); ?></td>
                        <td><?= htmlspecialchars($row['section']); ?></td>
                        <td><?= htmlspecialchars($row['year']); ?></td>
                        
                        <td><?= htmlspecialchars($row['addclasswisefeeitem']); ?></td>
                        <td><?= htmlspecialchars($row['amountpaid']); ?></td>
                        <td><?= htmlspecialchars($row['dueamount']); ?></td>
                        <td><?= htmlspecialchars($row['duedate']); ?></td>
                        <td><?= htmlspecialchars($row['description']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?> 

    <!-- Display fee receipt details -->
    <h3 class="text-center mt-5">Annual Fee Report</h3>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>  <th>Sno</th>
                    <th>Receipt no</th>
                    <th>Receipt Date</th>
                    <th>Student Roll Number</th>
                    <th>Admission No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                    <th>Term</th>
                </tr>
            </thead>
            <tbody>

    <?php $totalAmount = 0;
            $totalAmountPaid = 0;
            $i=1;
            
            if (count($mainFeeResult) > 0) {
                foreach ($mainFeeResult as $mainrow) {
                    $mFeereceiptno=$mainrow['Feereceiptno'];
                     $addclasswisefeeitem=$mainrow['addclasswisefeeitem'];
                       $Studentname=$mainrow['Studentname'];$class=$mainrow['class'];
                    $section=$mainrow['section'];
                    $year=$mainrow['year'];  $term=$mainrow['term'];
                     $date=$mainrow['date'];
                    $StudentRollNumber=$mainrow['StudentRollNumber'];
                    $addmissionno=$mainrow['addmissionno'];
                  
                    $term=$mainrow['term'];$duedate=$mainrow['duedate'];
                    $description=$mainrow['description'];

                if($addclasswisefeeitem=="yes")
                    {
                       //echo "yes";
                      
                        foreach ($classWiseFeeResult as $cwfrow) {
                              $amount = $cwfrow['amount'] ?? 0; 
                              $particulars = $cwfrow['particulars'] ?? 0;
                              echo "<tr>";
                    echo "<td>".$i++."</td>";
                   // echo "<td>" . htmlspecialchars($row['Sno'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($mFeereceiptno) . "</td>";
                    echo "<td>" . htmlspecialchars($date). "</td>";
                    echo "<td>" . htmlspecialchars($StudentRollNumber). "</td>";
                    echo "<td>" . htmlspecialchars($addmissionno). "</td>";
                    echo "<td>" . htmlspecialchars($Studentname). "</td>";
                    echo "<td>" . htmlspecialchars($class). "</td>";
                    echo "<td>" . htmlspecialchars($section). "</td>";
                    echo "<td>" . htmlspecialchars($year). "</td>";
                    echo "<td>" . htmlspecialchars($particulars). "</td>";
                    echo "<td>" . htmlspecialchars($amount) . "</td>";
                 //   echo "<td>" . htmlspecialchars($amountPaid) . "</td>";
                    echo "<td>" . htmlspecialchars($term). "</td>";
                 //   echo "<td>" . htmlspecialchars($duedate). "</td>";
                  //  echo "<td>" . htmlspecialchars($description). "</td>";
                    echo "</tr>";
                    $totalAmount += $amount;
                    $totalAmountPaid += $amountPaid;

                           //echo "1";

                        }
                    }
    if (!empty($result)): ?>
       
                <?php foreach ($result as $row): 
                    $frFeereceiptno=$row['Feereceiptno'];
                    $particulars=$row['particulars'];
                    $amount = $row['amount'] ?? 0;

                     if($frFeereceiptno==$mFeereceiptno&&$particulars!=""&&$amount!="")
                     { $amountPaid = $row['amountpaid'] ?? 0;

                        $totalAmount += $amount;
                        $totalAmountPaid += $amountPaid;
    
                        $feereceipt_id=$row['feereceipt_id'];
                        $Sno=$row['Sno'];
                        $Feereceiptno=$row['Feereceiptno'];
                        $date=$row['date'];
                        $StudentRollNumber=$row['StudentRollNumber'];
                        $addmissionno=$row['addmissionno'];
                        $Studentname=$row['Studentname'];$class=$row['class'];
                        $section=$row['section'];
                        $year=$row['year'];
                        $addclasswisefeeitem=$row['addclasswisefeeitem'];
                        $term=$row['term'];$duedate=$row['duedate'];
                        $description=$row['description'];
                    
                    
                    ?>
                    <tr>
                    
                    <td><?= htmlspecialchars($i++); ?></td>
                        <td><?= htmlspecialchars($row['Feereceiptno']); ?></td>
                    
                        <td><?= htmlspecialchars($date); ?></td>
                        <td><?= htmlspecialchars($row['StudentRollNumber']); ?></td>
                       
                        <td><?= htmlspecialchars($addmissionno); ?></td>
                        <td><?= htmlspecialchars($row['Studentname']); ?></td>
                        <td><?= htmlspecialchars($row['class']); ?></td>
                        <td><?= htmlspecialchars($row['section']); ?></td>
                        <td><?= htmlspecialchars($row['year']); ?></td>
                        <td><?= htmlspecialchars($row['particulars']); ?></td>
                        <td><?= htmlspecialchars($row['amount']); ?></td>
                        <td><?= htmlspecialchars($row['term']); ?></td>
                    </tr>
                <?php
                     }
            
            endforeach; ?>
          
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
     <!--   <p class="text-center mt-5">No fee records found for the selected criteria.</p>-->
    <?php endif; 
                }
            }
            echo "<tr style='font-weight: bold; background-color: #f9f9f9;'>";
            echo "<td colspan='10' style='text-align: right;'>Total</td>";
            echo "<td>" . htmlspecialchars($totalAmount) . "</td>";
            //echo "<td>" . htmlspecialchars($totalAmountPaid) . "</td>";
            echo "<td colspan='3'></td>";
            echo "</tr>";
        

     
        ?>
    </tbody>
</table>
 

    

    <!-- Display related class-wise fee details -->
    <?php if (!empty($relatedClassWiseFeeData)): ?>
        <h3 class="text-center mt-5">Related Class-Wise Fee Details</h3>
        <?php foreach ($relatedClassWiseFeeData as $data): ?>
            <h5>Main Fee Receipt No: <?= htmlspecialchars($data['main_receipt']['Feereceiptno']); ?></h5>
            <table class="table table-bordered mt-3">
                <thead>
                    <tr>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Year</th>
                        <th>Particulars</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['related_fee'] as $relatedFee): ?>
                        <tr>
                            <td><?= htmlspecialchars($relatedFee['class']); ?></td>
                            <td><?= htmlspecialchars($relatedFee['section']); ?></td>
                            <td><?= htmlspecialchars($relatedFee['year']); ?></td>
                            <td><?= htmlspecialchars($relatedFee['particulars']); ?></td>
                            <td><?= htmlspecialchars($relatedFee['amount']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
</body>
</html>
