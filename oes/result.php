<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oes";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['studentUsername']);

    $sql = "SELECT full_name FROM registered_students WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        $fullName = $student['full_name'];

        $sql = "SELECT exam_type, subject, score FROM results WHERE student_username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $response = ['name' => $fullName, 'exams' => []];
            while ($row = $result->fetch_assoc()) {
                $response['exams'][] = [
                    'type' => $row['exam_type'],
                    'score' => $row['score']
                ];
            }
            echo json_encode($response);
        } else {
            echo json_encode(['message' => 'No results found for the given username']);
        }
    } else {
        echo json_encode(['message' => 'Student not found']);
    }
}

$conn->close();
?>
