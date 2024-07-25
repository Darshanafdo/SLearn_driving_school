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

    <title>Contact Form</title>
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Body/contactus.css">
    <link rel="stylesheet" href="../JS/Body/contact.js">
    <link rel="stylesheet" href="../JS/Main/header.js">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
                <li><a href="./Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
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
            <li><a class="active" href="home.php"> <i class="uil uil-estate"></i> Home</a></li>
            <li><a href="About_us.php"><i class="uil uil-comment-info"></i> About us</a></li>
            <li><a href="Packages Details.php"><i class="uil uil-package"></i> Packages</a></li>
            <li><a href="contact_us.php"><i class="uil uil-phone-pause"></i> Contact</a></li>
            <li><a href="./Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
            <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                            echo htmlspecialchars($username); ?></a></li>
            <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
        </ul>

    </div>


    <div class="row">
        <div class="col-xs-12">
            <div id="left">

                <h1>Contact Us</h1>
                <div class="formbox">
                    <form action="Contact_email.php" method="post">
                        <input name="name" type="text" class="short" placeholder="Name" onfocus="this.placeholder=''" onblur="this.placeholder='Name'" />

                        <input name="email" type="text" class="short" placeholder="Email" onfocus="this.placeholder=''" onblur="this.placeholder='Email'" />

                        <input name="subject" type="text" class="feedback-input" placeholder="Subject" onfocus="this.placeholder=''" onblur="this.placeholder='Subject'" />

                        <textarea name="message" class="feedback-input" placeholder="Message" onfocus="this.placeholder=''" onblur="this.placeholder='Message'"></textarea>

                        <input type="submit" name="submit" value="SEND" />
                    </form>

                    <h6>Thank You for join with us..</h6>

                </div>

            </div>

        </div>

        <div id="right">
            <div id="map">
            </div>
        </div>
        <div id="cleared"></div>

    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDts9C9iWNF83ExezBXJLIJ0g2dwoERg08&callback=initMap" async defer></script>
    <br>

    <!-- footer -->

    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>SL<span>earn</span></h3>

            <p class="footer-links">
                <a href="../index.html" class="link-1">Home</a>

                <a href="#"> About </a>

                <a href=".contact_us.html"> Contact us </a>

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
                // logout page
                window.location.href = 'logout.php';
            }
        });
    </script>


    <script src="../JS/Body/contact.js"></script>
    <script src="../JS/Main/header.js"></script>
</body>

</html>