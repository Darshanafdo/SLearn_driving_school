<?php
// Composer autoload file link(must link this file)
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';  // Adjust the path as needed

// Include PHPMailer classes (if needed, but usually autoload handles this)
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$host = 'localhost';
$db = 'slearn';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Registration handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $confirm_password = htmlspecialchars($_POST['confirm_password']);

    // Validate input
    if ($password !== $confirm_password) {
        echo '<div style="padding: 15px; background-color: #f44336; color: white; border-radius: 5px;">Passwords do not match.</div>';
        exit;
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert user into database
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password,
        ]);

        // Send welcome email
        sendWelcomeEmail($email, $username);

        echo '<div style="padding: 15px; background-color: #4CAF50; color: white; border-radius: 5px;">Registration successful! A welcome email has been sent.</div>';
    } catch (PDOException $e) {
        echo '<div style="padding: 15px; background-color: #f44336; color: white; border-radius: 5px;">Error: ' . $e->getMessage() . '</div>';
    }
}

// Function to send a welcome email using PHPMailer
function sendWelcomeEmail($email, $username)
{
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->SMTPDebug = 0;  // Enable verbose debug output
        $mail->isSMTP();       // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;            // Enable SMTP authentication
        $mail->Username = 'slearndschool@gmail.com';  // SMTP username
        $mail->Password = '';     // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;  // TCP port to connect to

        // Recipients
        $mail->setFrom('no-reply@slearndriving.com', 'SLearn Driving School');
        $mail->addAddress($email, $username);  // Add a recipient

        // Content
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Welcome to SLearn Driving School!';
        $mail->Body    = "Hello $username,<br><br>Welcome to SLearn Driving School! thank you for choose our driving school.<br><br>Best Regards,<br>SLearn Team";

        $mail->send();

        // Display a success message with styling
        echo '<div style="padding: 15px; width: 500px; <center> background-color: #4CAF50; color: white; border-radius: 5px;">Welcome email has been sent successfully.</center></div>';
    } catch (Exception $e) {
        // Display an error message with styling
        echo '<div style="padding: 15px; background-color: #f44336; color: white; border-radius: 5px;"> width: 500px; <center> Message could not be sent. </center> Mailer Error: ' . $mail->ErrorInfo . '</div>';
    }
}
