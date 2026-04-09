<?php
// Include the database connection
require_once '../../config/db.php';

// Check if the form is submitted
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $department = $_POST['department'];
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    // Update query
    $sql = "UPDATE users SET name = ?, email = ?, role = ?, department = ?, contact = ?, status = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $role, $department, $contact, $status, $id]);

    header('Location: manage_users.php');
}

// Fetch user data to edit
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h1>Edit User</h1>
    <form action="edit_user.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required>

        <label for="role">Role:</label>
        <input type="text" name="role" value="<?php echo $user['role']; ?>" required>

        <label for="department">Department:</label>
        <input type="text" name="department" value="<?php echo $user['department']; ?>" required>

        <label for="contact">Contact:</label>
        <input type="text" name="contact" value="<?php echo $user['contact']; ?>" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo $user['status']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>
