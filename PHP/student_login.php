<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "slearn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if student_name and password
    if (isset($_POST['student_name']) && isset($_POST['password'])) {
        $student_name = $_POST['student_name'];
        $password = $_POST['password'];

        // Fetch the student
        $stmt = $conn->prepare("SELECT student_id, password FROM students WHERE student_name = ?");
        $stmt->bind_param("s", $student_name);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($student_id, $hashed_password);

        if ($stmt->num_rows > 0) {
            $stmt->fetch();
            if (password_verify($password, $hashed_password)) {
                // Password is correct, start a session
                $_SESSION['student_id'] = $student_id;
                $_SESSION['student_name'] = $student_name;
                header("Location: ./Schedule_form_C.php");
                exit();
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No student found with that name.";
        }

        $stmt->close();
    } else {
        echo "Please fill in both the student name and password.";
    }
}

$conn->close();
