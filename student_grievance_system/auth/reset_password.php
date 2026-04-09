<?php
// Include the database connection
require_once '../config/db.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Fetch the user by email
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // New random password
        $new_password = bin2hex(random_bytes(4)); // Generates a new random 8-character password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Update the password in the database
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['password' => $hashed_password, 'email' => $email]);

        // You can add an email function to send the new password to the user here (not implemented for simplicity)
        $success = "Your password has been reset. New password: $new_password";
    } else {
        $error = "No account found with that email!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h2>Reset Password</h2>
    <form action="reset_password.php" method="post">
        <input type="email" name="email" placeholder="Enter your registered email" required>
        <button type="submit">Reset Password</button>
        <p style="color:red;"><?php echo $error; ?></p>
        <p style="color:green;"><?php echo $success; ?></p>
    </form>
</body>
</html>
