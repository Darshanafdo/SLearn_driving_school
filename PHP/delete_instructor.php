<?php
include 'db.php';
include '../pages/instructor.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    $sql = "DELETE FROM instructors WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Instructor deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->errorInfo();
    }
}
