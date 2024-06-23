<?php
include 'db.php';
include '../pages/instructor.html';

$sql = "SELECT * FROM instructors";
$stmt = $conn->prepare($sql);
$stmt->execute();

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($results);
