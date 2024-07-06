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
    <title>Download paper</title>

    <link rel="stylesheet" href="../CSS/Body/Paper_download.css">
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
                <i class="fa-solid fa-times" id="toggleIcon"></i>
            </div>
        </nav>
    </header>
    <br>

    <div class="dropdown_menu open" id="dropdownMenu">
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

    <h1>DRIVING LICENSE EXAM PAPERS</h1>
    <hr>
    <p>
        Here we present the updated Driving Licence Exam papers PDF file ( Sinhala medium) and you can
        download it using the link given below.
        Further, it’s FREE for downloading. Also, We have a considerable amount of Sri Lanka Driving Licence Exam past
        papers collection. You Can Check It Out.
    </p>
    <br>
    <br>
    <div class="wpfd-single-file">
        <img src="../Images/Body/Paper_download/pdf.png" width="40" height="40">

        <div class="file-content">
            <h4 class="wpfd-file-content--title">

                <a href="https://learn-english-in-sinhala.com/download/5993/driving-licence/4478/sri-lanka-driving-licence-exam-paper.pdf" style="text-decoration: none">Sri Lanka Driving Licence Exam Paper</a>
            </h4><br>
            <div class="details">
                <div>File size: 1.24 MB</div><br>
                <div>Created: 28-10-2023</div><br>
                <div>Updated: 28-10-2023</div>
            </div><br>

            <div class="buttons">
                <a href="https://learn-english-in-sinhala.com/download/5993/driving-licence/4478/sri-lanka-driving-licence-exam-paper.pdf" data-id="4478" title="Sri Lanka Driving Licence Exam Paper" class="download">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                        <g fill="#ffffff">
                            <path d="M400 200c0 112-89 200-201 200C88 400 0 311 0 199S89 0 201 0c111 0 199 89 199 200zm-179-8l-3-1V89c0-15-7-24-18-23-13 1-18 9-18 22v107l-34-35c-8-8-18-11-27-2-8 8-7 18 2 26l63 63c10 11 18 10 28 0l63-62c8-8 10-17 2-27-7-8-17-7-27 2l-31 32zm-21 113h82c13 0 24-4 32-14 10-14 8-29 6-44-1-4-8-9-12-8-5 0-9 6-12 10-2 3-1 8 0 13 1 13-5 17-18 17H131c-25 0-25 0-26-25-1-3 0-6-2-7-3-4-8-8-12-8s-10 5-11 9c-11 30 8 57 40 57h80z">
                            </path>
                        </g>
                    </svg>
                    <span>Download</span>
                </a>

                <a href="https://learn-english-in-sinhala.com/wp-admin/admin-ajax.php?juwpfisadmin=false&amp;action=wpfd&amp;task=file.download&amp;wpfd_category_id=5993&amp;wpfd_file_id=4478&amp;token=&amp;preview=1" class="preview" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                        <g fill="#ffffff">
                            <path d="M200 325c-36 0-70-11-101-30a356 356 0 01-92-80c-9-11-9-19 0-29 37-44 79-79 131-99 51-20 102-14 151 12 41 22 76 52 106 89 6 8 7 16 1 23-39 48-85 85-141 105a167 167 0 01-55 9zm0-47c41 0 75-36 75-81s-34-81-75-81c-42 0-75 36-75 81s34 81 75 81z">
                            </path>
                            <path d="M200 159c21 0 38 17 38 38 0 20-17 37-38 37s-38-17-38-37c0-21 17-38 38-38z"></path>
                        </g>
                    </svg>
                    <span>Preview</span>
                </a>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="wpfd-single-file">
        <img src="../Images/Body/Paper_download/pdf.png" width="40" height="40">



        <div class="file-content">
            <h4 class="wpfd-file-content--title"><a href="https://learn-english-in-sinhala.com/download/5993/driving-licence/4477/sri-lanka-driving-licence-exam-questions-and-answers.pdf" style="text-decoration: none">Sri Lanka Driving Licence Exam Questions and Answers</a></h4>
            <p class="wpfd-file-content--description">
                Answers
            </p><br>
            <div class="details">
                <div>File size: 1.53 MB</div><br>
                <div>Created: 28-10-2023</div><br>
                <div>Updated: 28-10-2023</div><br>
            </div>
            <br>
            <div class="buttons">
                <a href="https://learn-english-in-sinhala.com/download/5993/driving-licence/4477/sri-lanka-driving-licence-exam-questions-and-answers.pdf" data-id="4477" title="Answers" class="download">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                        <g fill="#ffffff">
                            <path d="M400 200c0 112-89 200-201 200C88 400 0 311 0 199S89 0 201 0c111 0 199 89 199 200zm-179-8l-3-1V89c0-15-7-24-18-23-13 1-18 9-18 22v107l-34-35c-8-8-18-11-27-2-8 8-7 18 2 26l63 63c10 11 18 10 28 0l63-62c8-8 10-17 2-27-7-8-17-7-27 2l-31 32zm-21 113h82c13 0 24-4 32-14 10-14 8-29 6-44-1-4-8-9-12-8-5 0-9 6-12 10-2 3-1 8 0 13 1 13-5 17-18 17H131c-25 0-25 0-26-25-1-3 0-6-2-7-3-4-8-8-12-8s-10 5-11 9c-11 30 8 57 40 57h80z">
                            </path>
                        </g>
                    </svg>
                    <span>Download</span>
                </a>
                <a href="https://learn-english-in-sinhala.com/wp-admin/admin-ajax.php?juwpfisadmin=false&amp;action=wpfd&amp;task=file.download&amp;wpfd_category_id=5993&amp;wpfd_file_id=4477&amp;token=&amp;preview=1" class="preview" target="_blank">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 400">
                        <g fill="#ffffff">
                            <path d="M200 325c-36 0-70-11-101-30a356 356 0 01-92-80c-9-11-9-19 0-29 37-44 79-79 131-99 51-20 102-14 151 12 41 22 76 52 106 89 6 8 7 16 1 23-39 48-85 85-141 105a167 167 0 01-55 9zm0-47c41 0 75-36 75-81s-34-81-75-81c-42 0-75 36-75 81s34 81 75 81z">
                            </path>
                            <path d="M200 159c21 0 38 17 38 38 0 20-17 37-38 37s-38-17-38-37c0-21 17-38 38-38z"></path>
                        </g>
                    </svg>
                    <span>Preview</span>
                </a>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="file-content">
        <img src="../Images/Body/Paper_download/pdf.png" width="30px" height="30px">

        <a href="https://learn-english-in-sinhala.com/download/5274/download-driving-licence-exam-questions-and-answers-pdf/3043/2021-updated-road-signs-sri-lanka.pdf" style="text-decoration: none">2021 Updated Road Signs Sri Lanka</a>
        <br>
        <img src="../Images/Body/Paper_download/pdf.png" width="30px" height="30px">

        <a href="https://learn-english-in-sinhala.com/download/5274/download-driving-licence-exam-questions-and-answers-pdf/3042/download-driving-licence-exam-questions-and-answers-pdf.pdf" style="text-decoration: none">Download Driving Licence Exam Questions and Answers PDF</a>

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