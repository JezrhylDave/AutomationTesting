<?php
$conn = new mysqli("localhost", "root", "", "user_demo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $user = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET username='$username', email='$email' WHERE id=$id");
    header("Location: users.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <h1>Edit User</h1>
    <form action="edit.php?id=<?= $id ?>" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required><br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required><br>
        <button type="submit">Save Changes</button>
    </form>
</body>
</html>