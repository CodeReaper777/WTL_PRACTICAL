<?php
// Check if the request is GET or POST
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : '';
    $email = isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '';
    $method = "GET";
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
    $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
    $method = "POST";
} else {
    die("Invalid request method.");
}

// Display the received data
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Submission Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .result-container {
            max-width: 500px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            color: #4CAF50;
            text-align: center;
        }
        .data-item {
            margin-bottom: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-left: 4px solid #4CAF50;
        }
        .method {
            font-weight: bold;
            color: #4CAF50;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #4CAF50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="result-container">
        <h1>Form Submission Successful!</h1>
        <div class="data-item">
            <strong>Method Used:</strong> <span class="method"><?php echo $method; ?></span>
        </div>
        <div class="data-item">
            <strong>Name:</strong> <?php echo $name; ?>
        </div>
        <div class="data-item">
            <strong>Email:</strong> <?php echo $email; ?>
        </div>
        <a href="index.html">Go Back</a>
    </div>
</body>
</html>