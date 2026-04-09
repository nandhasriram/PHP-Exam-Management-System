<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>School Bus Registration & Rules</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }

        .container {
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
            text-align: center;
        }

        .photo-label {
            text-align: center;
            font-size: 14px;
            margin-top: 5px;
        }

        h1, h3 {
            text-align: center;
            text-transform: uppercase;
            margin: 20px 0;
        }

        h1 {
            font-size: 24px;
        }

        h3 {
            font-size: 18px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            margin-top: 20px;
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

        .rules {
            font-size: 14px;
            line-height: 1.8;
            margin-top: 20px;
        }

        .rules ol {
            padding-left: 20px;
        }

        .rules ol li {
            margin-bottom: 10px;
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

        .photo-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .signature-section {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .signature-box {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }

        .signature-box div {
            margin-top: 60px;
            border-top: 1px solid #000;
            width: 150px;
            margin-left: auto;
            margin-right: auto;
        }
        .center-text {
        text-align: center;
    }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header Section -->
        <header>
            <div class="header-left">
                <img src="school-logo.png" alt="School Logo" class="logo">
                <h1>S.S.P. Shikshan Sanstha</h1>
                <p class="center-text">(Linguistic Minority Institute)</p>
                <h2>Ganesh International School & Sr. Secondary, Chikhali – Pune 62</h2>
                <p class="center-text">CBSE Affiliation No: 1130632 | UDISE No: 27252001510</p>
            </div>
            <div class="photo-placeholder">Student Photo</div>
        </header>

        <!-- Registration Form Section -->
        <h1>Bus Application Form</h1>
    <form action="insert_bus.php" method="POST">
        <label for="name">Name of the Student:</label>
        <input type="text" id="name" name="name" required>

        <label for="admission_no">Admission No:</label>
        <input type="text" id="admission_no" name="admission_no" class="half-width" required>

        <label for="section">Class-Section:</label>
        <input type="text" id="section" name="section" class="half-width" required>

        <label for="roll_no">Roll No:</label>
        <input type="text" id="roll_no" name="roll_no" class="half-width" required>

        <label for="session">Session:</label>
        <input type="text" id="session" name="session" class="half-width" required>

        <label for="address">Residential Address:</label>
        <textarea id="address" name="address" rows="3" required></textarea>

        <label for="father_name">Father's Name:</label>
        <input type="text" id="father_name" name="father_name" class="half-width" required>

        <label for="mother_name">Mother's Name:</label>
        <input type="text" id="mother_name" name="mother_name" class="half-width" required>

        <label for="father_no">Father's No:</label>
        <input type="text" id="father_no" name="father_no" class="half-width" required>

        <label for="mother_no">Mother's No:</label>
        <input type="text" id="mother_no" name="mother_no" class="half-width" required>

        <label for="guardian_name">Guardian Name (if applicable):</label>
        <input type="text" id="guardian_name" name="guardian_name">

        <label for="guardian_no">Guardian Contact No (if applicable):</label>
        <input type="text" id="guardian_no" name="guardian_no">

        <label for="pickup_point">Pick-up Point:</label>
        <input type="text" id="pickup_point" name="pickup_point" required>

        <label for="drop_point">Drop Point:</label>
        <input type="text" id="drop_point" name="drop_point" required>

        <label for="area">Area (As per list):</label>
        <input type="text" id="area" name="area" required>

        <label for="bus_rout_no">Bus Route No:</label>
        <input type="text" id="bus_rout_no" name="bus_rout_no" required>

        <label for="bus_incharge">Bus-In Charge:</label>
        <input type="text" id="bus_incharge" name="bus_incharge" required>

        <div class="button-row">
            <button type="submit">Submit Application</button>
            <button type="button" onclick="window.location.href='dashboard.php';">Back</button>
        </div>
    </form>

        <!-- Photo Section -->
        <div class="photo-row">
            <div>
                <div class="photo-placeholder">Father Photo</div>
                <div class="photo-label">Father Photo</div>
            </div>
            <div>
                <div class="photo-placeholder">Mother Photo</div>
                <div class="photo-label">Mother Photo</div>
            </div>
            <div>
                <div class="photo-placeholder">Guardian 1</div>
                <div class="photo-label">Guardian 1</div>
            </div>
            <div>
                <div class="photo-placeholder">Guardian 2</div>
                <div class="photo-label">Guardian 2</div>
            </div>
            <div>
                <div class="photo-placeholder">Guardian 3</div>
                <div class="photo-label">Guardian 3</div>
            </div>
        </div>

        <!-- Bus Rules Section -->
        <h3>Bus Rules</h3>
        <div class="rules">
            <ol>
                <li>Parents are requested not to board school buses to see off or receive their wards.</li>
                <li>Parents should not try to overtake and stop the School bus to facilitate the boarding of their wards as this endangers the safety of the bus and its occupants. This act will lead to strict disciplinary action.</li>
                <li>Parents should not argue with the teachers present in the bus or the conductor/driver. If there is any problem, a written communication should be forwarded to the Administrative office.</li>
                <li>Under no circumstances are students allowed to go behind or under the parked buses within the school campus. Students are also not allowed to sit in the parked buses during school hours.</li>
                <li>Under no circumstances, should students touch the instrument panel of the buses.</li>
                <li>A student using the school bus is expected to be at the bus stop at least ten minutes before the scheduled arrival of the bus. The student has to be on the correct side of the arriving bus. The scheduled pick-up time is available with the Transport-in-charge at the school. The school reserves the right to alter the timings, routes, and stops as and when necessary.</li>
                <li>If any parent whose child is availing school transport service wishes to take their ward privately in his/her transport, he/she has to collect the Permission Slip from the school authorities half an hour before the end of the last class.</li>
                <li>Students are allowed to use only the allotted bus and bus stop. No change can be allowed without prior written permission of the school.</li>
                <li>If a student misses their allotted bus, they should not try to board any other bus. It is the responsibility of the parents to drop off their wards to the school. However, the student will return by the allotted bus.</li>
                <li>The school will not be held responsible for any lapse in the bus services. In case of any discrepancy, parents may meet the Transport-in-charge.</li>
                <li>The buses will not wait for latecomers.</li>
                <li>Students should stay away from the main road until the bus arrives.</li>
                <li>No student should come near the entry door of the bus until it comes to a complete halt. The front door of the bus is the only authorized entrance and exit.</li>
                <li>Boarding and alighting from buses should be done in silence and in an orderly manner.</li>
                <li>All students must occupy vacant seats immediately after boarding their respective buses. Reservation of seats for co-commuters is not allowed under any circumstances.</li>
                <li>No student should travel standing on the footboard.</li>
                <li>Students must not move around in the bus when it is in motion.</li>
                <li>The students must make sure that the aisle of the bus is clear, school bags, and other belongings are placed properly.</li>
                <li>Students must not put any part of their body outside the bus. They should not put their hands out even for waving.</li>
                <li>No object should be discarded inside or thrown outside the bus.</li>
                <li>Consumption of edibles is not permitted in the buses.</li>
                <li>Unruly behavior like shrieking, shouting, and playing foul is strictly prohibited. Courteous behavior is expected at all times.</li>
                <li>The driver’s attention must not be distracted for any reason.</li>
                <li>The drivers are authorized to stop buses at the designated stops only. The list of stops is prepared keeping in view the convenience and safety of all bus commuters and is always subject to change.</li>
                <li>The bus monitor on duty is responsible for maintaining discipline in the buses. Any serious offense must be reported to the Co-ordinator immediately.</li>
                <li>In case of any change, of a temporary or permanent nature, in transport pick-up/drop point or transport route, the permission for the same has to be sought by making an application to the Transport department at the School office. In case of permanent change of transport route, the application must be filed along with administrative charges of Rs. 50/- (Rupees Fifty only) at the School Office.</li>
                <li>Parents have to ensure that their wards do not go to and from bus stops unescorted.</li>
                <li>Parents (or whoever is authorized by the parents) have to produce the Escort Card at the bus stop to receive their wards from the respective bus drop points failing which the student will be brought back to the school and will be handed over only on the production of the escort card.</li>
                <li>The Monthly Transport service charges for the scheduled route/routes will be as per notification. Fees will be charged for all 12 months. A parent, who withdraws the transport facility before the vacations and rejoins after the vacations, may not be given the transport service facility. The amount is payable along with the school fees.</li>
                <li>Bus services will be discontinued without further notice for children who do not follow bus rules, damage accessories in the bus, offend passers-by with their actions or words.</li>
                <li>If any student is reported to be throwing objects outside from the school bus, strict disciplinary action will be taken against him/her.</li>
                <li>No withdrawal would be considered without prior written one month clear intimation.</li>
            </ol>
        </div>
        
        <!-- Signature Section -->
        <div class="signature-section">
            <div class="signature-box">
                <div>Parent's Signature</div>
            </div>
            <div class="signature-box">
                <div>Class Teacher Signature</div>
            </div>
        </div>
    </div>
</body>
</html>
