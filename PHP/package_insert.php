<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $package_name = $_POST['package_name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $vehicle_type = $_POST['vehicle_type'];
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));

    $conn = new mysqli('localhost', 'root', '', 'slearn');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO packages (package_name,description, price, image, vehicle_type) VALUES ('$package_name','$description', '$price', '$image', '$vehicle_type')";

    if ($conn->query($sql) === TRUE) {
        echo 'Successfully submitted';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Package Insert</title>
    <link rel="stylesheet" href="../CSS/Body/package_insert.css">
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <header>
        <nav class="nav">

            <div class="logo"><a href="#"><img src="../Images/Main/logo.png"></a>
            </div>

            <ul class="nav-links">
                <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
                <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
                <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
                <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
                <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
                <li><a class="action_btn" href="#"></i>
                        <?php echo 'Hi ';
                        echo htmlspecialchars($username); ?>
                    </a></li>
                <li><a class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
            </ul>

            <div class="toggle_btn" id="toggleButton">
                <i class="fa-solid fa-bars" id="toggleIcon"></i>
            </div>
        </nav>
    </header>

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

    <h1>Admin Package Insert</h1>

    <div class="insert">
        <!-- <button class="back button"> go back</button> -->
        <form action="./package_insert.php" method="post" enctype="multipart/form-data">

            <label for="package_name">Package Name:</label>
            <input type="text" id="package_name" name="package_name" required><br>

            <label for="description"> Description:</label>
            <input type="text" id="description" name="description" required><br>

            <label for="price">Price:</label>
            <input type="text" id="price" name="price" required><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" required><br>

            <label for="category">vehicle_type Category:</label>
            <select id="category" name="vehicle_type">
                <option value="light">select</option>
                <option value="light">Light</option>
                <option value="heavy">Heavy</option>
            </select><br>

            <button type="submit"> Add package</button>

        </form>
    </div>

    <!-- footer -->
    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>SL<span>earn</span></h3>

            <p class="footer-links">
                <a href="#" class="link-1">Home</a>

                <a href="#"> About </a>

                <a href="#"> Contact us </a>
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