<?php
include 'config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            header('Location: index.php');
            exit();
        } else {
            echo '<div class="alert alert-danger">Invalid password.</div>';
        }
    } else {
        echo '<div class="alert alert-danger">No user found with that username.</div>';
    }
}
?>

<div class="container">
    <h1>Login</h1>
    <form method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>

    <!-- Add Register Button -->
    <div class="mt-3">
        <p>Don't have an account? <a href="register.php" class="btn btn-secondary">Register</a></p>
    </div>
</div>
