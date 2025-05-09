<?php
session_start();
if (!isset($_SESSION["loggedin"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <style>
        body { font-family: Arial; background-color: #f0fff0; padding: 30px; }
        .card { background: white; padding: 20px; border-radius: 10px; width: 300px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin: auto; text-align: center; }
        a { text-decoration: none; color: #f00; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <h2>Welcome, <?php echo $_SESSION["username"]; ?>!</h2>
        <p>This is your dashboard.</p>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
