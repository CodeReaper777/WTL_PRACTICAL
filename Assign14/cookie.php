<?php
// Handle cookie set or delete
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    setcookie("user", "", time() - 3600); // Expire the cookie
    header("Location: cookie.php");
    exit;
} else {
    setcookie("user", "Yeahcookieset", time() + (86400 * 7)); // Set cookie for 7 days
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cookie Demo</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #eef; }
        .msg { background: #fff; padding: 20px; border-radius: 10px; box-shadow: 0 2px 5px rgba(0,0,0,0.2); }
        button { margin-top: 15px; padding: 10px 15px; background: #f44336; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #d32f2f; }
    </style>
</head>
<body>

<h2>Cookie Example</h2>

<div class="msg">
    <?php
    if (isset($_COOKIE["user"])) {
        echo "Welcome back, " . $_COOKIE["user"];
    } else {
        echo "Cookie is not set. Reload the page.";
    }
    ?>
</div>

<form method="get">
    <button type="submit" name="action" value="delete">Delete Cookie</button>
</form>

</body>
</html>
