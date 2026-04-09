<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Bus Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .form-container {
            max-width: 900px;
            margin: 20px auto;
            background: #fff;
            padding: 20px 40px;
            border: 1px solid #ddd;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header-left {
            text-align: left;
        }

        .header-left h1, .header-left h2, .header-left p {
            margin: 5px 0;
        }

        .logo {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .photo-placeholder {
            width: 100px;
            height: 120px;
            border: 1px solid #000;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            font-size: 14px;
        }

        h3 {
            text-align: center;
            text-transform: uppercase;
            margin: 20px 0;
            color: #333;
        }

        form {
            display: flex;
            flex-wrap: wrap;
        }

        label {
            flex: 0 0 100%;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"], textarea {
            flex: 0 0 100%;
            padding: 8px;
            font-size: 14px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        textarea {
            resize: none;
        }

        .half-width {
            flex: 0 0 48%;
            margin-right: 4%;
        }

        .half-width:last-child {
            margin-right: 0;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin: 20px 0 0;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <header>
            <div class="header-left">
                <img src="school-logo.png" alt="School Logo" class="logo">
                <h1>S.S.P. Shikshan Sanstha</h1>
                <p>(Linguistic Minority Institute)</p>
                <h2>Ganesh International School & Sr. Secondary, Chikhali – Pune 62</h2>
                <p>CBSE Affiliation No: 1130632 | UDISE No: 27252001510</p>
            </div>
            <div class="photo-placeholder">Photo</div>
        </header>
        <h3>SCHOOL BUS REGISTRATION FORM</h3>
        <form>
            <label for="student-name">Name of the Student:</label>
            <input type="text" id="student-name" name="student-name">

            <label for="admission-no">Admission No:</label>
            <input type="text" id="admission-no" name="admission-no" class="half-width">

            <label for="class-section">Class-Section:</label>
            <input type="text" id="class-section" name="class-section" class="half-width">

            <label for="roll-no">Roll No:</label>
            <input type="text" id="roll-no" name="roll-no" class="half-width">

            <label for="session">Session:</label>
            <input type="text" id="session" name="session" class="half-width">

            <label for="address">Residential Address:</label>
            <textarea id="address" name="address" rows="3"></textarea>

            <label for="father-name">Father's Name:</label>
            <input type="text" id="father-name" name="father-name" class="half-width">

            <label for="mother-name">Mother's Name:</label>
            <input type="text" id="mother-name" name="mother-name" class="half-width">

            <label for="guardian-name">Guardian Name (if applicable):</label>
            <input type="text" id="guardian-name" name="guardian-name">

            <label for="guardian-contact">Guardian Contact No:</label>
            <input type="text" id="guardian-contact" name="guardian-contact">

            <label for="pickup-point">Pick-up Point:</label>
            <input type="text" id="pickup-point" name="pickup-point">

            <label for="drop-point">Drop Point:</label>
            <input type="text" id="drop-point" name="drop-point">

            <label for="area">Area (As per list):</label>
            <input type="text" id="area" name="area">

            <label for="bus-route">Bus Route No:</label>
            <input type="text" id="bus-route" name="bus-route">

            <label for="bus-in-charge">Bus-In Charge:</label>
            <input type="text" id="bus-in-charge" name="bus-in-charge">

            
        </form>
    </div>
</body>
</html>
