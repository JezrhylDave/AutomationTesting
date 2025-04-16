<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_demo";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$user = $_POST['username'];
$email = $_POST['email'];

// Check for duplicate email or username
$checkSql = "SELECT * FROM users WHERE email = '$email' OR username = '$user'";
$result = $conn->query($checkSql);

if ($result->num_rows > 0) {
    // Duplicate found
    header("Location: index.php?error=Username or Email already exists");
    exit();
}

$sql = "INSERT INTO users (username, email) VALUES ('$user', '$email')";

if ($conn->query($sql) === TRUE) {
  header("Location: success.html");
  exit();
} else {
  header("Location: index.php?error=Something went wrong. Please try again.");
  exit();
}

$conn->close();
?>