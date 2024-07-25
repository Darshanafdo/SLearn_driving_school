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
  <title> Schedule Booking Form </title>

  <link rel="stylesheet" href="../CSS/Main/header.css">
  <link rel="stylesheet" href="../CSS/Main/footer.css">
  <link rel="stylesheet" href="../CSS/Body/Schedule_form1.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


<body>
  <!-- header eka  -->
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


  <h1> Schedule Booking Form</h1>
  <div class="border"></div>

  <div class="container">
    <div class="box">

      <header>Schedule Booking Form</header>

      <form action="#" method="post">

        <div class="field input">
          <label for="email">Student Name :</label>
          <input type="text" name="sname" id="Student Name" autocomplete="off" required>
        </div>

        <div class="field radio">
          <label> Gender: </label>
          <input type="radio" id="male" name="gender" value="male">
          <label for="male"> Male </label>
          <input type="radio" id="female" name="gender" value="female">
          <label for="female"> Female </label>
        </div>


        <div class="field select">
          <label for="bookingTime"> Booking Time:</label>
          <select id="bookingTime" name="bookingTime">
            <option value=""> </option>
            <option value="10:00 AM - 12:00 PM"> 10:00 AM - 12:00 PM </option>
            <option value="1:00 PM - 3:00 PM"> 1:00 PM - 3:00 PM </option>
            <option value="4:00 PM - 6:00 PM"> 4:00 PM - 6:00 PM </option>
          </select>
        </div>

        <div class="field input">
          <label for="selectDate"> Select Date: </label>
          <input type="date" id="selectDate" name="selectDate" required>
        </div>

        <div class="field select">
          <label for="instructors"> Select Instructors: </label>
          <select id="instructors" name="instructors">
            <option value=""></option>
            <option value="Instructor 1"> Instructor 1 </option>
            <option value="Instructor 2"> Instructor 2 </option>
            <option value="Instructor 3"> Instructor 3 </option>
            <option value="Instructor 4"> Instructor 4 </option>
            <option value="Instructor 5"> Instructor 5 </option>
            <option value="Instructor 6"> Instructor 6 </option>
          </select>
        </div>

        <div class="field">
          <input type="submit" class="btn" name="submit" value="submit" required>
        </div>

      </form>
    </div>
  </div>





  <!-- footer eka  -->

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
      event.preventDefault(); // loout message
      var userConfirmed = confirm("Are you sure you want to logout of this website?");
      if (userConfirmed) {
        // logout message
        window.location.href = 'logout.php';
      }
    });
  </script>

  <script src="../JS/Main/header.js"></script>


</body>

</html>