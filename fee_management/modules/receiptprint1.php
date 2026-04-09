
<style>
  @media print {
            .print-button {
                display: none;
            }
        }
        </style>

<div style="width: 400px; font-family: Arial, sans-serif; margin: auto; text-align: center; border: 1px solid black; padding: 20px;">
                <div style="display: flex; justify-content: center; align-items: center; margin-bottom: 10px;">
                    <img src="logo.png" style="width: 40px; height: 40px; margin-right: 10px;" alt="College Logo">
                    <h2 style="margin: 0;">Your College Name</h2>
                </div>
                <p>Address of the College, City, Zip Code</br>
                <?php //echo $AdmireceiptNobarcode=$addmissionno.'_2024_'.$Class."</br>";
                error_reporting (E_ALL ^ E_NOTICE);
                error_reporting(0);
                include '../config/db_connect.php';
//QRCODE start

/*
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



*/
//QRcode end
$Feereceiptno=addslashes($_GET['receipt_id']);
$fRQuery = "SELECT DISTINCT * FROM feereceipt WHERE Feereceiptno='".$Feereceiptno."'";
 $result = $mysqli->query($fRQuery);
     if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {    
       // echo "t1";
         $Studentname=$row['Studentname']; 
         $addmissionno=$row['addmissionno'];
         $date=$row['date'];
         $class=$row['class'];
         $section=$row['section'];
         $year=$row['year'];
         $term=$row['term'];
         $amountpaid=$row['amountpaid'];
         $dueamount=$row['dueamount'];
     
     //echo "t1";
       }
    }
  
/*
              echo  $Feereceiptno=addslashes($_POST['Feereceiptno']);
                $Studentname=addslashes($_POST['Studentname']); 
                $class=addslashes($_POST['class']); 
                $section=addslashes($_POST['section']); 
                $year=addslashes($_POST['year']); 
                $term=addslashes($_POST['term']);*/
               // $AdmissionNo=addslashes($_POST['AdmissionNo']); 
      $AdmireceiptNobarcode=$addmissionNo.'_2024_'.$Class;

     echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';
