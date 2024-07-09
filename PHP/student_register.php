<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "slearn";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate the next student ID in the format s001, s002, etc.
function generateStudentID($conn)
{
    $result = $conn->query("SELECT student_id FROM students ORDER BY student_id DESC LIMIT 1");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $last_id = $row['student_id'];
        $numeric_part = (int)substr($last_id, 1);
        $new_id = 'S' . str_pad($numeric_part + 1, 3, '0', STR_PAD_LEFT);
    } else {
        $new_id = 'S001';
    }
    return $new_id;
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_name = $_POST['student_name'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // Password validation
    if ($password !== $re_password) {
        echo "Passwords do not match.";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Generate new student ID
        $student_id = generateStudentID($conn);

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO students (student_id, student_name, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $student_id, $student_name, $hashed_password);

        if ($stmt->execute()) {
            echo "Registration successful. Your student ID is " . $student_id;
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
