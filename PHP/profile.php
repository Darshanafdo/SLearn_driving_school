<?php
session_start();
require 'config.php';

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

//  updating data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];

    // Update user data
    $update_query = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE ID = ?");
    $update_query->bind_param("ssi", $new_username, $new_email, $user_id);
    $update_query->execute();
    $update_query->close();

    //reload page
    header("Location: ./profile.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            background-color: #f4f4f4;
        }

        .profile-wrapper {
            width: 100%;
            max-width: 500px;
            margin: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .profile-card {
            padding: 20px;
            text-align: center;
        }

        .profile-header {
            margin-bottom: 20px;
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
            margin: 30px;
        }

        h2 {
            margin: 0;
            font-size: 24px;
            font-weight: 500;
        }

        p {
            margin: 5px 0 20px;
            color: #666;
        }

        .profile-content {
            text-align: left;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: 500;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .update-button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .update-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="profile-wrapper">
        <div class="profile-card">
            <div class="profile-header">
                <!-- <img src="profile-pic.png" alt="User Avatar" class="profile-avatar"> -->
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