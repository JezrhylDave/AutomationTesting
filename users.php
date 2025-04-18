<?php
$conn = new mysqli("localhost", "root", "", "user_demo");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        table { border-collapse: collapse; width: 60%; margin: 20px auto; }
        th, td { border: 1px solid #333; padding: 8px; text-align: center; }
        th { background-color: #eee; }
        .button { padding: 5px 10px; text-decoration: none; color: white; background-color:rgb(74, 151, 252); border-radius: 4px; }
        .delete-button { background-color: #f44336; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">All Registered Users</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= htmlspecialchars($row['id']) ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="button">Edit</a>
                <a href="delete.php?id=<?= $row['id'] ?>" class="button delete-button" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>