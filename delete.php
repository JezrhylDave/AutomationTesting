<?php
$conn = new mysqli("localhost", "root", "", "user_demo");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM users WHERE id=$id");
}

header("Location: users.php");
?>