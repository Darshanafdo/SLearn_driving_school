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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- custom css file link  -->

  <link rel="stylesheet" href="../CSS/Main/footer.css">
  <link rel="stylesheet" href="../CSS/Main/header.css">
  <link rel="stylesheet" href="../CSS/Body/payment_style.css">
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
      <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> schedule</a></li>
      <li><a class="action_btn" href="#"></i>
          <?php echo 'Hi ';
          echo htmlspecialchars($username); ?>
        </a></li>
      <li><a class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
    </ul>
  </div>
  </div>


  <div class="one_container">

    <form action="../PHP/payment.php" method="post">

      <div class="row">

        <div class="col">

          <h3 class="title">billing address</h3>

          <div class="inputBox">
            <span>full name :</span>
            <input type="text" name="full_name" placeholder="Your name" required>
          </div>
          <div class="inputBox">
            <span>email :</span>
            <input type="email" name="email" placeholder="example@example.com" required>
          </div>
          <div class="inputBox">
            <span>address :</span>
            <input type="text" name="Address" placeholder="your address" required>
          </div>
          <div class="inputBox">
            <span>city :</span>
            <input type="text" name="City" placeholder="city" required>
          </div>

          <div class="flex">
            <div class="inputBox">
              <span>state :</span>
              <input type="text" name="State" placeholder="country" required>
            </div>
            <div class="inputBox">
              <span>zip code :</span>
              <input type="text" name="zip_code" placeholder="code" required>
            </div>
          </div>

        </div>

        <div class="col">

          <h3 class="title">payment</h3>

          <div class="inputBox">
            <span>cards accepted :</span>
            <img src="../Images/Body/payment_img/card_img.png" alt="image">
          </div>
          <div class="inputBox">
            <span>name on card :</span>
            <input type="text" name="name_of_card" placeholder="name " required>
          </div>
          <div class="inputBox">
            <span>credit card number :</span>
            <input type="number" name="cread_card_number" placeholder="1111-2222-3333-4444" required>
          </div>
          <div class="inputBox">
            <span>exp month :</span>
            <input type="text" name="Exp_Month" placeholder="january" required>
          </div>

          <div class="flex">
            <div class="inputBox">
              <span>exp year :</span>
              <input type="number" name="ExpYear" placeholder="2022" required>
            </div>
            <div class="inputBox">
              <span>CVV :</span>
              <input type="text" name="CVV" placeholder="1234" required>
            </div>
          </div>

        </div>

      </div>

      <input type="submit" name="submit-btn" value="proceed to checkout" class="submit-btn">

    </form>

  </div>

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
        Welcome to our driving learners' SLearn community! We're passionate about helping you embark on a
        journey to become a safe and confident driver.
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
      event.preventDefault(); //logout message
      var userConfirmed = confirm("Are you sure you want to logout of this website?");
      if (userConfirmed) {
        // logout page
        window.location.href = 'logout.php';
      }
    });
  </script>

  <script src="../JS/Main/header.js"></script>

</body>

</html>