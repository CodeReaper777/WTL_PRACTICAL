<?php
$uploadSuccess = false;
$errorMsg = '';
$uploadedFileInfo = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmp = $_FILES['file']['tmp_name'];
        $fileName = basename($_FILES['file']['name']);
        $fileSize = $_FILES['file']['size'];
        $fileType = mime_content_type($fileTmp);
        $uploadDir = __DIR__ . '/uploads/';
        $uploadPath = $uploadDir . $fileName;

        // Make sure the uploads directory exists
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Validate file type (basic)
        $allowedTypes = ['image/', 'video/', 'application/pdf'];
        $validType = false;
        foreach ($allowedTypes as $type) {
            if (strpos($fileType, $type) === 0) {
                $validType = true;
                break;
            }
        }

        if ($validType) {
            if (move_uploaded_file($fileTmp, $uploadPath)) {
                $uploadSuccess = true;
                $uploadedFileInfo = [
                    'name' => $fileName,
                    'type' => $fileType,
                    'size' => round($fileSize / 1024, 2),
                    'path' => 'uploads/' . $fileName
                ];
            } else {
                $errorMsg = "Failed to move uploaded file.";
            }
        } else {
            $errorMsg = "Invalid file type.";
        }
    } else {
        $errorMsg = "No file uploaded or there was an upload error.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload System</title>
    <style>
        /* [same CSS as you provided] */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f9;
        }
        .container {
            max-width: 600px;
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
        input[type="file"] {
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
        .preview {
            margin-top: 20px;
            text-align: center;
        }
        .preview img, .preview video, .preview iframe {
            max-width: 100%;
            max-height: 300px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .file-info {
            margin-top: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 4px;
        }
        .error {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>File Upload System</h1>

        <?php if ($errorMsg): ?>
            <p class="error"><?= htmlspecialchars($errorMsg) ?></p>
        <?php endif; ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="file">Choose File:</label>
                <input type="file" id="file" name="file" accept="image/*, video/*, .pdf" required>
            </div>
            <button type="submit">Upload File</button>
        </form>

        <div class="preview" id="preview">
            <?php if ($uploadSuccess && $uploadedFileInfo): ?>
                <?php if (strpos($uploadedFileInfo['type'], 'image/') === 0): ?>
                    <img src="<?= $uploadedFileInfo['path'] ?>" alt="Preview">
                <?php elseif (strpos($uploadedFileInfo['type'], 'video/') === 0): ?>
                    <video controls><source src="<?= $uploadedFileInfo['path'] ?>" type="<?= $uploadedFileInfo['type'] ?>"></video>
                <?php elseif ($uploadedFileInfo['type'] === 'application/pdf'): ?>
                    <iframe src="<?= $uploadedFileInfo['path'] ?>" width="100%" height="300px"></iframe>
                <?php else: ?>
                    <p>Preview not available for this file type</p>
                <?php endif; ?>

                <div class="file-info">
                    <p><strong>File Name:</strong> <?= htmlspecialchars($uploadedFileInfo['name']) ?></p>
                    <p><strong>File Type:</strong> <?= htmlspecialchars($uploadedFileInfo['type']) ?></p>
                    <p><strong>File Size:</strong> <?= $uploadedFileInfo['size'] ?> KB</p>
                </div>
            <?php else: ?>
                <p>No file selected</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
