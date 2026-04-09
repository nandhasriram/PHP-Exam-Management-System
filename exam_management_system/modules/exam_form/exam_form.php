<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PG Examination Application</title>
    <style>
        /* Your styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .form-container {
            width: 90%;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        header {
            text-align: center;
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 24px;
            font-weight: bold;
        }

        header p {
            margin: 5px 0;
            font-size: 14px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            border: 2px solid #333;
            padding: 8px;
            font-size: 14px;
            vertical-align: top;
            text-align: left;
        }

        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #555;
            border-radius: 4px;
            resize: none;
        }

        .section-title {
            font-weight: bold;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"], input[type="number"], input[type="date"], textarea {
            width: calc(100% - 16px);
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #555;
            border-radius: 4px;
        }

        .checkbox-group, .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 10px;
        }

        footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        footer p {
            margin: 0;
        }
        
    </style>
</head>
<body>
    <div class="form-container">
        <header>
            <h1>BHARATHIDASAN UNIVERSITY</h1>
            <p>TIRUCHIRAPPALLI - 620 024.</p>
            <p>(Re-Accredited with 'A' Grade among the Universities by NAAC)</p>
            <p>For the candidates admitted in the year <span>20__ - 20__</span></p>
        </header>
        <h2>P.G. Degree Examination Application</h2>
        <p>(All P.G. / M.C.A. / M.B.A. / M.S.I.T / Diploma Courses)</p>

        <form action="submit_exam_form.php" method="POST">
            <table>
                <tr>
                    <td>Semester:</td>
                    <td colspan="3">
                        <label><input type="checkbox" name="session_time" value="Day"> Day</label>
                        <label><input type="checkbox" name="session_time" value="Evening"> Evening</label>
                        <label><input type="checkbox" name="session_time" value="CDE"> CDE</label>
                    </td>
                </tr>
                <tr>
                    <td>Name of the College / Centre:</td>
                    <td colspan="3"><input type="text" name="collage_name" required></td>
                </tr>
                <tr>
                    <td>Centre Code:</td>
                    <td><input type="text" name="center_code" required></td>
                    <td>Register Number:</td>
                    <td><input type="number" name="register_number" required></td>
                </tr>
                <tr>
                    <td>Year of Admission:</td>
                    <td><input type="text" name="admission_year" required></td>
                </tr>
                <tr>
                    <td>Name of the Candidate (as per H.S.C. Records):</td>
                    <td colspan="3"><input type="text" name="student_name" required></td>
                </tr>
                <tr>
                    <td>Name of the Father / Guardian:</td>
                    <td colspan="3"><input type="text" name="father_name"></td>
                </tr>
                <tr>
                    <td>Date of Birth (as per H.S.C. Records):</td>
                    <td colspan="3"><input type="date" name="date_of_birth"></td>
                </tr>
                <tr>
                    <td>Name of the Course with Main Subject:</td>
                    <td colspan="3"><input type="text" name="course"></td>
                </tr>
            </table>

            <div class="section-title">Medium of Instruction:</div>
            <div class="checkbox-group">
                <label><input type="checkbox" name="medium" value="English"> English</label>
                <label><input type="checkbox" name="medium" value="Tamil"> Tamil</label>
            </div>

            <div class="section-title">Sex:</div>
            <div class="radio-group">
                <label><input type="radio" name="sex" value="Male"> Male</label>
                <label><input type="radio" name="sex" value="Female"> Female</label>
            </div>

            <div class="section-title">Community:</div>
            <div class="checkbox-group">
                <label><input type="checkbox" name="community" value="SC"> SC</label>
                <label><input type="checkbox" name="community" value="ST"> ST</label>
                <label><input type="checkbox" name="community" value="MBC"> MBC</label>
                <label><input type="checkbox" name="community" value="BC"> BC</label>
                <label><input type="checkbox" name="community" value="OC"> OC</label>
            </div>

            <div class="section-title">Address:</div>
            <table>
                <tr>
                    <td>Temporary Address:</td>
                    <td><textarea name="temporary_address"></textarea></td>
                </tr>
                <tr>
                    <td>Permanent Address:</td>
                    <td><textarea name="permanent_address"></textarea></td>
                </tr>
                <tr>
                    <td>Pin:</td>
                    <td><input type="text" name="pin_code"></td>
                    <td>Contact No:</td>
                    <td><input type="text" name="contact_number"></td>
                </tr>
            </table>

            <div class="section-title">Fee Particulars:</div>
            <table>
                <tr>
                    <td>Name of the Bank and Place:</td>
                    <td><input type="text" name="bank_name"></td>
                </tr>
                <tr>
                    <td>D.D. Number:</td>
                    <td><input type="text" name="d_d_number"></td>
                </tr>
                <tr>
                    <td>Date:</td>
                    <td><input type="date" name="d_d_date"></td>
                </tr>
                <tr>
                    <td>Amount Rs. (In Words):</td>
                    <td><input type="text" name="amount"></td>
                </tr>
            </table>

            <h2>Papers Now Appearing</h2>

<!-- Table for Semesters I, II, and III -->
<table border="1" id="semester1-3">
    <thead>
        <tr>
            <th colspan="2"><input type="text" name="semester" value="SEMESTER 1"></th>
            <th colspan="2"><input type="text" name="semester" value="SEMESTER 2"></th>
            <th colspan="2"><input type="text" name="semester" value="SEMESTER 3"></th>
        </tr>
        <tr>
            <th>Sub. Code</th>
            <th>Subject</th>
            <th>Sub. Code</th>
            <th>Subject</th>
            <th>Sub. Code</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="subject_code"></td>
            <td><input type="text" name="subject"></td>
            <td><input type="text" name="subject_code"></td>
            <td><input type="text" name="subject"></td>
            <td><input type="text" name="subject_code"></td>
            <td><input type="text" name="subject"></td>
            <td>
                <button type="button" onclick="addRow('semester1-3')">Add</button>
                <button type="button" onclick="removeRow(this)">Remove</button>
            </td>
        </tr>
    </tbody>
</table>

<!-- Table for Semesters IV, V, and VI -->
<table border="1" id="semester4-6">
    <thead>
        <tr>
            <th colspan="2"><input type="text" name="semester" value="SEMESTER 4"></th>
            <th colspan="2"><input type="text" name="semester" value="SEMESTER 5"></th>
            <th colspan="2"><input type="text" name="semester" value="SEMESTER 6"></th>
        </tr>
        <tr>
            <th>Sub. Code</th>
            <th>Subject</th>
            <th>Sub. Code</th>
            <th>Subject</th>
            <th>Sub. Code</th>
            <th>Subject</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="subject_code"></td>
            <td><input type="text" name="subject"></td>
            <td><input type="text" name="subject_code"></td>
            <td><input type="text" name="subject"></td>
            <td><input type="text" name="subject_code"></td>
            <td><input type="text" name="subject"></td>
            <td>
                <button type="button" onclick="addRow('semester4-6')">Add</button>
                <button type="button" onclick="removeRow(this)">Remove</button>
            </td>
        </tr>
    </tbody>
</table>

</table>

<!-- Submit Button -->
            <button type="submit">Submit Application</button>
            <button type="button" onclick="window.location.href='dashboard.php';">Back</button>
        </form>

        <script>
function addRow(tableId) {
    let table = document.getElementById(tableId).getElementsByTagName('tbody')[0];
    let newRow = table.insertRow();
    
    for (let i = 0; i < 6; i++) {
        let cell = newRow.insertCell(i);
        let input = document.createElement("input");
        input.type = "text";
        input.name = "subject_code";
        cell.appendChild(input);
    }

    let actionCell = newRow.insertCell(6);
    let addButton = document.createElement("button");
    addButton.type = "button";
    addButton.innerText = "Add";
    addButton.onclick = function() { addRow(tableId); };
    
    let removeButton = document.createElement("button");
    removeButton.type = "button";
    removeButton.innerText = "Remove";
    removeButton.onclick = function() { removeRow(this); };

    actionCell.appendChild(addButton);
    actionCell.appendChild(removeButton);
}

function removeRow(button) {
    let row = button.parentNode.parentNode;
    let table = row.parentNode;
    
    if (table.rows.length > 1) {  // Ensure at least one row remains
        table.removeChild(row);
    } else {
        alert("At least one row must remain.");
    }
}
</script>
    </div>
</body>
</html>
