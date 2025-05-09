<?php
header('Content-Type: application/json');

$host = 'localhost';
$user = 'myuser';
$pass = 'mypassword';
$db   = 'mydb';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit();
}

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        // GET all students
        $result = $conn->query("SELECT * FROM students");
        $students = [];
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
        echo json_encode($students);
        break;

    case 'POST':
        // Insert a new student
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['name']) || !isset($data['department'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing fields"]);
            break;
        }

        $stmt = $conn->prepare("INSERT INTO students (name, department) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['name'], $data['department']);
        $stmt->execute();
        echo json_encode(["message" => "Student inserted", "id" => $stmt->insert_id]);
        $stmt->close();
        break;

    case 'PUT':
        // Update student
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id']) || !isset($data['name']) || !isset($data['department'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing fields"]);
            break;
        }

        $stmt = $conn->prepare("UPDATE students SET name=?, department=? WHERE id=?");
        $stmt->bind_param("ssi", $data['name'], $data['department'], $data['id']);
        $stmt->execute();
        echo json_encode(["message" => "Student updated"]);
        $stmt->close();
        break;

    case 'DELETE':
        // Delete student
        $data = json_decode(file_get_contents("php://input"), true);
        if (!isset($data['id'])) {
            http_response_code(400);
            echo json_encode(["error" => "Missing ID"]);
            break;
        }

        $stmt = $conn->prepare("DELETE FROM students WHERE id=?");
        $stmt->bind_param("i", $data['id']);
        $stmt->execute();
        echo json_encode(["message" => "Student deleted"]);
        $stmt->close();
        break;

    default:
        http_response_code(405);
        echo json_encode(["error" => "Method not allowed"]);
        break;
}

$conn->close();
?>