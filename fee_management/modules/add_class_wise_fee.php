<?php
// Include the database connection file
include '../config/db.php';
include '../template/header.php';

// Initialize variables for form fields and error messages
$error = '';
$success = '';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data and sanitize
    $class = $_POST['class'];
    $section = $_POST['section'];
    $year = $_POST['year'];
    $term = $_POST['term'];
    $particulars = $_POST['particulars'];
    $amounts = $_POST['amount'];

    try {
        // Begin transaction
        $conn->beginTransaction();

        // Loop through particulars and amounts arrays to insert multiple records
        foreach ($particulars as $index => $particular) {
            $amount = $amounts[$index];

            // Insert into `class_wise_fee` table
            $stmt = $conn->prepare("INSERT INTO class_wise_fee (class, section, year, term, particulars, amount) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([$class, $section, $year, $term, $particular, $amount]);
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Class-wise Fee Entry</title>
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
        .form-group input {
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
        <h2>Class-wise Fee Entry</h2>

        <!-- Display success or error message -->
        <?php if (isset($_GET['success'])): ?>
            <p class="message success"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php elseif ($error): ?>
            <p class="message error"><?php echo $error; ?></p>
        <?php endif; ?>

        <form action="add_class_wise_fee.php" method="post">
            <div class="form-row">
                <div class="form-group">
                    <label for="class">Class</label>
                    <input type="text" id="class" name="class" required>
                </div>
                <div class="form-group">
                    <label for="section">Section</label>
                    <input type="text" id="section" name="section" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="text" id="year" name="year" required>
                </div>
                <div class="form-group">
                    <label for="term">Term</label>
                    <input type="text" id="term" name="term" required>
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

            <div class="button-group">
                <button type="submit" class="button">Submit</button>
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
