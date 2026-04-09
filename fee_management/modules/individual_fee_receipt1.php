<?php
// Include header and database connection
include '../template/header.php';
include '../config/db.php';
include '../config/db_connect.php';
error_reporting (E_ALL ^ E_NOTICE);
error_reporting(0);
//QRCODE start


$PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
//html PNG location prefix
$PNG_WEB_DIR = 'temp/';

include "phpqrcode/qrlib.php"; 
//echo "1";

//$data=addslashes($_POST['RollNumber']); 

//ofcourse we need rights to create temp dir
if (!file_exists($PNG_TEMP_DIR))
    mkdir($PNG_TEMP_DIR);


$filename = $PNG_TEMP_DIR.'test.png';

//processing form $_POST
//remember to sanitize user input in real-life solution !!!
$errorCorrectionLevel = 'L';
if (isset($_POST['level']) && in_array($_POST['level'], array('L','M','Q','H')))
    $errorCorrectionLevel = $_POST['level'];    

$matrixPointSize = 4;
if (isset($_REQUEST['size']))
    $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);

    $Regno=$AdmissionNo."_2024_Bsc".$StudentClass;
if (isset($Regno)) { 

    //it's very important!
    if (trim($Regno) == '')
        die('data cannot be empty! <a href="?">back</a>');
        
    // user data
    $filename = $PNG_TEMP_DIR.'test'.md5($Regno.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
    QRcode::png($Regno, $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    
} else {    

    //default data
    echo 'You can provide data in GET parameter: <a href="?data=like_that">like that</a><hr/>';    
    QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    
}    
    
//display generated file
//echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
// echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';




//QRcode end

$feeReceiptResult = null;
$classWiseFeeResult = null;

try {
    // Check if the database connection was successful
    if (!$conn) {
        throw new Exception("Connection failed");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get form input values and trim whitespace
        $Studentname = isset($_POST['Studentname']) ? trim($_POST['Studentname']) : '';
        $class = isset($_POST['class']) ? trim($_POST['class']) : '';
        $section = isset($_POST['section']) ? trim($_POST['section']) : '';
        $year = isset($_POST['year']) ? trim($_POST['year']) : '';

        // Query for Fee Receipt Table
        $feeReceiptQuery = "SELECT * FROM feereceipt WHERE 1=1";
        $feeReceiptParams = [];
        
        if (!empty($Studentname)) {
            $feeReceiptQuery .= " AND Studentname LIKE ?";
            $feeReceiptParams[] = "%$Studentname%";
        }
        if (!empty($class)) {
            $feeReceiptQuery .= " AND class LIKE ?";
            $feeReceiptParams[] = "%$class%";
        }
        if (!empty($section)) {
            $feeReceiptQuery .= " AND section LIKE ?";
            $feeReceiptParams[] = "%$section%";
        }
        if (!empty($year)) {
            $feeReceiptQuery .= " AND year LIKE ?";
            $feeReceiptParams[] = "%$year%";
        }

        $stmt = $conn->prepare($feeReceiptQuery);
        $stmt->execute($feeReceiptParams);
        $feeReceiptResult = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Query for Class-Wise Fee Table
        $classWiseFeeQuery = "SELECT * FROM class_wise_fee WHERE 1=1";
        $classWiseFeeParams = [];
        
        if (!empty($class)) {
            $classWiseFeeQuery .= " AND class LIKE ?";
            $classWiseFeeParams[] = "%$class%";
        }
        if (!empty($section)) {
            $classWiseFeeQuery .= " AND section LIKE ?";
            $classWiseFeeParams[] = "%$section%";
        }
        if (!empty($year)) {
            $classWiseFeeQuery .= " AND year LIKE ?";
            $classWiseFeeParams[] = "%$year%";
        }

        $stmt = $conn->prepare($classWiseFeeQuery);
        $stmt->execute($classWiseFeeParams);
        $classWiseFeeResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (Exception $e) {
    echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
}
try {
    // Check if the database connection was successful
    if (!$mysqli) {
        throw new Exception("Connection failed");
    }
 $fRQuery = "SELECT * FROM feereceipt WHERE  Studentname='".$Studentname."' AND class='".$class."' AND section='".$section."' AND year='".$year."'";
$result = $mysqli->query($fRQuery);$ns=$n=0;
 if ($result->num_rows > 0) {
   while($row1 = $result->fetch_assoc()) {    
   // echo "t1";
     $ns=$row1['amount']; 
     $addmissionno=$row1['addmissionno'];
 $n=$n+$ns;
 //echo "t1";
   }
}
 $cwfQuery = "SELECT * FROM class_wise_fee WHERE class='".$class."' AND section='".$section."' AND year='".$year."'";
$result = $mysqli->query($cwfQuery);
 if ($result->num_rows > 0) {
   while($row1 = $result->fetch_assoc()) {    
    // echo "t1";
    $ns=$row1['amount']; 
 $n=$n+$ns;
   }
}
}

catch (Exception $e) {
    echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
}
include 'notoword.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Fee Receipt</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Generate Fee Receipt</h2>

    <!-- Form to filter data -->
    <form method="POST" action="">
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="Studentname">Student Name</label>
                <input type="text" id="Studentname" name="Studentname" class="form-control" placeholder="Enter Student Name">
            </div>
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
        </div>
        <button type="submit" class="btn btn-primary mt-3">Generate Receipt</button>
        <a href="../dashboard.php" class="btn btn-secondary mt-3 ml-2">Back to Dashboard</a>
    </form>

    <!-- Fee Receipt Table -->
    <?php if (isset($feeReceiptResult) && count($feeReceiptResult) > 0): ?>
        <h3 class="text-center mt-5">Fee Receipt Records</h3>
      <!--  <button onclick="printTable('feeTable')" class="btn btn-info mb-3">Print</button>-->
        <form method="POST" action="receiptprint.php">
      
        <input type="hidden" id="Studentname" name="Studentname" value="<?php echo $Studentname;?>" />
        <input type="hidden" id="class" name="class" value="<?php echo $class;?>" />
        <input type="hidden" id="section" name="section" value="<?php echo $section;?>" />
        <input type="hidden" id="year" name="year" value="<?php echo $year;?>" />
        <button type="submit"  class="btn btn-info mb-3">Print</button>
        </form>
        <table id="feeTable" class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Student Roll Number</th>
                    <th>Admission No</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                    <th>Due Amount</th>
                    <th>Term</th>
                    <th>Due Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($feeReceiptResult as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['StudentRollNumber']); ?></td>
                        <td><?php echo htmlspecialchars($row['addmissionno']); ?></td>
                        <td><?php echo htmlspecialchars($row['Studentname']); ?></td>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                        <td><?php echo htmlspecialchars($row['section']); ?></td>
                        <td><?php echo htmlspecialchars($row['year']); ?></td>
                        <td><?php echo htmlspecialchars($row['particulars']); ?></td>
                        <td><?php echo htmlspecialchars($row['amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['dueamount']); ?></td>
                        <td><?php echo htmlspecialchars($row['term']); ?></td>
                        <td><?php echo htmlspecialchars($row['duedate']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center mt-5">No Fee Receipt records found for the selected criteria.</p>
    <?php endif; ?>

    <!-- Class-Wise Fee Table -->
    <?php if (isset($classWiseFeeResult) && count($classWiseFeeResult) > 0): ?>
        <h3 class="text-center mt-5">Class-Wise Fee Records</h3>
        <table id="classFeeTable" class="table table-bordered mt-3"  style="border: 1px solid black;">
            <thead>
                <tr>
                    <th>Class</th>
                    <th>Section</th>
                    <th>Year</th>
                    <th>Particulars</th>
                    <th>Amount</th>
                    <th>Term</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($classWiseFeeResult as $row): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['class']); ?></td>
                        <td><?php echo htmlspecialchars($row['section']); ?></td>
                        <td><?php echo htmlspecialchars($row['year']); ?></td>
                        <td><?php echo htmlspecialchars($row['particulars']); ?></td>
                        <td><?php echo htmlspecialchars($row['amount']); ?></td>
                        <td><?php echo htmlspecialchars($row['term']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="text-center mt-5">No Class-Wise Fee records found for the selected criteria.</p>
    <?php endif; ?>
</div>

<!-- Footer Section -->
<footer class="text-center mt-5">
    <?php include '../template/footer.php'; ?>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function printTable() {
    var table = document.getElementById('feeTable');
    var rows = table.getElementsByTagName('tbody')[0].rows;

    if (rows.length === 0) {
        alert('No data available to print.');
        return;
    }

    var groupedReceipts = {};
    Array.from(rows).forEach(row => {
        var studentName = row.cells[2].innerText;
        if (!groupedReceipts[studentName]) {
            groupedReceipts[studentName] = [];
        }
        groupedReceipts[studentName].push(row);
    });
   

    for (const [studentName, matchingRows] of Object.entries(groupedReceipts)) {
        var receiptContent = `
            <div style="width: 400px; font-family: Arial, sans-serif; margin: auto; text-align: center; border: 1px solid black; padding: 20px;">
                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 10px;">
                    <img src="logo.png" style="width: 40px; height: 40px; margin-right: 10px;" alt="College Logo">
                    <h2 style="margin: 0;">Your College Name</h2>
                </div>
                <p>Address of the College, City, Zip Code</br>
                
                <?php //echo $AdmireceiptNobarcode=$addmissionno.'_2024_'.$Class."</br>";
      $AdmireceiptNobarcode=$addmissionNo.'_2024_'.$Class;
     echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
    
    ?>   
                
               
    
    
   
                
                </p>
                <h3 style="margin: 20px 0; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0;">Student Fee Receipt</h3>
                <table style="width: 100%; font-size: 14px; margin-bottom: 10px; border-collapse: collapse;"> 
                    <tr>
                        <td style="text-align: left; width: 50%;">Student Name:</td>
                        <td style="text-align: left;">${studentName}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Receipt Date:</td>
                        <td style="text-align:left;">${new Date().toLocaleDateString()}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Fee Receipt No:</td>
                        <td style="text-align: left;">${matchingRows[0].cells[1].innerText}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Class:</td>
                        <td style="text-align: left;">${matchingRows[0].cells[3].innerText}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Section:</td>
                        <td style="text-align: left;">${matchingRows[0].cells[4].innerText}</td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Year:</td>
                        <td style="text-align: left;">                      
                        ${matchingRows[0].cells[5].innerText}</td>
                    </tr>
                </table>
                <table style="width: 100%; font-size: 14px; margin-top: 10px; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0;">
                    <tr style="border-bottom: 1px solid black;">
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>Particulars</strong></td>
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>Amount</strong></td>
                    </tr>   `;
                 //  var total =matchingRows[0].cells[8].innerText;
        matchingRows.forEach(matchRow => {
            receiptContent += `
                <tr>
                    <td style="text-align: left;">${matchRow.cells[6].innerText}</td>
                    <td style="text-align: left;">
                  
                    ${matchRow.cells[7].innerText}</td>
                </tr>`;
        });

       
        receiptContent += `
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Total Due Amount

                    
                    </td>
                    <td style="text-align: left;">
                    <?php 
                   // $n=${matchRow.cells[7].innerText};
                  // $n=2000;
                   
                    echo '('.$str.') Only';
                    ?>
                    ${matchingRows[0].cells[8].innerText}
                    <input type="hidden" id="year" name="year" class="form-control" placeholder="Enter Year">
                    
                    </td>
                </tr>
            </table>
            <p style="margin-top: 10px; text-align: left;">Cashier Sign:</p>
        </div>`;

        var originalContent = document.body.innerHTML;
        document.body.innerHTML = receiptContent;
        window.print();
        document.body.innerHTML = originalContent;
    }
}
</script>



</body>
</html>
