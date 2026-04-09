<?php
// Include the database connection
require_once '../config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $contact = $_POST['contact'];
    $department = $_POST['department'];
    $status = $_POST['status'];  // Set status based on user input
    $role = $_POST['role'];      // Set role based on user input
    $created_at = date('Y-m-d H:i:s'); // Capture the current timestamp

    // Check if the email is already registered
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    if ($stmt->rowCount() > 0) {
        $error = "Email is already registered!";
    } else {
        // Insert new student into the database with created_at timestamp
        $sql = "INSERT INTO users (name, email, password, role, contact, department, status, created_at) 
                VALUES (:name, :email, :password, :role, :contact, :department, :status, :created_at)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'role' => $role,
            'contact' => $contact,
            'department' => $department,
            'status' => $status,
            'created_at' => $created_at
        ]);
        $success = "Registration successful! You can now login.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        /* General styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        input[type="text"], 
        input[type="email"], 
        input[type="password"], 
        select {
            width: calc(100% - 22px); /* Ensure consistent padding */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 15px;
        }

        button:hover {
            background-color: #218838;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        p[style="color:red;"], 
        p[style="color:green;"] {
            text-align: center;
            margin: 10px 0;
        }

        label {
            display: block;
            margin: 5px 0;
            font-weight: bold;
            color: #333;
        }

        /* Mobile responsiveness */
        @media (max-width: 480px) {
            form {
                padding: 15px;
            }

            input[type="text"], 
            input[type="email"], 
            input[type="password"], 
            select, 
            button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Student Registration</h2>
    <form action="register.php" method="post">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="text" name="contact" placeholder="Contact" required>
        <input type="text" name="department" placeholder="Department" required>

        <!-- Role Dropdown -->
        <label for="role">Role:</label>
        <select name="role" id="role" required>
            <option value="student">Student</option>
            <option value="admin">Admin</option>
            <option value="committee">Committee</option>
        </select>

        <!-- Status Dropdown -->
        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="active">Active</option>
            <option value="inactive">Inactive</option>
        </select>

        <button type="submit">Register</button>
        <p style="color:red;"><?php echo $error; ?></p>
        <p style="color:green;"><?php echo $success; ?></p>
    </form>

    <!-- Login button section -->
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