/*

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
    */
   
    //$FeeReceiptNo=1; $ReceiptDate="15-11-2024";
    
    ?>
    
                
               
    
                
   
                
                </p>
                <h3 style="margin: 20px 0; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0;">Student Fee Receipt</h3>
                <table style="width: 100%; font-size: 14px; margin-bottom: 10px; border-collapse: collapse;"> 
                    <tr>
                        <td style="text-align: left;">Fee Receipt No:</td>
                        <td style="text-align: left;"><?php echo $Feereceiptno;?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left; width: 50%;">Student Name:</td>
                        <td style="text-align: left;"><?php echo $Studentname;?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Receipt Date:</td>
                        <td style="text-align:left;"><?php echo $date;?></td>
                    </tr>
                    
                    <tr>
                        <td style="text-align: left;">Class:</td>
                        <td style="text-align: left;"><?php echo $class;?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Section:</td>
                        <td style="text-align: left;"><?php echo $section;?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Year:</td>
                        <td style="text-align: left;">                      
                        <?php echo $year;?></td>
                    </tr>
                    
                </table>
                
                <table style="width: 100%; font-size: 14px; margin-top: 10px; border-top: 1px solid black; border-bottom: 1px solid black; padding: 10px 0;">
                    <tr style="border-bottom: 1px solid black;">
                    <td style="border-bottom: 1px solid black;text-align: left;"><strong>S.no</strong></td>
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>Particulars</strong></td>
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>Amount</strong></td>
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>&nbsp;&nbsp;Paid Amt</strong></td>
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>&nbsp;&nbsp;Due Amt</strong></td>
                        <td style="border-bottom: 1px solid black;text-align: left;"><strong>&nbsp;&nbsp;Term</strong></td>
                    </tr>   
            <?php    //  var total =matchingRows[0].cells[8].innerText;
                 try {
                    $sno=1;
        // Check if the database connection was successful
        if (!$mysqli) {
            throw new Exception("Connection failed");
        }
   //  echo $fRQuery = "SELECT * FROM feereceipt WHERE Feereceiptno='".$Feereceiptno."'AND Studentname='".$Studentname."' AND class='".$class."' AND section='".$section."' AND year='".$year."' AND term='".$term."'";
   $fRQuery = "SELECT * FROM feereceipt WHERE Feereceiptno='".$Feereceiptno."'";
   
   $result = $mysqli->query($fRQuery);$ns=$n=0;
     if ($result->num_rows > 0) {
       while($row1 = $result->fetch_assoc()) {    
       // echo "t1";

       ?>
 <tr> <td style="text-align: left;"><strong><?php echo $sno++;?></strong></td>
                    <td style="text-align: left;"><?php echo $row1['particulars'];?></td>
                    <td style="text-align: left;"> <?php echo $amount=$row1['amount'];?></td>
                    <td style="text-align: center;"><?php echo $paidamount=$row1['amountpaid'];?></td>
                    <td style="text-align: center;"> <?php echo $dueamount=$row1['dueamount'];?></td>
               
                    <td style="text-align: center;"> <?php echo $row1['term'];?></td>
                </tr>
       
       <?php
        
     $n=$n+$amount;
     //echo "t1";
       }
    }
    $Query = "SELECT class, section, year, addclasswisefeeitem, term FROM main_feereceipt WHERE addclasswisefeeitem= 'yes' AND Feereceiptno='".$Feereceiptno."'" ;
    $result = $mysqli->query($Query);
     if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) { 
         $class=$row['class']; 
         $section=$row['section'];
         $year=$row['year'];
         $addclasswisefeeitem=$row['addclasswisefeeitem'];
         $term=$row['term'];
       }}
        // echo "t1";
       if($addclasswisefeeitem = 'yes'){ 
    $cwfQuery = "SELECT * FROM class_wise_fee WHERE class='".$class."' AND section='".$section."' AND year='".$year."' AND term='".$term."'";
    $result = $mysqli->query($cwfQuery);
     if ($result->num_rows > 0) {
       while($row1 = $result->fetch_assoc()) {    
        // echo "t1";
        
       ?>
       <tr>
       <td style="text-align: left;"><strong><?php echo $sno++;?></strong></td>
       <td style="text-align: left;"><?php echo $row1['particulars'];?></td>
                    <td style="text-align: left;"> <?php echo $amount=$row1['amount'];?></td>
                      </tr>
             
             <?php
              
           $n=$n+$amount;
           //echo "t1";
            
       // $ns=$row1['amount']; 
    // $n=$n+$ns;
       }
    }
}
                 }
    
    catch (Exception $e) {
        echo "<div class='alert alert-danger'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }

    ?>
               

       
 
                <tr>
                    <td colspan="3"><hr></td>
                </tr>
                <tr>
                    <td style="text-align: left;">Total Amount

                    
                    </td>
                    <td style="text-align: left;">
                    <?php 
                   // $n=${matchRow.cells[7].innerText};
                  // $n=2000;
                  include 'notoword.php';
                    echo '('.$str.') Only';
                    ?>
                  <?php echo $n;?>
                  
                    
                    </td>
                    <tr>
                        <td style="text-align: left;">Amount Paid:</td>
                        <td style="text-align: left;"><?php echo $amountpaid;?></td>
                    </tr>
                    <tr>
                        <td style="text-align: left;">Due Paid:</td>
                        <td style="text-align: left;"><?php echo $dueamount;?></td>
                    </tr>
                </tr>
            </table>
            <p style="margin-top: 10px; text-align: left;">Cashier Sign:</p> 
           
            <div class="print-button">
            <button onclick="window.print();" class="btn btn-light">Print </button>
            <a href="individual_fee_receipt.php" class="btn btn-secondary mt-3 ml-2">
                 <button  class="btn btn-light">Back
        </button></a>
        </div>
        </div>
        <script>
       
           // window.print();
       
    </script>