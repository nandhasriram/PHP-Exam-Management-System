<?php
// Include database connection
include '../config/db.php';
include '../template/header.php';
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(0);
// Initialize filter variables
$Studentname = $_GET['Studentname'] ?? '';
$class = $_GET['class'] ?? '';
$section = $_GET['section'] ?? '';
$year = $_GET['year'] ?? '';
$particulars = $_GET['particulars'] ?? '';
$term = $_GET['term'] ?? '';

// Query to fetch Fee Receipt data with filters
$query = "SELECT * FROM feereceipt WHERE 1=1";

if (!empty($Studentname)) {
    $query .= " AND Studentname LIKE :Studentname";
}
if (!empty($class)) {
    $query .= " AND class = :class";
}
if (!empty($section)) {
    $query .= " AND section = :section";
}
if (!empty($year)) {
    $query .= " AND year = :year";
}
if (!empty($particulars)) {
    $query .= " AND particulars = :particulars";
}
if (!empty($term)) {
    $query .= " AND term = :term";
}

$query .= " ORDER BY id ASC";
$stmt = $conn->prepare($query);

// Bind parameters if filters are provided
if (!empty($Studentname)) {
    $stmt->bindValue(':Studentname', '%' . $Studentname . '%');
}
if (!empty($class)) {
    $stmt->bindValue(':class', $class);
}
if (!empty($section)) {
    $stmt->bindValue(':section', $section);
}
if (!empty($year)) {
    $stmt->bindValue(':year', $year);
}
if (!empty($particulars)) {
    $stmt->bindValue(':particulars', $particulars);
}
if (!empty($term)) {
    $stmt->bindValue(':term', $term);
}

$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Query to fetch Class-Wise Fee data
$query2 = "SELECT * FROM class_wise_fee WHERE 1=1";

if (!empty($class)) {
    $query2 .= " AND class = :class";
}
if (!empty($section)) {
    $query2 .= " AND section = :section";
}
if (!empty($year)) {
    $query2 .= " AND year = :year";
}
if (!empty($particulars)) {
    $query2 .= " AND particulars = :particulars";
}
if (!empty($term)) {
    $query2 .= " AND term = :term";
}
 $query2;
$stmt2 = $conn->prepare($query2);
// Bind parameters if filters are provided

if (!empty($class)) {
    $stmt2->bindValue(':class', $class);
}
if (!empty($section)) {
    $stmt2->bindValue(':section', $section);
}
if (!empty($year)) {
    $stmt2->bindValue(':year', $year);
}
if (!empty($particulars)) {
    $stmt2->bindValue(':particulars', $particulars);
}
if (!empty($term)) {
    $stmt2->bindValue(':term', $term);
}

$stmt2->execute();
$classWiseFeeResults = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Query to fetch main_feereceipt data
// Query to fetch main_feereceipt data
$query3 = "SELECT * FROM main_feereceipt WHERE 1=1"; // Use "WHERE 1=1" as a base condition
if (!empty($Studentname)) {
    $query3 .= " AND Studentname LIKE :Studentname";
}
if (!empty($class)) {
    $query3 .= " AND class = :class";
}
if (!empty($section)) {
    $query3 .= " AND section = :section";
}
if (!empty($year)) {
    $query3 .= " AND year = :year"; 
}
if (!empty($term)) {
    $query3 .= " AND term = :term"; 
}


$stmt3 = $conn->prepare($query3);

// Bind values dynamically
if (!empty($Studentname)) {
    $stmt3->bindValue(':Studentname', '%' . $Studentname . '%', PDO::PARAM_STR);
}
if (!empty($class)) {
    $stmt3->bindValue(':class', $class, PDO::PARAM_STR);
}
if (!empty($section)) {
    $stmt3->bindValue(':section', $section, PDO::PARAM_STR);
}
if (!empty($year)) {
    $stmt3->bindValue(':year', $year, PDO::PARAM_INT);
}
if (!empty($term)) {
    $stmt3->bindValue(':term', $term, PDO::PARAM_INT);
}

 $query3;
// Execute the query
$stmt3->execute();
$mainFeereceiptResults = $stmt3->fetchAll(PDO::FETCH_ASSOC);


// Check if any main_feereceipt entry has addclasswisefeeitem = 'yes'
$hasClassWiseFeeItem = false;
$filteredClassWiseFeeResults = [];

