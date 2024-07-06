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
    <title>About Us</title>
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Body/About_Us.css">
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
                <li><a href="Schedule_login_form.html"><i class="uil uil-calendar-alt"></i> schedule</a></li>
                <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                                echo htmlspecialchars($username); ?></a></li>
                <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
            </ul>


            <div class="toggle_btn" id="toggleButton">
                <i class="fa-solid fa-bars" id="toggleIcon"></i>
            </div>
        </nav>
    </header>
    <br>

    <div class="dropdown_menu" id="dropdownMenu">
        <ul class="nav-links">
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

        </ul>
    </div>


    <div class="section">
        <div class="container">
            <div class="image-section">
                <img src="../Images/Body/About_Us_img/car.jpg" alt="">
            </div>
            <div class="content-section">
                <div class="title">
                    <h1>About us</h1>
                    <div class="header"></div>
                </div>

                <div class="content">
                    <h3>Your Road to <span class="Heading3">Safe Driving</span></h3>
                    <p>Welcome to our driving learners' community! We're passionate about helping you embark on a
                        journey to become a safe and confident driver. <br><br>
                        <b>Our Mission:</b> Our mission is simple yet profound – to empower aspiring drivers like you
                        with the knowledge, skills, and confidence needed to navigate the roads safely. <br>
                        We believe that responsible and skilled drivers are the foundation of road safety.<br><br>

                        <span id="dots">...</span> <span id="invisible-text"><b>Who We Are:</b> We are a team of
                            experienced driving instructors, road safety enthusiasts, and technology experts. <br>
                            Our collective expertise spans decades, and we're committed to bringing you the best
                            resources to ace your driving journey.<br><Br>
                            <b>Why Choose Us:</b><br><Br>
                            -<b>Expert Guidance:</b> Our team of certified instructors brings a wealth of knowledge to
                            your driving education.
                            We're here to guide you through every step of the process, from obtaining your learner's
                            permit to acing your driving test.<br><br>

                            -<b>Comprehensive Resources:</b> We offer a range of comprehensive learning materials, from
                            interactive online courses to practical driving tips and guides.
                            Our goal is to make your learning experience engaging and effective.<br><Br>

                            - <b>Safety First:</b> We prioritize safety above all else. We're dedicated to instilling
                            safe driving habits and practices that will keep you, your passengers, and fellow road users
                            safe.<br><Br>

                            - <b>Community Support:</b> We understand that learning to drive can be a daunting
                            experience. That's why we've built a supportive community where you can connect with other
                            learners, share experiences, and get answers to your questions.
                        </span>
                    </p>
                    <button id="btn" onclick="ReadMoreLess()">Read more</button>

                </div>
            </div>
        </div>
    </div>
    <script>
        function ReadMoreLess() {
            var dots = document.getElementById("dots");
            var invisibletext = document.getElementById("invisible-text");
            var btntext = document.getElementById("btn");
            if (dots.style.display != "none") {
                dots.style.display = "none"
                invisibletext.style.display = "inline"
                btntext.innerHTML = "Read Less"
            } else {
                dots.style.display = "inline"
                invisibletext.style.display = "none"
                btntext.innerHTML = "Read More"
            }
        }
    </script>

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
    </footer>
</body>

</html>