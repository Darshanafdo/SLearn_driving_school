<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "slearn"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form inputs
    $name = $_POST['name'];
    $initials = $_POST['initials'];
    $nic = $_POST['nic'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $whatsapp = $_POST['whatsapp'] ?? '';
    $email = $_POST['email'];
    $vehicle = $_POST['vehicle'];
    $package = $_POST['package'];
    $price = $_POST['price'];
    $license = $_POST['license'];
    $privacy = isset($_POST['privacy']) ? 1 : 0;

    // Validate driving license issue date (must be at least 2 years old)
    $currentDate = new DateTime();
    $licenseDate = new DateTime($license);
    $interval = $currentDate->diff($licenseDate);
    $years = $interval->y;

    if ($years <= 2) {
        echo "Error: Driving license must be issued at least 2 years ago.";
        exit;
    }

    // Prepare SQL statement to insert data
    $stmt = $conn->prepare("INSERT INTO p_registrations (
        full_name, name_with_initials, nic, dob, gender, address,
        contact_number, whatsapp_number, email, vehicle_type,
        package, price, license_issue_date, agreed_privacy_policy
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param(
        "sssssssssssdsi",
        $name,
        $initials,
        $nic,
        $dob,
        $gender,
        $address,
        $contact,
        $whatsapp,
        $email,
        $vehicle,
        $package,
        $price,
        $license,
        $privacy
    );

    // Execute the statement
    if ($stmt->execute()) {
        echo "Form submitted and data inserted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
