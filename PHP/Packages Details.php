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
  <title> Our package details</title>

  <link rel="stylesheet" href="../CSS/Body/Packages Details.css">
  <link rel="stylesheet" href="../CSS/Main/footer.css">
  <link rel="stylesheet" href="../CSS/Main/header.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">

</head>
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


  <div class="details">
    <h1 class="title">Discover Your Journey with Our Exclusive Vehicle Packages for Learners</h1>


    <h2>
      <Embark>
        <p>
          Drive with Confidence! At SLearn Driving, we offer flexible and affordable driving lesson packages
          designed to suit every learner's needs. Whether you're a beginner or need a refresher, our expert instructors
          provide personalized, patient guidance to help you master driving skills. Choose from our range of packages,
          from single lessons to comprehensive courses, tailored for all levels and budgets. With a focus on safety and
          convenience, we ensure you gain the confidence to navigate the roads. Check out our packages and start your
          journey to becoming a skilled, safe driver today!</p>

        <p>Embark on the road to driving success with our specially curated vehicle packages designed for learners like
          you.
          Whether you're a novice driver ready to hit the streets or someone looking to refine their skills,
          our packages cater to all levels of experience, making your learning journey smooth and enjoyable
        </p>
    </h2>

    <br>
    <div class="box">
      <h1> Why Choose Our Vehicle Packages?<h1>

          <h2 class="second">
            01.Expert Guidance: Our certified instructors bring years of experience to guide you at every step.<br>
            02.Flexible Scheduling: Tailor your learning journey to fit your schedule with flexible lesson timings.<br>
            03.Modern Learning Tools: Access cutting-edge resources and technology to enhance your learning
            experience.<br>
            04.Affordable Pricing: Quality education shouldn't break the bank. Our packages offer excellent value for
            your
            investment.<br></h2>

    </div>
    <br>

    <h2 class="last">At SLearn, we believe in empowering learners to become skilled, responsible drivers.
      Choose a package that suits your needs and join us on the road to driving success! Ready to get started?
      Select your packages.</h2>


    <br>
    <button class="package"><a href="package.php">Packages</a></button>


  </div>


  <br>

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
      event.preventDefault(); // logout message
      var userConfirmed = confirm("Are you sure you want to logout of this website?");
      if (userConfirmed) {
        // logout page
        window.location.href = 'logout.php';
      }
    });
  </script>

  <script src="../JS/Main/header.js" defer></script>



</body>

</html>