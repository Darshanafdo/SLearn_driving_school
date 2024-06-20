<?php
$conn = new mysqli('localhost', 'root', '', 'slearn');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM packages WHERE vehicle_type='light'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Light Vehicle Packages</title>

    <!-- css file link -->
    <link rel="stylesheet" href="../CSS/Body/packages.css">
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="..JS/">

</head>
<nav class="nav">

    <div class="logo"><a href="header.html"><img src="../Images/Main/logo.png"></a>
    </div>

    <ul class="nav-links">
        <li><a class="active" href="#"><i class="uil uil-estate"></i> Home</a></li>
        <li><a href="#"><i class="uil uil-comment-info"></i> About us</a></li>
        <li><a href="#"><i class="uil uil-package"></i> Packages</a></li>
        <li><a href="#"><i class="uil uil-sort-amount-down"></i> Services</a></li>
        <li><a href="#"><i class="uil uil-phone-pause"></i> Contact</a></li>
        <li><a href="#"><i class="uil uil-calendar-alt"></i> schedule</a></li>
        <li><a href="#"><i class="uil uil-sign-in-alt"></i> Login </a></li>
        <li><a class="action_btn" href="#">Get Started <i class="uil uil-forward"></i></a></li>
    </ul>

    <div class="toggle_btn" id="toggleButton">
        <i class="fa-solid fa-bars" id="toggleIcon"></i>
    </div>
</nav>
</header>
<br>

<div class="dropdown_menu" id="dropdownMenu">
    <ul class="nav-links">
        <li><a class="active" href="#"><i class="uil uil-estate"></i> Home</a></li>
        <li><a href="#"><i class="uil uil-comment-info"></i> About us</a></li>
        <li><a href="#"><i class="uil uil-package"></i> Packages</a></li>
        <li><a href="#"><i class="uil uil-sort-amount-down"></i> Services</a></li>
        <li><a href="#"><i class="uil uil-phone-pause"></i> Contact</a></li>
        <li><a href="#"><i class="uil uil-calendar-alt"></i> schedule</a></li>
        <li><a href="#"><i class="uil uil-sign-in-alt"></i> Login </a></li>
        <li><a class="action_btn" href="#">Get Started <i class="uil uil-forward"></i></a></li>
    </ul>
</div>



<body>
    <h1>Light Vehicle Packages</h1>
    <div class="packages">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='package'>";
                echo "<h2>" . $row['package_name'] . "</h2>";
                echo "<h4>" . $row['description'] . "</h4>";
                echo "<p>Price: Rs." . $row['price'] . "</p>";
                echo '<img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '"/>';
                echo "</div>";
            }
        } else {
            echo "No packages available.";
        }
        $conn->close();
        ?>
    </div>





    <footer class="footer-distributed">

        <div class="footer-left">

            <h3>SL<span>earn</span></h3>

            <p class="footer-links">
                <a href="#" class="link-1">Home</a>

                <a href="#"> About </a>

                <a href="#"> Contact us </a>



                <!-- me comment tikath copy karala ganna. -->

                <!-- <a href="#"> Login </a>
       
       <a href="#"> ...... </a>
       
       <a href="#"> ..... </a> -->
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

    <!-- methanin iwaraii  -->

    <script src="../JS/Main/header.js"></script>
</body>

</html>