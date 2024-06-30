<?php
session_start();

// Database connection
$host = 'localhost';
$db = 'slearn';
$user = 'root';  // Replace with your database username
$pass = '';      // Replace with your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database: " . $e->getMessage());
}

// Login handling
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    // Check user credentials
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Start a session and store user data
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Check if the user is an admin
            if ($user['username'] === 'admin') {
                $_SESSION['is_admin'] = true;
                header("Location: ./admin_nav_page.php");  // Redirect to admin panel
                exit;
            } else {
                $_SESSION['is_admin'] = false;
                header("Location: ./home.php");
                // Redirect to user dashboard or perform other actions
            }
        } else {
            echo "Invalid username or password.";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
