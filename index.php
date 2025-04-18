<!DOCTYPE html>
<html>
<head>
    <title>Add User</title>
</head>
<body>
    <h1>Add New User</h1>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">
            <?= htmlspecialchars($_GET['error']) ?>
        </p>
    <?php endif; ?>

    <form action="process.php" method="POST">
        <input type="text" name="username" required placeholder="Username">
        <input type="email" name="email" required placeholder="Email">
        <button type="submit">Add User</button>
    </form>
    
    <br>
    
    <form action ="http://localhost/robot-demo/users.php">
        <button type="submit"> See All Users </button>
    </form>

    
</body>
</html>