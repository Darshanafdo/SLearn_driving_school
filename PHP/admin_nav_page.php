<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Admin_Nav </title>

    <!-- add css (link pages) -->
    <link rel="stylesheet" href="../CSS/Body/admin_nav.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <!-- header eka -->
    <header>
        <nav class="nav">
            <div class="logo"><a href="#"><img src="../Images/Main/logo.png"></a>
            </div>

            <ul class="nav-links">
                <li><a href="./admin_manage.php"><i class="uil uil-comment-info"></i> Package manage</a></li>
                <li><a href="./instructor_manage.php"><i class="uil uil-package"></i> Instructor Manage</a></li>
                <li><a href="./schedule_time_manage.php"><i class="uil uil-phone-pause"></i> Schedule time Manage</a></li>
                <li><a href="./A_view_contact_d.php"><i class="uil uil-calendar-alt"></i> User question view</a></li>
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
            <li><a href="./A_view_contact_d.php"><i class="uil uil-calendar-alt"></i> User question view</a></li>
            <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                            echo htmlspecialchars($username); ?></a></li>
            <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
        </ul>

    </div>


    <div class="navi_box">
        <h1>- Admin Panel -</h1>

        <div class="link">
            <div class="nav_box1">

                <a href="./package_insert.php"><i class="fas fa-plus-square"></i> &nbsp; create package</a>
            </div>

            <div class="nav_box1">
                <a href="./admin_manage.php"> <i class="fas fa-tasks"></i> &nbsp; Package_manage</a>
            </div>

            <div class="nav_box1">
                <a href="./instructor_manage.php"> <i class="fas fa-user-plus"></i> &nbsp; manage Instructors</a>
            </div>

            <div class=" nav_box1">
                <a href="./schedule_time_manage.php"> <i class="fas fa-calendar-alt"></i> &nbsp; Manage schedule time </a>
            </div>

            <div class="nav_box1">
                <a href="A_view_contact_d.php"> User question view </a>
            </div>

            <div class="nav_box1">
                <a href="./Student_registration.php"> student create </a>
            </div>
        </div>
    </div>



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
            event.preventDefault(); // logout message
            var userConfirmed = confirm("Are you sure you want to logout of this website?");
            if (userConfirmed) {
                //  logout page
                window.location.href = 'logout.php';
            }
        });
    </script>

    <script src="../JS/Main/header.js"></script>

</body>

</html>