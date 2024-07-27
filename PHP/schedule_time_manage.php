<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>


<?php
// Database 
$host = 'localhost';
$db = 'slearn';
$user = 'root';
$pass = '';

//  connection
$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $time_slot = isset($_POST['time_slot']) ? $_POST['time_slot'] : '';

    if ($action === 'insert') {
        $insert_query = "INSERT INTO schedule (time_slot) VALUES (?)";
        if ($stmt = $mysqli->prepare($insert_query)) {
            $stmt->bind_param('s', $time_slot);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action === 'update') {
        $update_query = "UPDATE schedule SET time_slot = ? WHERE id = ?";
        if ($stmt = $mysqli->prepare($update_query)) {
            $stmt->bind_param('si', $time_slot, $id);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action === 'delete') {
        $delete_query = "DELETE FROM schedule WHERE id = ?";
        if ($stmt = $mysqli->prepare($delete_query)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch schedule times
$schedules = [];
$fetch_query = "SELECT * FROM schedule";
if ($result = $mysqli->query($fetch_query)) {
    while ($row = $result->fetch_assoc()) {
        $schedules[] = $row;
    }
    $result->free();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Schedule</title>
    <link rel="stylesheet" href="../css/Body/schedule_time_manage.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>

    <header>
        <nav class="nav">
            <div class="logo"><a href="#"><img src="../Images/Main/logo.png"></a>
            </div>

            <ul class="nav-links">
                <li><a href="./admin_manage.php"><i class="uil uil-comment-info"></i> Package manage</a></li>
                <li><a href="./instructor_manage.php"><i class="uil uil-package"></i> Instructor Manage</a></li>
                <li><a href="./schedule_time_manage.php"><i class="uil uil-phone-pause"></i> Schedule time Manage</a></li>
                <li><a href="#"><i class="uil uil-calendar-alt"></i> Dashboard</a></li>
                <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                                echo htmlspecialchars($username); ?></a></li>
                <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
            </ul>


            <div class="toggle_btn" id="toggleButton">
                <i class="fa-solid fa-bars" id="toggleIcon"></i>
            </div>
        </nav>
    </header>


    <div class="dropdown_menu" id="dropdownMenu">
        <ul class="nav-links">
            <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
            <li><a href="./admin_manage.php"><i class="uil uil-comment-info"></i> Package manage</a></li>
            <li><a href="./instructor_manage.php"><i class="uil uil-package"></i> Instructor Manage</a></li>
            <li><a href="./schedule_time_manage.php"><i class="uil uil-phone-pause"></i> Schedule time Manage</a></li>
            <li><a href="#"><i class="uil uil-calendar-alt"></i> Dashboard</a></li>
            <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                            echo htmlspecialchars($username); ?></a></li>
            <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
        </ul>

    </div>

    <div class="container">
        <h2>Manage Schedule</h2>
        <form id="scheduleForm" method="post" action="./schedule_time_manage.php">
            <input type="hidden" name="id" id="id">

            <label for="time_slot">Time Slot:</label>
            <input type="text" id="time_slot" name="time_slot" required>

            <input type="hidden" name="action" id="action" value="insert">
            <button type="submit">Save</button>
            <button type="button" onclick="clearForm()">Clear</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Time Slot</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($schedules as $schedule) : ?>
                    <tr>
                        <td><?= $schedule['id']; ?></td>
                        <td><?= $schedule['time_slot']; ?></td>
                        <td>
                            <button onclick="editSchedule(<?= htmlspecialchars(json_encode($schedule), ENT_QUOTES, 'UTF-8'); ?>)">Edit</button>
                            <form method="post" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $schedule['id']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this time slot?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function editSchedule(schedule) {
            document.getElementById('id').value = schedule.id;
            document.getElementById('time_slot').value = schedule.time_slot;
            document.getElementById('action').value = 'update';
        }

        function clearForm() {
            document.getElementById('id').value = '';
            document.getElementById('time_slot').value = '';
            document.getElementById('action').value = 'insert';
        }
    </script>

    <!-- footer eka -->
    <footer class="footer-distributed">

        <div class="footer-left">
            <h3>SL<span>earn</span></h3>
            <p class="footer-links">
                <a href="home-page.html" class="link-1">Home</a>
                <a href="About_us.html"> About </a>
                <a href="contact.html"> Contact us </a>
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
                Welcome to our driving learners' SLearn community! We're passionate about helping you embark on a
                journey to become a safe and confident driver.
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
            event.preventDefault(); // logout essage
            var userConfirmed = confirm("Are you sure you want to logout of this website?");
            if (userConfirmed) {
                // logout page
                window.location.href = 'logout.php';
            }
        });
    </script>

    <script src="../JS/Main/header.js"></script>

</body>

</html>