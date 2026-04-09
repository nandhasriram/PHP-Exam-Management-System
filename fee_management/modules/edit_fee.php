<?php
// Include database connection
include '../config/db.php';

// Get the ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch existing record
$query = "SELECT * FROM feereceipt WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$id]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$record) {
    echo "Record not found.";
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $Feereceiptno = $_POST['Feereceiptno'];
    
    $StudentRollNumber = $_POST['StudentRollNumber'];
    $addmissionno = $_POST['addmissionno'];
    $Studentname = $_POST['Studentname'];
    $class = $_POST['class'];
    $section = $_POST['section'];
    $particulars = $_POST['particulars'];
    $amount = $_POST['amount'];
    $amountpaid = $_POST['amountpaid'];
    $term = $_POST['term'];
    $duedate = $_POST['duedate'];
    $description = $_POST['description'];

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Update feereceipt table
        $updateQuery = "UPDATE feereceipt SET 
                         
                        Feereceiptno = ?, 
                        
                        StudentRollNumber = ?, 
                        addmissionno = ?, 
                        Studentname = ?, 
                        class = ?, 
                        section = ?, 
                        particulars = ?, 
                        amount = ?, 
                        amountpaid = ?, 
                        term = ?, 
                        duedate = ?, 
                        description = ? 
                        WHERE id = ?";
                        
        $stmt = $conn->prepare($updateQuery);
        $stmt->execute([$Feereceiptno, $StudentRollNumber, $addmissionno, $Studentname, $class, $section, $particulars, $amount, $amountpaid, $term, $duedate, $description, $id]);

        // Update feereceipttemp table
        $updateTempQuery = "UPDATE feereceipttemp SET 
                             
                            Feereceiptno = ?, 
                             
                            StudentRollNumber = ?, 
                            addmissionno = ?, 
                            Studentname = ?, 
                            class = ?, 
                            section = ?, 
                            particulars = ?, 
                            amount = ?, 
                            amountpaid = ?, 
                            term = ?, 
                            duedate = ?, 
                            description = ? 
                            WHERE id = ?";
                            
        $stmtTemp = $conn->prepare($updateTempQuery);
        $stmtTemp->execute([$Feereceiptno, $StudentRollNumber, $addmissionno, $Studentname, $class, $section, $particulars, $amount, $amountpaid, $term, $duedate, $description, $id]);

        // Commit transaction
        $conn->commit();
        
        echo "<script>alert('Record updated successfully'); window.location.href='manage_fee.php';</script>";
    } catch (PDOException $e) {
        // Rollback if any error occurs
        $conn->rollBack();
        echo "<script>alert('Failed to update record: " . $e->getMessage() . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Fee Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            width: 80%;
            max-width: 800px;
            background-color: #fff;
            border: 2px solid #4CAF50;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #4CAF50;
            font-size: 24px;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }
        td {
            padding: 10px;
            vertical-align: middle;
        }
        label {
            font-weight: bold;
            display: inline-block;
            width: 150px;
        }
        input[type="text"], 
        input[type="number"], 
        input[type="date"], 
        textarea {
            width: calc(100% - 20px);
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 15px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
        }
        .action-buttons {
            text-align: center;
            margin-top: 20px;
        }
        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }
        button:hover {
            background-color: #45a049;
        }
        .back-btn {
            background-color: #007BFF;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Student Fee Receipt</h2>
    <form method="POST">
        <table>
            <tr>
                
                <td><label for="Feereceiptno">Fee Receipt No:</label></td>
                <td><input type="text" name="Feereceiptno" value="<?= htmlspecialchars($record['Feereceiptno'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="StudentRollNumber">Roll Number:</label></td>
                <td><input type="text" name="StudentRollNumber" value="<?= htmlspecialchars($record['StudentRollNumber'] ?? ''); ?>" required></td>
                <td><label for="addmissionno">Admission No:</label></td>
                <td><input type="text" name="addmissionno" value="<?= htmlspecialchars($record['addmissionno'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="Studentname">Name:</label></td>
                <td><input type="text" name="Studentname" value="<?= htmlspecialchars($record['Studentname'] ?? ''); ?>" required></td>
                <td><label for="class">Class:</label></td>
                <td><input type="text" name="class" value="<?= htmlspecialchars($record['class'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="section">Section:</label></td>
                <td><input type="text" name="section" value="<?= htmlspecialchars($record['section'] ?? ''); ?>" required></td>
                <td><label for="particulars">Particulars:</label></td>
                <td><input type="text" name="particulars" value="<?= htmlspecialchars($record['particulars'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="amount">Amount:</label></td>
                <td><input type="number" name="amount" value="<?= htmlspecialchars($record['amount'] ?? ''); ?>" required></td>
                <td><label for="amountpaid">Amount Paid:</label></td>
                <td><input type="number" name="amountpaid" value="<?= htmlspecialchars($record['amountpaid'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td><label for="term">Term:</label></td>
                <td><input type="text" name="term" value="<?= htmlspecialchars($record['term'] ?? ''); ?>" required></td>
                <td><label for="duedate">Due Date:</label></td>
                <td><input type="date" name="duedate" value="<?= htmlspecialchars($record['duedate'] ?? ''); ?>" required></td>
            </tr>
            <tr>
                <td colspan="2"><label for="description">Description:</label></td>
                <td colspan="2"><textarea name="description" rows="3"><?= htmlspecialchars($record['description'] ?? ''); ?></textarea></td>
            </tr>
        </table>

        <div class="action-buttons">
            <button type="submit">Save</button>
            <button type="button" class="back-btn" onclick="window.location.href='manage_fee.php'">Back</button>
        </div>
    </form>
</div>
</body>
</html>
