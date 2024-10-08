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
    <title>Home Page</title>
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="../CSS/Body/img-slider.css">
    <link rel="stylesheet" href="../CSS/Body/4-divs.css">
    <link rel="stylesheet" href="../CSS/Body/flip-card.css">
    <link rel="stylesheet" href="../CSS/Body/review.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Body/home-page.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
    <header>
        <nav class="nav">
            <div class="logo"><a href="#"><img src="../Images/Main/logo.png" alt="Logo"></a></div>

            <ul class="nav-links">
                <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
                <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
                <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
                <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
                <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
                <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                                echo htmlspecialchars($username); ?></a></li>
                <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
            </ul>

            <div class="toggle_btn" id="toggleButton">
                <i class="fa-solid fa-bars" id="toggleIcon"></i>
            </div>
        </nav>
    </header>

    <!-- Image slider -->
    <div class="img-slider"></div>

    <!-- 4 divs -->
    <div class="wrapper">
        <div class="feature-box">
            <h2>Easy Driving Learn</h2>
            <p>Learn to drive with ease and confidence.</p>
        </div>
        <div class="feature-box">
            <h2>National Instructor</h2>
            <p>Trained by national-level instructors.</p>
        </div>
        <div class="feature-box">
            <h2>Secure Payment</h2>
            <p>Make payments securely online.</p>
        </div>
        <div class="feature-box">
            <h2>24/7 Support</h2>
            <p>Get assistance anytime, anywhere.</p>
        </div>
    </div>

    <!-- Flip card -->
    <div class="container">
        <div class="frow">
            <div class="fcol">
                <div class="card">
                    <div class="inner-box">
                        <div class="card-front">
                            <img src="../Images/Body/Home/driving-school2.jpg" alt="card_image">
                            <span><b> OUR PACKAGES </b></span>
                        </div>
                        <div class="card-back">
                            <p>Explore our various packages tailored to meet your driving needs.
                                From beginner lessons to advanced
                                training, we have options for everyone.
                                Choose the package that suits you the best and kick-start your
                                driving journey today!</p>
                            <button class="button"><span><b><a href="./Packages Details.php">Our packages</a></b></span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fcol">
                <div class="card">
                    <div class="inner-box">
                        <div class="card-front">
                            <img src="../Images/Body/Home/driving-school2.jpg" alt="card_image">
                            <span><b>Meterial</b></span>
                        </div>
                        <div class="card-back">
                            <p>Discover our comprehensive range of services designed to make your driving experience exceptional.
                                From expert guidance to state-of-the-art facilities,
                                we provide everything you need for a successful driving
                                journey. Explore our services and drive with confidence!</p>
                            <button class="button"><span><b><a href="./study_meterial_page_1.php">Study_meterial</a></b></span></button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="fcol">
                <div class="card">
                    <div class="inner-box">
                        <div class="card-front">
                            <img src="../Images/Body/Home/driving-school2.jpg" alt="card_image">
                            <span><b> SCHEDULE BOOKING</b></span>
                        </div>
                        <div class="card-back">
                            <p>Plan your driving lessons with our flexible scheduling options.
                                We understand your busy lifestyle, and
                                that's why we offer convenient scheduling to fit your needs.
                                Take control of your schedule and book your lessons now!</p>
                            <button class="button"><span><b><a href="./Schedule_login_form.php">Schedule</a></b></span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Dropdown menu -->
    <div class="dropdown_menu" id="dropdownMenu">
        <ul class="nav-links">
            <li><a class="active" href="home.php"><i class="uil uil-estate"></i> Home</a></li>
            <li><a href="About_us.html"><i class="uil uil-comment-info"></i> About us</a></li>
            <li><a href="Packages Details.html"><i class="uil uil-package"></i> Packages</a></li>
            <li><a href="contact_us.html"><i class="uil uil-phone-pause"></i> Contact</a></li>
            <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> Schedule</a></li>
            <li><a href="./profile.php"><i class="uil uil-sign-in-alt"></i> <?php echo htmlspecialchars($username); ?></a></li>
            <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
        </ul>
    </div>

    <!-- Review section -->
    <div class="testimonials">
        <div class="inner">
            <h1>Driven by Feedback: Shaping Tomorrow's Drivers</h1>
            <div class="border"></div>

            <div class="row">
                <div class="col">
                    <div class="testimonial">
                        <img src="../Images/Body/Home/images_for_review/p1.png" alt="">
                        <div class="name">k.d.p. perera</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <p>
                            Exceptional instructors, patient and skilled. Boosted my confidence on the road.
                            Highly recommend this driving school for a stress-free and empowering learning experience.
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="testimonial">
                        <img src="../Images/Body/Home/images_for_review/p2.png" alt="">
                        <div class="name">y.m.d silva</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <p>
                            Outstanding driving school! Instructors are knowledgeable, supportive,
                            and make learning enjoyable. Passed my test with flying colors.
                            Grateful for the top-notch training.
                        </p>
                    </div>
                </div>

                <div class="col">
                    <div class="testimonial">
                        <img src="../Images/Body/Home/images_for_review/p3.png" alt="">
                        <div class="name">w.d. wanigasooriya</div>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <p>
                            Transformative experience! Expert guidance, friendly instructors, and flexible schedules.
                            I gained valuable skills and confidence. Best decision for anyone learning to drive.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="border"></div>
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
            event.preventDefault(); // logout message
            var userConfirmed = confirm("Are you sure you want to logout of this website?");
            if (userConfirmed) {
                // logout page
                window.location.href = 'logout.php';
            }
        });
    </script>

    <!-- Existing JavaScript -->
    <script src="../JS/Main/header.js"></script>

</body>

</html>