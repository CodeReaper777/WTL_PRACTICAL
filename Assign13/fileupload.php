<?php
header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filename = basename($_FILES['file']['name']);
        $targetFile = $uploadDir . $filename;

        if (move_uploaded_file($_FILES['file']['tmp_name'], $targetFile)) {
            echo json_encode([
                "message" => "File uploaded successfully",
                "filename" => $filename
            ]);
        } else {
            echo json_encode(["error" => "Failed to upload file"]);
        }
    } else {
        echo json_encode(["error" => "No file uploaded or upload error occurred"]);
    }
} else {
    http_response_code(405);
    echo json_encode(["error" => "Only POST allowed"]);
}
?>
