<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revaluation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 0;
            background-color: #f5f5f5;
        }

        .form-container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-bottom: 20px;
            text-align: center;
        }

        .header img {
            max-width: 80px;
            height: auto;
            margin-bottom: 10px;
        }

        .header h2, .header h3, .header h4 {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table td, table th {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .full-width {
            width: 100%;
        }

        .details-table{
            width: 80%;
        }

        .details-table th, td {
            background-color: #f0f0f0;
            
        }

        .signature {
            margin-top: 20px;
            display: flex;
            justify-content: space-between;
        }

        .signature label {
            display: flex;
            flex-direction: column;
        }

        .office-use {
            margin-top: 20px;
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .button-container button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007BFF;
            color: #fff;
        }

        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <!-- Header with logo -->
        <div class="header">
            <img src="/exam_management_system/assets/image/logo.png" alt="University Logo">
            <h2>ANNA UNIVERSITY, CHENNAI – 600 025.</h2>
            <h3>Office of the Additional Controller of Examinations (University Departments)</h3>
            <h4>APPLICATION FOR REVALUATION OF ANSWER SCRIPT - Session – ………….</h4>
        </div>

        <form action="insert_revaluation.php" method="POST">
            <table>
                <tr>
                    <td>Application Number</td>
                    <td><input type="text" name="application_number"></td>
                    <td>Campus (Tick ✓)</td>
                    <td>
                        <label><input type="checkbox" name="campus" value="CEG"> CEG</label>
                        <label><input type="checkbox" name="campus" value="MIT"> MIT</label>
                        <label><input type="checkbox" name="campus" value="ACT"> ACT</label>
                        <label><input type="checkbox" name="campus" value="SAP"> SAP</label>
                    </td>
                </tr>
                <tr>
                    <td>Name in Block Letters</td>
                    <td colspan="3"><input type="text" name="name" class="full-width"></td>
                </tr>
                <tr>
                    <td>Roll Number</td>
                    <td colspan="3"><input type="text" name="roll_number"></td>
                </tr>
                <tr>
                    <td>Program</td>
                    <td colspan="3">
                        <label><input type="radio" name="program" value="B.E/B.Tech"> B.E / B.Tech</label>
                        <label><input type="radio" name="program" value="B.Arch"> B.Arch</label>
                        <label><input type="radio" name="program" value="M.E/M.Tech"> M.E / M.Tech</label>
                        <label><input type="radio" name="program" value="M.Sc"> M.Sc</label>
                        <label><input type="radio" name="program" value="M.Arch/M.Plan"> M.Arch / M.Plan</label>
                        <label><input type="radio" name="program" value="Others"> Others (specify)</label>
                    </td>
                </tr>
                <tr>
                    <td>Branch / Specialization</td>
                    <td colspan="3"><input type="text" name="branch"></td>
                </tr>
                <tr>
                    <td>Mobile No.</td>
                    <td><input type="text" name="mobile_no"></td>
                    <td>E-mail ID</td>
                    <td><input type="text" name="email"></td>
                </tr>
                <tr>
                    <td>Mode (Tick ✓)</td>
                    <td colspan="3">
                        <label><input type="radio" name="mode" value="fullTime"> Full Time</label>
                        <label><input type="radio" name="mode" value="partTime"> Part Time</label>
                    </td>
                </tr>
            </table>

            <h4>DETAILS OF REVALUATION APPLIED</h4>
<table class="details-table" id="detailsTable">
    <thead>
        <tr>
            <th>Sl. No</th>
            <th>Sem No</th>
            <th>Subject Code</th>
            <th>Subject Title</th>
            <th>Regular / Arrear</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><input type="text" name="sl_no[]"></td>
            <td><input type="text" name="semester_no[]"></td>
            <td><input type="text" name="subject_code[]"></td>
            <td><input type="text" name="subject_title[]"></td>
            <td><input type="text" name="regular_arrear[]"></td>
            <td><button type="button" class="removeRowBtn">Remove</button></td>
        </tr>
    </tbody>
</table>
<button type="button" id="addRowBtn">Add Row</button>

<script>
    // Function to add a new row
    document.getElementById('addRowBtn').addEventListener('click', function() {
        const tableBody = document.querySelector('#detailsTable tbody');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="text" name="sl_no[]"></td>
            <td><input type="text" name="semester_no[]"></td>
            <td><input type="text" name="subject_code[]"></td>
            <td><input type="text" name="subject_title[]"></td>
            <td><input type="text" name="regular_arrear[]"></td>
            <td><button type="button" class="removeRowBtn">Remove</button></td>
        `;
        tableBody.appendChild(newRow);

        // Attach event listener to the new remove button
        attachRemoveEvent(newRow.querySelector('.removeRowBtn'));
    });

    // Function to attach remove event
    function attachRemoveEvent(button) {
        button.addEventListener('click', function() {
            this.closest('tr').remove(); // Remove the row
        });
    }

    // Attach remove event to existing rows
    document.querySelectorAll('.removeRowBtn').forEach(attachRemoveEvent);
</script>


            <h4>Details of Fee Payment (Enclose the original challan - ACOE copy)</h4>
            <table>
                <tr>
                    <td>Challan Date</td>
                    <td><input type="date" name="challan_date"></td>
                </tr>
                <tr>
                    <td>Bank Details</td>
                    <td><input type="text" name="bank_details"></td>
                </tr>
                <tr>
                    <td>Amount (Rs)</td>
                    <td><input type="text" name="amount"></td>
                </tr>
            </table>

            <p>Revaluation of Answer Scripts: Rs.200/- per answer script.</p>

            <h4>Declaration</h4>
            <p>
                I agree to consider my revalued grade / mark as final irrespective of any improvement or not.
                Also, I am aware that my application may be rejected due to submission of wrong / incomplete information.
            </p>

            <div class="signature">
                <label>Date: <input type="date" name="date"></label>
                <label>Signature of the Student: <input type="text" name="signature"></label>
            </div>

        </br>
            <hr>
            <div class="office-use">
                <p>For office use</p>
    </br>
    </br>
                <div style="display: flex; justify-content: space-between;">
                    <label style="text-align: left;">Suptd.,</label>
                    <label style="text-align: center;">DCOE</label>
                    <label style="text-align: right;">ACOE(UDs)</label>
                </div>
            </div>
</br>
</br>
        <div class="button-container">
                
                <button type="submit">Submit</button>
                <button type="button" onclick="goToDashboard()">Back</button>
            </div>
    </form>
    </div>
    <script>
        function goToDashboard() {
            window.location.href = "dashboard.php";
        }
    </script>
</body>
</html>