foreach ($mainFeereceiptResults as $mainRow) {
    if ($mainRow['addclasswisefeeitem'] === 'yes') {
        $hasClassWiseFeeItem = true;

        // Fetch class, section, and year from this row
        $classFilter = $mainRow['class'];
        $sectionFilter = $mainRow['section'];
        $yearFilter = $mainRow['year'];
        $termFilter = $mainRow['term'];

        // Query to fetch class-wise fee data matching the conditions
        $query4 = "SELECT * FROM class_wise_fee WHERE class = :class AND section = :section AND year = :year AND term = :term ORDER BY id ASC";
        $stmt4 = $conn->prepare($query4);
        $stmt4->bindValue(':class', $classFilter);
        $stmt4->bindValue(':section', $sectionFilter);
        $stmt4->bindValue(':year', $yearFilter);
        $stmt4->bindvalue(':term', $termFilter);
        $stmt4->execute();
        $filteredClassWiseFeeResults = $stmt4->fetchAll(PDO::FETCH_ASSOC);

        break; // Break loop since we found a matching entry
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Fee Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        form label {
            font-weight: bold;
            margin-right: 5px;
        }

        form input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 150px;
        }

        form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        form button:hover {
            background-color: #45a049;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }
        

        #printButton, #backButton {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
        }

        #printButton {
            background-color: #4CAF50;
        }

        #printButton:hover {
            background-color: #45a049;
        }

        #backButton {
            background-color: #2196F3;
        }

        #backButton:hover {
            background-color: #1E88E5;
        }
        

        @media print {
            header, .header, nav, #printButton, #backButton, form {
                display: none !important;
            }

            table {
                width: 100%;
            }

            body {
                margin: 10;
                padding: 0;
            }
        }
    </style>
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <h2>Generate Fee Report</h2>

    <!-- Form to filter Fee Receipt data -->
   <form method="get" action="generate_report.php">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="Studentname">Student Name:</label>
                <input type="text" id="Studentname" name="Studentname" value="<?= htmlspecialchars($Studentname) ?>">
    
                <label for="class">Class:</label>
                <input type="text" id="class" name="class" value="<?= htmlspecialchars($class) ?>">
    
                <label for="section">Section:</label>
                <input type="text" id="section" name="section" value="<?= htmlspecialchars($section) ?>">
    
                <label for="year">Year:</label>
                <input type="text" id="year" name="year" value="<?= htmlspecialchars($year) ?>">
            </div>
    </br>
    
            <div class="form-group col-md-4">

                <label for="term">Term:</label>
                <input type="text" id="term" name="term" value="<?= htmlspecialchars($term) ?>">
    
                <label for="particulars">Particular:</label>
                <input type="text" id="particulars" name="particulars" value="<?= htmlspecialchars($particulars) ?>">
            </div>
        </div>
        <button type="submit">Generate Report</button>
    </form>

    <!-- Button to Print Report and Go Back -->
 <button id="printButton" onclick="printReport()">Print Report</button>
    <button id="backButton" onclick="window.location.href='../dashboard.php'">Back to Dashboard</button>
    <!-- Main Fee Receipt Table -->
  <h2>Main Fee Receipt Details</h2>
    <table>
        <thead>
            <tr>
              <!--  <th>Fee Receipt ID</th>-->
                <th>Sno</th>
                <th>Receipt No</th>
                <th>Date</th>
                <th>Roll Number</th>
                <th>Admission No</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Year</th>
                <th>CW Fee</th>
                <th>Amount Paid</th>
                <th>Due Amount</th>
                
                <th>Due Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $totalMainAmountPaid = 0;
            $totalMainDueAmount = 0;
            $i=1;
            if (count($mainFeereceiptResults) > 0) {
                foreach ($mainFeereceiptResults as $row) {
                    $amountPaid = $row['amountpaid'] ?? 0;
                    $dueAmount = $row['dueamount'] ?? 0;

                    $totalMainAmountPaid += $amountPaid;
                    $totalMainDueAmount += $dueAmount;
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
                    if($addclasswisefeeitem=="yes")
                    {
                       //echo "yes";
                       
                       // foreach ($classWiseFeeResults as $row1) {
                      //     echo $row1['particulars'];
                           //echo "1";

                      // }
                    }


                    echo "<td>".$i++."</td>";
                  //  echo "<td>" . htmlspecialchars($row['feereceipt_id']) . "</td>";
                  // echo "<td>" . htmlspecialchars($row['Sno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Feereceiptno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['StudentRollNumber']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['addmissionno']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Studentname']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['class']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['section']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['year']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['addclasswisefeeitem']) . "</td>";
                    echo "<td>" . htmlspecialchars($amountPaid) . "</td>";
                    echo "<td>" . htmlspecialchars($dueAmount) . "</td>";
                    
                    echo "<td>" . htmlspecialchars($row['duedate']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                    echo "</tr>";
                }

                echo "<tr style='font-weight: bold; background-color: #f9f9f9;'>";
                echo "<td colspan='10' style='text-align: right;'>Total</td>";
                echo "<td>" . htmlspecialchars($totalMainAmountPaid) . "</td>";
                
                echo "<td colspan='3'></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='16'>No main fee receipt records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Fee Receipt Table -->
    <h2>Fee Receipt Details</h2>
    <table>
        <thead>
            <tr>
                <th>Sno</th>
                <th>Receipt No</th>
                <th>Date</th>
                <th>Roll Number</th>
                <th>Admission No</th>
                <th>Student Name</th>
                <th>Class</th>
                <th>Section</th>
                <th>Year</th>
                <th>Particulars</th>
                <th>Amount</th>
                <th>Amount Paid</th>
                <th>Due Amount</th>
                <th>Term</th>
                
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php
            
            $totalAmountPaid = 0;
            $i=1;
              if (count($mainFeereceiptResults) > 0) {
                foreach ($mainFeereceiptResults as $mainrow) {
                    $mFeereceiptno=$mainrow['Feereceiptno'];
                     $addclasswisefeeitem=$mainrow['addclasswisefeeitem'];
                       $Studentname=$mainrow['Studentname'];$class=$mainrow['class'];
                    $section=$mainrow['section'];
                    $year=$mainrow['year'];  $term=$mainrow['term'];
                     $date=$mainrow['date'];
                    $StudentRollNumber=$mainrow['StudentRollNumber'];
                    $addmissionno=$mainrow['addmissionno'];
                    $Studentname=$mainrow['Studentname'];$class=$mainrow['class'];
                    $section=$mainrow['section'];
                    $year=$mainrow['year'];
                    $dueamount=$mainrow['dueamount'];
                    $addclasswisefeeitem=$mainrow['addclasswisefeeitem'];
                    $term=$mainrow['term'];
                    $description=$mainrow['description'];

                if($addclasswisefeeitem=="yes")
                    {
                       //echo "yes";
                       $amountPaid = 0;
                       $dueamount = 0;
                       
                        foreach ($classWiseFeeResults as $cwfrow) {
                              $amount = $cwfrow['amount'] ?? 0; 
                              $particulars = $cwfrow['particulars'] ?? 0;
                              $amountPaid = $amount;
                              $dueamount = 0;
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
                    echo "<td>" . htmlspecialchars($amountPaid) . "</td>";
                    echo "<td>" . htmlspecialchars($dueamount) . "</td>";
                    echo "<td>" . htmlspecialchars($term). "</td>";
                    
                    echo "<td>" . htmlspecialchars($description). "</td>";
                    echo "</tr>";
                    
                    $totalAmountPaid += $amountPaid;

                           //echo "1";

                        }
                    }
      

            if (count($results) > 0) {
                foreach ($results as $row) {
                     $frFeereceiptno=$row['Feereceiptno'];
                    $particulars=$row['particulars'];
                    $amount = $row['amount'] ?? 0;

                     if($frFeereceiptno==$mFeereceiptno&&$particulars!=""&&$amount!="")
                     {
                   // $amount = $row['amount'] ?? 0;
                    $amountPaid = $row['amountpaid'] ?? 0;

                    
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
                    $dueamount=$row['dueamount'];
                    $addclasswisefeeitem=$row['addclasswisefeeitem'];
                    $term=$row['term'];
                    $description=$row['description'];
                    //if($addclasswisefeeitem=="yes")
                    //{
                       //echo "yes";
                       
                      //  foreach ($classWiseFeeResults as $row1) {
                          // echo $row1['particulars'];
                           //echo "1";

                       // }


                    echo "<tr>";
                    echo "<td>".$i++."</td>";
                   // echo "<td>" . htmlspecialchars($row['Sno'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['Feereceiptno'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['date'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['StudentRollNumber'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['addmissionno'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['Studentname'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['class'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['section'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['year'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($row['particulars'] ?? '') . "</td>";
                    echo "<td>" . htmlspecialchars($amount) . "</td>";
                    echo "<td>" . htmlspecialchars($amountPaid) . "</td>";
                    echo "<td>" . htmlspecialchars($dueamount) . "</td>";
                    echo "<td>" . htmlspecialchars($row['term'] ?? '') . "</td>";
                    
                    echo "<td>" . htmlspecialchars($row['description'] ?? '') . "</td>";
                    echo "</tr>";
                }
                }
            }
                
        }

        echo "<tr style='font-weight: bold; background-color: #f9f9f9;'>";
                echo "<td colspan='11' style='text-align: right;'>Total</td>";
                
                echo "<td>" . htmlspecialchars($totalAmountPaid) . "</td>";
                echo "<td colspan='3'></td>";
                echo "</tr>";
            } else {
                echo "<tr><td colspan='15'>No records found</td></tr>";
            }

         
            ?>
        </tbody>
    </table>

    


</body>
</html>
