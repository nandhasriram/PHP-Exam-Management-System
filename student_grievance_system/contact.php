<?php
// To handle form submission
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $error = 'Please fill in all fields!';
    } else {
        // Here you can implement email functionality or store the contact query in the database
        $success = 'Thank you for contacting us! We will get back to you soon.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <h1>Contact Us</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="about.php">About Us</a>
            <a href="auth/login.php">Login</a>
            <a href="auth/register.php">Register</a>
        </nav>
    </header>

    <main>
        <h2>We're here to help!</h2>
        <p>If you have any questions, feel free to contact us by filling out the form below.</p>

        <form action="contact.php" method="post">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <textarea name="message" placeholder="Your Message" required></textarea>
            <button type="submit">Send Message</button>
        </form>

        <!-- Display success or error messages -->
        <p style="color:red;"><?php echo $error; ?></p>
        <p style="color:green;"><?php echo $success; ?></p>
    </main>

    <footer>
        <p>&copy; 2024 Student Grievance System</p>
    </footer>
</body>
</html>
