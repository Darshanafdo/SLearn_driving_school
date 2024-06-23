<?php
include 'db.php';
include '../pages/instructor.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    $sql = "UPDATE instructors SET 
                name = :name, 
                nic = :nic, 
                gender = :gender, 
                phone = :phone, 
                email = :email 
            WHERE id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':nic', $nic);
    $stmt->bindParam(':gender', $gender);
    $stmt->bindParam(':phone', $phone);
    $stmt->bindParam(':email', $email);

    if ($stmt->execute()) {
        echo "Instructor updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->errorInfo();
    }
}
