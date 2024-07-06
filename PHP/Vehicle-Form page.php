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
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../CSS/Main/footer.css">
  <link rel="stylesheet" href="../CSS/Main/header.css">
  <link rel="stylesheet" href="../CSS/Body/vehicle-form.css">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <title>Vehicle Form</title>
</head>

<body>

  <!-- html for header -->
  <header>
    <nav class="nav">
      <div class="logo"><a href="header.html"><img src="../Images/Main/logo.png"></a>
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

  <!-- navigation dropdown menu -->
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


  <!-- html for vehicle form -->


  <h1>Detail Form for Categeroy Package Selecting</h1>
  <div class="border"></div>

  <div class="main">
    <div class="wrapper">
      <div class="title">
        DETAIL FORM
      </div>

      <form class="form" action="" method="post">
        <div class="inputfield">
          <label>Full Name</label>
          <input type="text" class="input" autocomplete="off" required>
        </div>

        <div class="inputfield">
          <label>NIC</label>
          <input type="text" class="input" autocomplete="off" required>
        </div>

        <div class="inputfield">
          <label>DOB</label>
          <input type="text" class="input" autocomplete="off" required>
        </div>

        <div class="inputfield">
          <label>Contact No</label>
          <input type="text" class="input" autocomplete="off" required>
        </div>

        <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea" autocomplete="off" required></textarea>
        </div>

        <div class="inputfield">
          <label>Email Address</label>
          <input type="text" class="input" autocomplete="off" required>
        </div>

        <div class="inputfield">
          <label>Gender</label>
          <div class="custom_select">
            <select>
              <option value="">Select</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>Vehicle Type</label>
          <div class="custom_select">
            <select>
              <option value="">Select</option>
              <option value="auto">Auto</option>
              <option value="manual">Manual</option>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>Categeroy Package</label>
          <div class="custom_select">
            <select>
              <!-- dropdown eka watwnna one php aken(db ake thiyana table aken thama methanata drop down eka enna one.) -->
              <option value="">Select</option>
              <option value="full package">Full Package(Car,Bike,Threeweel)</option>
              <option value="full package">Full Package(Bus,Lorry,Tipper)</option>
              <option value="car">Car</option>
              <option value="bike">Bike</option>
              <option value="weel">Threeweel</option>
              <option value="car,bike">Car,Bike</option>
              <option value="car,weel">Car,Threeweel</option>
              <option value="bike,weel">Bike,Threeweel</option>
              <option value="bus">Bus</option>
              <option value="lorry">Lorry</option>
              <option value="tipper">Tipper</option>
              <option value="bus,lorry">Bus,Lorry</option>
              <option value="bus,tipper">Bus,Tipper</option>
              <option value="lorry,tipper">Lorry,Tipper</option>
              <option value="another">other</option>
            </select>
          </div>
        </div>

        <div class="inputfield">
          <label>Package Price</label>
          <input type="text" class="input" autocomplete="off" required>
        </div>

        <div class="inputfield terms">
          <label class="check">
            <input type="checkbox">
            <span class="checkmark"></span>
          </label>
          <p>Agreed to terms and conditions</p>
        </div>

        <div class="inputfield">
          <input type="submit" value="Registration & Ready to Pay" class="btn" required>
          <input type="reset" value="Clear" class="btn" required>
        </div>

      </form>
    </div>
  </div>

  <!-- html for footer -->
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
      event.preventDefault(); // Prevent the default link behavior
      var userConfirmed = confirm("Are you sure you want to logout of this website?");
      if (userConfirmed) {
        // If the user confirms, proceed to the logout page
        window.location.href = 'logout.php';
      } // Otherwise, do nothing and stay on the page
    });
  </script>

  <!-- link javascript file -->
  <script src="./java scripts/header.js"></script>

</body>

</html>