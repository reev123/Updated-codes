<?php
include "connection.php";
// Retrieve form data using filter_input
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$confirmPassword = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$fullName = filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_STRING);

// Check if form is submitted
if ($username !== null && $password !== null && $confirmPassword !== null) {
    // Check if passwords match
    if ($password === $confirmPassword) {
        // Check if username or email already exists
        $sql = "SELECT * FROM registered_students WHERE username = ? OR email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('User already exists'); window.location.href='registration.html';</script>";
        } else {
            // Passwords match and user doesn't exist, proceed with insertion
            $sql = "INSERT INTO registered_students (username, password, email, full_name) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username, $password, $email, $fullName);
            if ($stmt->execute() === TRUE) {
                header("Location: getstarted.php");
                exit(); // Stop further execution
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "<script>alert('Passwords do not match'); window.location.href='registration.html';</script>";
    }
}

// Close connection
$conn->close();
?>
