<?php
// Include database connection
include '../config/db1.php';
include '../template/header.php';

try {
    // Fetch records from the admisapplicastuddetail table
    $query = "SELECT * FROM admisapplicastuddetail ORDER BY id ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result(); // Use `get_result()` to fetch the result set
} catch (Exception $e) {
    die("Database error: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Records</title>
    <style>
        /* General Styles */
        body, html {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h2 {
            color: #4CAF50;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
        }

        /* Table Styles */
        table {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            vertical-align: middle;
            border: 1px solid #ddd;
        }

        thead th {
            background-color: #4CAF50;
            color: #fff;
            font-weight: bold;
            position: sticky;
            top: 0;
            z-index: 1;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e0f7fa;
        }

        /* Form Container */
        .form-container {
            width: 100%;
            max-width: 95vw;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            box-sizing: border-box;
            flex-grow: 1;
        }

        /* Button Styles */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        .action-buttons a {
            padding: 8px 12px;
            text-decoration: none;
            color: #fff;
            border-radius: 4px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .edit-btn {
            background-color: #4CAF50;
        }

        .edit-btn:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }

        /* Back Button Styles */
        .back-btn {
            display: block;
            width: fit-content;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .back-btn:hover {
            background-color: #0056b3;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            table {
                font-size: 13px;
            }

            th, td {
                padding: 8px;
            }

            .action-buttons {
                flex-direction: column;
                gap: 4px;
            }
        }

        @media (max-width: 480px) {
            table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }

            th, td {
                display: block;
                text-align: left;
                padding: 10px;
            }

            tr {
                display: table-row;
                border-bottom: 1px solid #ddd;
                margin-bottom: 10px;
            }

            td::before {
                content: attr(data-label);
                font-weight: bold;
                display: inline-block;
                width: 120px;
                color: #333;
            }

            .action-buttons {
                display: flex;
                justify-content: flex-start;
            }
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 10px;
            background-color: #333;
            color: #fff;
            position: relative;
            bottom: 0;
            left: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <div>
        <h2>Student Records</h2>
        <table>
            <thead>
                <tr>
                    
                    <th>Admission No</th>
                    <th>Student Name</th>
                    <th>Admission Class</th>
                    <th>Admission Section</th>
                    <th>Date</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Religion</th>
                    <th>Nationality</th>
                    <th>Community</th>
                    <th>Caste</th>
                    <th>Present ResPhone</th>
                    <th>Present Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        
                        echo "<td>" . htmlspecialchars($row['AdmissionNo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['StudentName']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['admissionClass']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['admissionSection']) . "</td>";
                        echo "<td>" . htmlspecialchars(isset($row['date']) ? $row['date'] : 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars(isset($row['dob']) ? $row['dob'] : 'N/A') . "</td>";
                        echo "<td>" . htmlspecialchars($row['Gender']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Age']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Religion']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Nationality']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Community']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['Caste']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['PresentResPhone']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['PresentEmail']) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_fee.php?id=" . urlencode($row['id']) . "'>Edit</a> | ";
                        echo "<a href='delete_fee.php?id=" . urlencode($row['id']) . "' onclick='return confirm(\"Are you sure?\");'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='16'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="manage_fee_dashboard.php" class="back-btn">Back to Dashboard</a>
    </div>

    <footer>
        <?php include '../template/footer.php'; ?>
    </footer>
</body>
</html>
