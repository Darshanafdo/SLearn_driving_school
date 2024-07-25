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
  <title>study_material_page_4</title>

  <link rel="stylesheet" href="../CSS/Main/footer.css">
  <link rel="stylesheet" href="../CSS/Main/header.css">
  <link rel="stylesheet" href="../CSS/Body/study_material.css">
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

  <script src="../JS/Main/header.js"></script>

  <br>


  <h1>STUDY METERIAL PAGE</h1>
  <div class="border"></div>

  <br>

  <div class="container">

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S17.png" alt="1.png">
      <p id="A"> No left turn </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S18.png" alt="1.png">
      <p id="A"> No right turn</p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S19.png" alt="1.png">
      <p id="A"> No overtaking</p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S20.png" alt="1.png">
      <p id="A"> No horns
      </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S21.png" alt="1.png">
      <p id="A"> Turn left ahead </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S22.png" alt="1.png">
      <p id="A"> Turn right ahead </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S23.png" alt="1.png">
      <p id="A">No bicycles </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S24.png" alt="1.png">
      <p id="A">Roundabout </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S25.png" alt="1.png">
      <p id="A"> Proceed straight or turn right </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S26.png" alt="1.png">
      <p id="A">No entry </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S27.png" alt="1.png">
      <p id="A"> All vehicles prohibited </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S28.png" alt="1.png">
      <p id="A"> No parking </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S29.png" alt="1.png">
      <p id="A"> No parking and standing </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S30.png" alt="1.png">
      <p id="A"> No parking on odd-numbered days </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S31.png" alt="1.png">
      <p id="A"> No parking on even-numbered days </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S32.png" alt="1.png">
      <p id="A"> Stop </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S33.png" alt="1.png">
      <p id="A"> Maximum speed limit
      </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S34.png" alt="1.png">
      <p id="A"> School (supplementing a regulatory sign) </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S35.png" alt="1.png">
      <p id="A"> Single track level crossing </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S36.png" alt="1.png">
      <p id="A"> Give way </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S37.png" alt="1.png">
      <p id="A"> No bicycles </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S38.png" alt="1.png">
      <p id="A"> No animal-drawn vehicles </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S39.png" alt="1.png">
      <p id="A"> No handcarts </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S40.png" alt="1.png">
      <p id="A"> No motor vehicles </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/S41.png" alt="1.png">
      <p id="A"> No u-turn </p>
    </div>

  </div>

  <br>
  <br>

  <div class="border"></div>

  <br>

  <center>
    <div class="pagination">
      <a href="study_meterial_page_3.php">&laquo;</a>
      <a href="study_meterial_page_1.php">1</a>
      <a href="study_meterial_page_2.php">2</a>
      <a href="study_meterial_page_3.php">3</a>
      <a class="active" href="study_meterial_page_4.php">4</a>
      <a href="study_meterial_page_5.php">5</a>

      <a href="study_meterial_page_5.php">&raquo;</a>
    </div>
  </center>

  <br>

  <div class="border"></div>

  <br>
  <br>

  <!-- footer eka -->
  <footer class="footer-distributed">

    <div class="footer-left">

      <h3>SL<span>earn</span></h3>

      <p class="footer-links">
        <a href="home.html" class="link-1">Home</a>

        <a href="About_us.html"> About </a>

        <a href="contact_us.html"> Contact us </a>
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