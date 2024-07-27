<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<?php
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

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $id = isset($_POST['id']) ? $_POST['id'] : '';
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $mobile_number = isset($_POST['mobile_number']) ? $_POST['mobile_number'] : '';

    if ($action === 'insert') {
        $insert_query = "INSERT INTO instructors (name, gender, email, mobile_number) VALUES (?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($insert_query)) {
            $stmt->bind_param('sssi', $name, $gender, $email, $mobile_number);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action === 'update') {
        $update_query = "UPDATE instructors SET name = ?, gender = ?, email = ?, mobile_number = ? WHERE id = ?";
        if ($stmt = $mysqli->prepare($update_query)) {
            $stmt->bind_param('sssii', $name, $gender, $email, $mobile_number, $id);
            $stmt->execute();
            $stmt->close();
        }
    } elseif ($action === 'delete') {
        $delete_query = "DELETE FROM instructors WHERE id = ?";
        if ($stmt = $mysqli->prepare($delete_query)) {
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Fetch instructors
$instructors = [];
$fetch_query = "SELECT * FROM instructors";
if ($result = $mysqli->query($fetch_query)) {
    while ($row = $result->fetch_assoc()) {
        $instructors[] = $row;
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
    <title>Manage Instructors</title>
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Body/instructor_manage.css">
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

    <h2>Manage Instructors</h2>

    <div class="container">
        <form id="instructorForm" method="post" action="">
            <input type="hidden" name="id" id="id">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mobile_number">Mobile Number:</label>
            <input type="text" id="mobile_number" name="mobile_number" required>

            <br>

            <input type="hidden" name="action" id="action" value="insert">
            <button type="submit">Save</button>
            <button type="button" onclick="clearForm()">Clear</button>
        </form>
    </div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($instructors as $instructor) : ?>
                    <tr>
                        <td><?= $instructor['id']; ?></td>
                        <td><?= $instructor['name']; ?></td>
                        <td><?= $instructor['gender']; ?></td>
                        <td><?= $instructor['email']; ?></td>
                        <td><?= $instructor['mobile_number']; ?></td>
                        <td>
                            <button onclick="editInstructor(<?= htmlspecialchars(json_encode($instructor), ENT_QUOTES, 'UTF-8'); ?>)">Edit</button>
                            <form method="post" action="" style="display:inline;">
                                <input type="hidden" name="id" value="<?= $instructor['id']; ?>">
                                <input type="hidden" name="action" value="delete">
                                <button type="submit" onclick="return confirm('Are you sure you want to delete this instructor?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>


    <!-- Footer -->
    <footer class="footer-distributed">
        <div class="footer-left">
            <h3>SL<span>earn</span></h3>
            <p class="footer-links">
                <a href="./index.html" class="link-1">Home</a>
                <a href="#">About</a>
                <a href="./contact/contact.html">Contact us</a>
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
                <a href="https://www.google.com/" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
                <a href="https://www.facebook.com/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="https://github.com/" class="icon"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
            </div>
        </div>
    </footer>

    <!--  logout  -->
    <script>
        document.getElementById('logoutBtn').addEventListener('click', function(event) {
            event.preventDefault(); // logout page
            var userConfirmed = confirm("Are you sure you want to logout of this website?");
            if (userConfirmed) {
                window.location.href = 'logout.php';
            }
        });
    </script>

    <script src="../JS/Main/header.js"></script>

    <script>
        function editInstructor(instructor) {
            document.getElementById('id').value = instructor.id;
            document.getElementById('name').value = instructor.name;
            document.getElementById('gender').value = instructor.gender;
            document.getElementById('email').value = instructor.email;
            document.getElementById('mobile_number').value = instructor.mobile_number;
            document.getElementById('action').value = 'update';
        }

        function clearForm() {
            document.getElementById('id').value = '';
            document.getElementById('name').value = '';
            document.getElementById('gender').value = '';
            document.getElementById('email').value = '';
            document.getElementById('mobile_number').value = '';
            document.getElementById('action').value = 'insert';
        }
    </script>
</body>

</html>