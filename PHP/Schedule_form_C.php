<?php

// Composer autoload file link (if using Composer for PHPMailer)
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Database connection parameters
$host = 'localhost';
$db = 'slearn';
$user = 'root';
$pass = '';

// Create a MySQLi connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check the connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Fetch schedule times
$schedules = [];
$schedule_query = "SELECT id, time_slot FROM schedule";
if ($schedule_result = $mysqli->query($schedule_query)) {
    while ($row = $schedule_result->fetch_assoc()) {
        $schedules[] = $row;
    }
    $schedule_result->free();
}

// Handle form submission
$form_status = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $schedule_time = $_POST['schedule_time'];
    $date = $_POST['date'];
    $instructor = $_POST['instructor'];

    // Insert booking into database
    $insert_query = "INSERT INTO schedule_bookings (student_id, student_name, email, gender, schedule_time, date, instructor)
                     VALUES (?, ?, ?, ?, ?, ?, ?)";

    if ($stmt = $mysqli->prepare($insert_query)) {
        $stmt->bind_param('ssssisi', $student_id, $student_name, $email, $gender, $schedule_time, $date, $instructor);
        if ($stmt->execute()) {
            // Send confirmation email using PHPMailer
            $mail = new PHPMailer(true); // Passing true enables exceptions

            try {
                // SMTP configuration
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;           // Enable SMTP authentication
                $mail->Username = 'slearndschool@gmail.com'; // SMTP username
                $mail->Password = 'vtby xugc wndz yfuu'; // SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                $mail->Port = 587; // TCP port to connect to

                // Sender and recipient
                $mail->setFrom('no-reply@example.com', 'SLearn');
                $mail->addAddress($email, $student_name); // Add a recipient

                // Email content
                $mail->isHTML(false); // Set email format to plain text
                $mail->Subject = 'Booking Confirmation';
                $mail->Body    = "Dear $student_name,\n\nYour booking has been confirmed.\n\nDetails:\nStudent ID: $student_id\nSchedule Time: $schedule_time\nDate: $date\nInstructor: $instructor\n\nThank you!";

                $mail->send();
                $form_status = 'Booking successful and email sent!';
            } catch (Exception $e) {
                $form_status = "Booking successful but email sending failed. Error: {$mail->ErrorInfo}";
            }
        } else {
            $form_status = "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        $form_status = "Error: " . $mysqli->error;
    }
}

// Handle AJAX request for fetching instructors
if (isset($_GET['action']) && $_GET['action'] === 'fetch_instructors') {
    $gender = $_GET['gender'];
    $instructors = [];
    $instructor_query = "SELECT id, name FROM instructors WHERE gender = ?";
    if ($stmt = $mysqli->prepare($instructor_query)) {
        $stmt->bind_param('s', $gender);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $instructors[] = $row;
        }
        $stmt->close();
    }
    echo json_encode($instructors);
    exit;
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Schedule Booking Form</title>
    <link rel="stylesheet" href="../css/Body/schedule_booking.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const genderSelect = document.getElementById('gender');
            const instructorSelect = document.getElementById('instructor');

            function fetchInstructors() {
                const gender = genderSelect.value;
                instructorSelect.innerHTML = '<option>Loading...</option>';

                fetch(`?action=fetch_instructors&gender=${gender}`)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        instructorSelect.innerHTML = '';
                        if (data.length === 0) {
                            instructorSelect.innerHTML = '<option>No instructors available</option>';
                        } else {
                            data.forEach(instructor => {
                                const option = document.createElement('option');
                                option.value = instructor.id;
                                option.textContent = instructor.name;
                                instructorSelect.appendChild(option);
                            });
                        }
                    })
                    .catch(error => {
                        console.error('Fetch operation error:', error);
                        instructorSelect.innerHTML = '<option>Error fetching instructors</option>';
                    });
            }

            genderSelect.addEventListener('change', fetchInstructors);
            document.getElementById('clearBtn').addEventListener('click', () => {
                document.getElementById('bookingForm').reset();
            });

            // Initial fetch based on the default gender
            fetchInstructors();
        });
    </script>
</head>

<body>
    <div class="container">
        <form id="bookingForm" method="post" action="">
            <h2>Schedule Booking Form</h2>

            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" required>

            <label for="student_name">Student Name:</label>
            <input type="text" id="student_name" name="student_name" required>

            <label for="email">Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="schedule_time">Schedule Booking Time:</label>
            <select id="schedule_time" name="schedule_time" required>
                <?php foreach ($schedules as $schedule) : ?>
                    <option value="<?= $schedule['id']; ?>"><?= $schedule['time_slot']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="date">Select Date:</label>
            <input type="date" id="date" name="date" min="<?= date('Y-m-d'); ?>" required>

            <label for="instructor">Choose Instructor:</label>
            <select id="instructor" name="instructor" required>
                <!-- Options will be populated based on the gender -->
            </select>

            <div class="form-actions">
                <button type="button" id="clearBtn">Clear</button>
                <button type="submit">Submit</button>
            </div>

            <?php if ($form_status) : ?>
                <p class="status"><?= $form_status; ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>

</html>