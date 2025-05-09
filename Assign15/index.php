<?php
// Connect to MySQL
$host = "localhost";
$user = "root";
$pass = "";
$db = "Demo"; // Change to your database
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

// INSERT
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("INSERT INTO users (name, email) VALUES ('$name', '$email')");
}

// DELETE
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE id=$id");
}

// UPDATE
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $conn->query("UPDATE users SET name='$name', email='$email' WHERE id=$id");
}

// FETCH for Edit
$edit_user = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
    $edit_user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>PHP CRUD</title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f9f9f9; }
        form { margin-bottom: 20px; }
        input[type=text], input[type=email] {
            padding: 8px; width: 200px; margin-right: 10px;
        }
        button { padding: 8px 12px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        .actions a { margin-right: 10px; }
    </style>
</head>
<body>
    <h2>Simple PHP CRUD</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $edit_user['id'] ?? '' ?>">
        <input type="text" name="name" placeholder="Name" value="<?= $edit_user['name'] ?? '' ?>" required>
        <input type="email" name="email" placeholder="Email" value="<?= $edit_user['email'] ?? '' ?>" required>
        <button type="submit" name="update">Update</button>
        <button type="submit" name="add">Add</button>
    </form>

    <table>
        <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Actions</th></tr></thead>
        <tbody>
            <?php
            $res = $conn->query("SELECT * FROM users ORDER BY id DESC");
            while ($row = $res->fetch_assoc()):
            ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td class="actions">
                    <a href="?edit=<?= $row['id'] ?>">Edit</a>
                    <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
