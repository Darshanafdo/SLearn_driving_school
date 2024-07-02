<?php
session_start();
require 'config.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Fetch user data
$user_id = $_SESSION['user_id'];
$query = $conn->prepare("SELECT username, email, created_at FROM users WHERE ID = ?");
$query->bind_param("i", $user_id);
$query->execute();
$query->bind_result($username, $email, $created_at);
$query->fetch();
$query->close();

// Handle form submission for updating data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    // Update user data
    $update_query = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE ID = ?");
    $update_query->bind_param("ssi", $new_username, $new_email, $user_id);
    $update_query->execute();
    $update_query->close();

    // Refresh page to see changes
    header("Location: profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to your updated CSS file -->
    <!-- Including Google Fonts for better typography -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="profile-wrapper">
        <div class="profile-card">
            <div class="profile-header">
                <img src="profile-pic.png" alt="User Avatar" class="profile-avatar">
                <h2><?php echo htmlspecialchars($username); ?>'s Profile</h2>
                <p>Manage your profile information below</p>
            </div>
            <div class="profile-content">
                <form method="POST" action="profile.php">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Account Created At</label>
                        <input type="text" id="created_at" value="<?php echo htmlspecialchars($created_at); ?>" disabled>
                    </div>
                    <button type="submit" class="update-button">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>