<?php
// Database connection
$host = 'localhost';
$db = 'SLearn';
$user = 'root';  // Replace with your database username
$pass = '';      // Replace with your database password

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
        die("Passwords do not match.");
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

        echo "Registration successful!";
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}

// Function to send a welcome email
function sendWelcomeEmail($email, $username)
{
    $subject = "Welcome to SLearn Driving School!";
    $message = "Hello $username,\n\nWelcome to SLearn Driving School! We're glad to have you.\n\nBest Regards,\nSLearn Team";
    $headers = "From: no-reply@slearndriving.com";

    // Simple mail function. In a real-world scenario, consider using PHPMailer or similar libraries.
    mail($email, $subject, $message, $headers);
}
