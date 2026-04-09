<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Leave Application Form</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
      }
      .form-container,
      .container {
        max-width: 900px;
        margin: auto;
        background: #ffffff;
        padding: 20px;
        border-radius: 8px;
        margin-bottom: 20px;
      }
      table {
        width: 100%;
        border-collapse: collapse;
      }
      th,
      td {
        padding: 10px;
        text-align: left;
        border: 1px solid #ccc;
      }
      th {
        background-color: #f4f4f4;
        text-align: center;
      }
      input,
      select,
      textarea {
        width: 90%;
        padding: 8px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 4px;
      }
      textarea {
        resize: none;
      }
      .submit-btn {
        text-align: right;
        margin-top: 20px;
      }
      button {
        background-color: #007bff;
        color: #ffffff;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
      }
      button:hover {
        background-color: #0056b3;
      }
      .instructions {
        margin-top: 20px;
        font-size: 14px;
      }
    </style>
  </head>
  <body>
    <header style="text-align: center; margin-bottom: 20px">
      <img src="logo.png" width="100" height="50" alt="IISER" />
      <div style="text-align: center; padding: 6px">
        भारतीय विज्ञान शिक्षा एवं अनुसंधान संस्थान बरहमपुर<br />
        Indian Institute of Science Education and Research Berhampur<br />
        Established by the Ministry of Education, Govt. of India
      </div>
    </header>

    <div class="form-container">
      <h2 style="text-align: center; margin-bottom: 20px">
        Student Leave Application Form
      </h2>
      <form action="insert_leave.php" method="POST">
        <table>
          <tr>
            <td>Type of Leave*</td>
            <td colspan="3">
              <select name="type_of_leave" required>
                <option>Short Leave</option>
                <option>Medical Leave</option>
                <option>Casual Leave</option>
                <option>Vacation Leave</option>
                <option>Semester Leave</option>
              </select>
            </td>
          </tr>
          <tr>
            <td>Leave Availed Current Semester/Year</td>
            <td colspan="3">
              <input type="text" name="available_leave" />
            </td>
            <td>Available Leave Balance</td>
            <td colspan="3">
              <input type="text" name="balance_leave" />
            </td>
          </tr>
          <tr>
            <td>Name</td>
            <td colspan="3">
              <input type="text" name="name" required />
            </td>
            <td>Roll No.</td>
            <td colspan="3">
              <input type="text" name="roll_no" required />
            </td>
          </tr>
          <tr>
            <td>Programme</td>
            <td colspan="3">
              <input type="text" name="program" required />
            </td>
            <td>Department</td>
            <td>
              <input type="text" name="department" required />
            </td>
          </tr>
          <tr>
            <td>Hostel Address</td>
            <td colspan="3">
              <input type="text" name="hostel_address" required />
            </td>
            <td>Hall No</td>
            <td>
              <input type="text" name="hall_no" required />
            </td>
          </tr>
          <tr>
            <td>Leave Applied For</td>
            <td>No. of Days</td>
            <td>From</td>
            <td>
              <input type="date" name="days_from" required />
            </td>
            <td>To</td>
            <td>
              <input type="date" name="days_to" required />
            </td>
          </tr>
          <tr>
            <td>In case of Holiday</td>
            <td>Prefix Dates</td>
            <td colspan="2">
              <input type="date" name="prefix_date" placeholder="Enter prefix dates" />
            </td>
            <td>Suffix Dates</td>
            <td colspan="2">
              <input type="date" name="suffix_date" placeholder="Enter suffix dates" />
            </td>
          </tr>
          <tr>
            <td>Purpose of Leave</td>
            <td colspan="5">
              <textarea name="purpose_of_leave" rows="3"></textarea>
            </td>
          </tr>
          <tr>
            <td>Address During Leave</td>
            <td colspan="5">
              <textarea name="address" rows="2"></textarea>2
            </td>
          </tr>
          <tr>
            <td>Contact No.</td>
            <td colspan="5">
              <input type="text" name="contact_no" />
            </td>
          </tr>
          <tr>
            <td>Date</td>
            <td colspan="2">
              <input type="date" name="date" />
            </td>
          </tr>
        </table>
        <div style="text-align: right; margin-top: 20px">
          Student's Signature
        </div>
        <button type="submit">Submit Application</button>
        <button type="button" onclick="window.location.href='dashboard.php';">Back</button>
      </form>
    </div>

    <div class="container">
      <h1>Leave Policy</h1>
      <table>
        <thead>
          <tr>
            <th>S. No.</th>
            <th>Type of Leave</th>
            <th>Maximum Leave Duration</th>
            <th>Applicable for</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Short Leave</td>
            <td>Maximum 7 days/semester</td>
            <td>BS-MS students</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Medical Leave</td>
            <td>Maximum 15 days/semester (Medical Certificate required)</td>
            <td>All students</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Casual Leave</td>
            <td>Maximum 8 days/year (Not more than 5 days at one time)</td>
            <td>Integrated Ph.D. and Ph.D. students</td>
          </tr>
          <tr>
            <td>4</td>
            <td>Vacation Leave</td>
            <td>Maximum 15 days/semester</td>
            <td>Integrated Ph.D. and Ph.D. students</td>
          </tr>
          <tr>
            <td>5</td>
            <td>Leave Until Oral Examination</td>
            <td>No specific limit</td>
            <td>Integrated Ph.D. and Ph.D. students</td>
          </tr>
          <tr>
            <td>6</td>
            <td>Semester Leave</td>
            <td>Maximum 2 semesters for the entire course of study</td>
            <td>All students</td>
          </tr>
        </tbody>
      </table>
      <div class="instructions">
        <p>* Medical Certificate to be attached for medical leave.</p>
        <p>+ Casual leave will not be allowed for more than 5 days at one time.</p>
        <p>
          # Students will have to register every semester, with a registration
          charge of ₹5000 on the date specified by the Institute, while on leave
          until oral examination.
        </p>
        <p>
          Students will have to register and pay the full fee while on semester
          leave.
        </p>
      </div>
    </div>
  </body>
</html>
