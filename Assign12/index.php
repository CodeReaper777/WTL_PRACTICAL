<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET & POST Example</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .method-toggle {
            display: flex;
            margin-bottom: 15px;
        }
        .method-toggle button {
            flex: 1;
            margin: 0 5px;
            background-color: #ddd;
            color: black;
        }
        .method-toggle button.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Registration</h1>
        
        <div class="method-toggle">
            <button id="getBtn" class="active">Use GET</button>
            <button id="postBtn">Use POST</button>
        </div>

        <form id="userForm" action="acceptForm.php" method="GET">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script>
        const getBtn = document.getElementById('getBtn');
        const postBtn = document.getElementById('postBtn');
        const userForm = document.getElementById('userForm');

        getBtn.addEventListener('click', () => {
            userForm.method = 'GET';
            getBtn.classList.add('active');
            postBtn.classList.remove('active');
        });

        postBtn.addEventListener('click', () => {
            userForm.method = 'POST';
            postBtn.classList.add('active');
            getBtn.classList.remove('active');
        });
    </script>
</body>
</html>