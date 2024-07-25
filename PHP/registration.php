<?php
// Composer autoload file link (must link this file)
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


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

// Registration eka
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

    // password hash
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Insert 
    try {
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashed_password,
        ]);

        // Send email
        sendWelcomeEmail($email, $username);

        // Redirect to login after successful registration (re check user)
        header('Location:S_login.html');
        exit;
    } catch (PDOException $e) {
        echo '<div style="padding: 15px; background-color: #f44336; color: white; border-radius: 5px;">Error: ' . $e->getMessage() . '</div>';
    }
}

// send email
function sendWelcomeEmail($email, $username)
{
    $mail = new PHPMailer(true);

    try {

        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'slearndschool@gmail.com';
        $mail->Password = 'vtby xugc wndz yfuu';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption, `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port = 587;


        $mail->setFrom('no-reply@slearndriving.com', 'SLearn Driving School');
        $mail->addAddress($email, $username);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to SLearn Driving School!';
        $mail->Body    = "Hello $username,<br><br>Welcome to SLearn Driving School! thank you for choose our driving school.<br><br>Best Regards,<br>SLearn Team";

        $mail->send();

        // Display  message 
        echo '<div style="padding: 15px; width: 500px; background-color: #4CAF50; color: white; border-radius: 5px;"><center>Welcome email has been sent successfully.</center></div>';
    } catch (Exception $e) {
        // Display  message 
        echo '<div style="padding: 15px; background-color: #f44336; color: white; width: 500px; border-radius: 5px;"><center>Message could not be sent.</center> Mailer Error: ' . $mail->ErrorInfo . '</div>';
    }
}
