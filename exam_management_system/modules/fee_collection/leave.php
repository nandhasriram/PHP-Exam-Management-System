<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Leave Request Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2, h3 {
            text-align: center;
        }
        <!--.form-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            border: 2px solid #000; /* Border added */
            
        }
        .logo {
            position: absolute;
            top: 50px;
            left: 200px;
            width: 100px; /* Adjust logo size */
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table td {
            padding: 10px;
        }
        table td label {
            display: block;
            margin-bottom: 5px;
        }
        .table, .th, .td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: left;
        }
        .table .th {
            padding: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
        }
        input[type="checkbox"] {
            margin-right: 10px;
        }
        select, textarea {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .input {
            border: none;
            outline: 0;
            border-bottom: 1px solid #333;
            padding: 8px;
            box-sizing: border-box;
            background: transparent;
            font-size: 16px;
        }
        h2 {
            text-decoration: underline;
        }
        .important-note-section {
            border: 1px solid #000;
            padding: 15px;
            margin-bottom: 20px;
        }
        .important-note-section ul {
            font-size: 14px;
            line-height: 1.5;
            color: #333;
        }
        .check_box_label { float: left; display: inline-block; }
        .label_text { float: left; display: inline-block; width: 50%; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Student Leave Request Form</h2>
        <img src="logo.png" alt="School Logo" class="logo">
        <h3 style="text-decoration: underline; font-weight: bold; text-align: left;">Important Note for Parents</h3>
        <ul>
            <li>The student leave of absence form must be submitted before requests will be considered.</li>
            <li>The reason for the leave request must be clearly mentioned; additional proof to support the request must be attached.</li>
            <li>Parents can request a leave of absence only for unplanned and exceptional circumstances like illness, family medical emergencies, or bereavement.</li>
            <li>Planned absences, like family holidays or preventable travel, will not be authorised automatically. Approval is subject to the child’s academic progress and attendance history.</li>
            <li>Unauthorised absences will be marked for any leave taken without prior agreement from the school.</li>
            <li>For fairness in assessments, there will be no extensions or additional support provided for unapproved leave.</li>
        </ul>
        <form id="leaveRequestForm">
            <table>
                <tr>
                    <td>
                        <label for="studentName">Pupil Name</label>
                        <input type="text" id="studentName" name="studentName" style="width:300px;">
                    </td>
                    <td>
                        <label for="studentID">Class</label>
                        <input type="text" id="studentID" name="studentID" style="width:200px;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="leaveReason">Reason for request:</label>
                        <textarea id="leaveReason" name="leaveReason" rows="4" style="width: 200px;"></textarea>
                    </td>
                    <td>
                        <table class="table" style="width:100%">
                            <tr>
                                <th class="th">No. of days requested</th>
                                <td class="td" contenteditable="true" style="width: 300px;"></td>
                            </tr>
                            <tr>
                                <th class="th">Start Date</th>
                                <td class="td" contenteditable="true" style="width: 300px;"></td>
                            </tr>
                            <tr>
                                <th class="th">End Date</th>
                                <td class="td" contenteditable="true" style="width: 300px;"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <table class="table" style="width:100%">
                            <tr>
                                <td>
                                    <label for="parentName" Class="label_text">Name of the Parent:</label>
                                    <input type="text" class="input" id="parentName" name="parentName">
                                </td>
                                <td>
                                    <label for="signature" Class="label_text">Signature:</label>
                                    <input type="text" class="input" id="signature" name="signature">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label for="phone" Class="label_text">Phone:</label>
                                    <input type="text" class="input" id="phone" name="phone">
                                </td>
                                <td>
                                    <label for="email" Class="label_text">Email:</label>
                                    <input type="text" class="input" id="email" name="email">
                                </td>
                                <td>
                                    <label for="date" Class="label_text">Date:</label>
                                    <input type="text" class="input" id="date" name="date">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="checkbox" id="confirm" name="confirm" class="check_box_label">
                                    <label for="confirm">I confirm that the information on this form is true.</label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">
                                    <input type="checkbox" id="attendance" name="attendance"  class="check_box_label">
                                    <label for="attendance">I understand that reduced attendance may affect re-registration.</label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
     
    <h3>FOR SCHOOL OFFICE USE ONLY</h3>
    <div>Pupil’s attendance record for this academic year so far: </div>
    </br>
        <table class="table">
             <tr>
                                <td class="th" style="width: 200px;">Authorized absences till date:</td>
                                <td class="td" contenteditable="true" style="width: 150px;"></td>
                                <td class="th" style="width: 200px;">Unauthorized absences till date:</td>
                <td contenteditable="true" style="width: 150px;"></td>
                            </tr>
          
        </table>
       
        </br>
        <table class="table">
            <tr>              
                <td class="th" style="width: 150px;" contenteditable="true"><b>This Request:</b></td>
                <td class="th" style="width: 200px;"><b>Approved: </b><input type="checkbox" id="approve" name="approve"> </td>
                  <td class="th" style="width: 200px;"><b>DisApproved:</b> <input type="checkbox" id="disapprove" name="disapprove"> </td>
                  
                <td class="td" style="width: 200px;" contenteditable="true"><b>Reason for Disapproval:</b></td>
            </tr>
            
            <tr>
                
                <td class="hide-column" style="width: 150px;" contenteditable="true"><b> Head of School:</b></td>
                
                 
                <td class="hide-column" style="width: 150px;" contenteditable="true"><b>Date:</b></td>
            </tr>
          
            <tr>
                <td class="hide-column" style="width: 150px;" contenteditable="true"><b>Principal:</b></td>
                
               
                <td class="hide-column"style="width: 150px;" contenteditable="true"><b>Date:</b></td>
            </tr>
        </table>
           </form>
    </div>
</body>
</html>
