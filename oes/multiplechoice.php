<?php
// Database connection
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "oes"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get question and answer from POST data
$question = $_POST['question'];
$answer = $_POST['answer'];
$correctAnswer = $_POST['correct_answer'];

// Prepare SQL statement to insert answer into the database
$sql = "INSERT INTO multiplechoice_exam (question, answer,correct_answer) VALUES ('$question', '$answer','$correctAnswer')";

if ($conn->query($sql) === TRUE) {
    echo "Answer stored successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
