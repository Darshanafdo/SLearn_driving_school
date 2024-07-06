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
  <title>study_material_page_1</title>

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

  <script src="../JS/Main/header.js"></script>

  <br>


  <h1>STUDY METERIAL PAGE</h1>
  <div class="border"></div>

  <br>

  <div class="container">

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/1.png" alt="1.png">
      <p id="A"> Expressway </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/2.png" alt="1.png">
      <p id="A"> First aid </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/3.png" alt="1.png">
      <p id="A"> Telephone </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/4.png" alt="1.png">
      <p id="A"> Petrol Station </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/5.png" alt="1.png">
      <p id="A"> Resturant </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/6.png" alt="1.png">
      <p id="A"> Caravan Site </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/7.png" alt="1.png">
      <p id="A"> Youth Hotel </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/8.png" alt="1.png">
      <p id="A"> Pool or Beach </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/9.png" alt="1.png">
      <p id="A"> Emergrncy Telephone </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/10.png" alt="1.png">
      <p id="A"> Motorway </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/11.png" alt="1.png">
      <p id="A"> One-Way Street </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/12.png" alt="1.png">
      <p id="A"> Pedestrin Crossing </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/13.png" alt="1.png">
      <p id="A"> Hospital </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/14.png" alt="1.png">
      <p id="A"> Living Street </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/15.png" alt="1.png">
      <p id="A"> Prority Over Oncoming Traffic </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/16.png" alt="1.png">
      <p id="A"> End Of living Street </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/17.png" alt="1.png">
      <p id="A"> Parking </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A1.png" alt="1.png">
      <p id="A"> Ligth Signals For Pedestrans </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A2.png" alt="1.png">
      <p id="A"> Warning Line </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A3.png" alt="1.png">
      <p id="A"> Overtracking Line </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A4.png" alt="1.png">
      <p id="A"> Pedestrin Crossing </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A5.png" alt="1.png">
      <p id="A"> Cycle Crossing </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A6.png" alt="1.png">
      <p id="A"> Green Traffic Light </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A7.png" alt="1.png">
      <p id="A"> Red Traffic Light </p>
    </div>

    <div class="box" id="box1">
      <img src="../Images/Body/study_material_img/A8.png" alt="1.png">
      <p id="A"> Red & yellow Traffic Light </p>
    </div>

  </div>


  <br>
  <br>

  <div class="border"></div>

  <br>
  <center>
    <div class="pagination">
      <a href="#">&laquo;</a>
      <a class="active" href="study_meterial_page_1.php">1</a>
      <a href="study_meterial_page_2.php">2</a>
      <a href="study_meterial_page_3.php">3</a>
      <a href="study_meterial_page_4.php">4</a>
      <a href="study_meterial_page_5.php">5</a>

      <a href="study_meterial_page_2.php">&raquo;</a>
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
        <a href="/Home Page/home-page.html" class="link-1">Home</a>

        <a href="#"> About </a>

        <a href="/contact/contact.html"> Contact us </a>

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