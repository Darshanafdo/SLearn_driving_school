<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];



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
                $mail->Password = ''; // SMTP password
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
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


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

    <!-- header eka  -->
    <header>
        <nav class="nav">

            <div class="logo"><a href="#"><img src="../Images/Main/logo.png"></a>
            </div>

            <ul class="nav-links">
                <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
                <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
                <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
                <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
                <li><a href="Schedule_login_form.html"><i class="uil uil-calendar-alt"></i> schedule</a></li>
                <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                                echo htmlspecialchars($username); ?></a></li>
                <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
            </ul>


            <div class="toggle_btn" id="toggleButton">
                <i class="fa-solid fa-bars" id="toggleIcon"></i>
            </div>
        </nav>
    </header>
    <br>

    <div class="dropdown_menu" id="dropdownMenu">
        <ul class="nav-links">
            <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
            <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
            <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
            <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
            <li><a href="Schedule_login_form.html"><i class="uil uil-calendar-alt"></i> schedule</a></li>
            <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                            echo htmlspecialchars($username); ?></a></li>
            <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
        </ul>

    </div>



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
                <option value="">Select Now</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="schedule_time">Schedule Booking Time:</label>
            <select id="schedule_time" name="schedule_time" required>
                <option value="">Select Now</option>
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
                <p style="text-align:center; color:green;"><?= $form_status; ?></p>
            <?php endif; ?>
        </form>
    </div>

    <!-- footer eka -->

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>SL<span>earn</span></h3>

            <p class="footer-links">
                <a href="home.html" class="link-1">Home</a>

                <a href="About_us.html"> About </a>

                <a href="contact_us.html"> Contact us </a>
            </p>

            <p class="footer-company-name"> SLearn © 2023 </p>
        </div>


        <div class="footer-center">

            <div>
                <i class="fa fa-map-marker"></i>
                <p><span> Sri Lanka College of Technology</span> Olcott Mawatha, Colombo - 10 </p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+947108528520</p>
            </div>

            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="mailto:support@company.com">SLearnschool@gamil.com</a></p>
            </div>

        </div>

        <div class="footer-right">

            <p class="footer-company-about">
                <span>About the company</span>
                Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit,
                eu auctor lacus
                vehicula sit amet.
            </p>

            <div class="footer-icons">

                <a href="#" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="#" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>

        </div>

    </footer>

    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior
            var userConfirmed = confirm("Are you sure you want to logout of this website?");
            if (userConfirmed) {
                // If the user confirms, proceed to the logout page
                window.location.href = 'logout.php';
            } // Otherwise, do nothing and stay on the page
        });
    </script>

    <script src="../JS/Main/header.js"></script>
</body>

</html>