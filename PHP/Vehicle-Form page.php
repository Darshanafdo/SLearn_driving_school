<?php
session_start();

if (!isset($_SESSION['username'])) {
  header("Location: index.php");
  exit();
}

$username = $_SESSION['username'];
?>

<?php
// Database connection
$host = 'localhost';
$dbname = 'slearn';
$db_username = 'root';
$password = '';

// Create connection
$conn = mysqli_connect($host, $db_username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch packages
$packagesQuery = "SELECT * FROM packages ORDER BY package_name";
$result = mysqli_query($conn, $packagesQuery);
$packages = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $nameWithInitial = $_POST['name_with_initial'];
  $nic = $_POST['nic'];
  $dob = $_POST['dob'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $contactNumber = $_POST['contact_number'];
  $whatsappNumber = $_POST['whatsapp_number'];
  $email = $_POST['email'];
  $vehicleType = $_POST['vehicle_type'];
  $vehicleCategory = $_POST['vehicle_category'];
  $packageId = $_POST['package'];
  $licenseIssueDate = $_POST['license_issue_date'] ?? null;
  $agree = isset($_POST['agree']);

  // Validate driving license issue date (at least 2 years old)
  if ($vehicleCategory == 'Heavy') {
    $licenseIssueTimestamp = strtotime($licenseIssueDate);
    $twoYearsAgo = strtotime('-2 years');
    if ($licenseIssueTimestamp > $twoYearsAgo) {
      $error = "The driving license must be issued at least 2 years ago.";
    }
  }

  if (!isset($error)) {
    // Fetch the selected package price
    $packageQuery = "SELECT price, package_name FROM packages WHERE id = ?";
    $stmt = mysqli_prepare($conn, $packageQuery);
    mysqli_stmt_bind_param($stmt, "i", $packageId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $package = mysqli_fetch_assoc($result);
    $price = $package['price'];
    $packageName = $package['package_name'];

    // Save the price in session
    $_SESSION['price'] = $price;
    $_SESSION['email'] = $email;

    // Insert registration data
    $stmt = mysqli_prepare($conn, "INSERT INTO vehicle_registrations 
                (name, name_with_initial, nic, dob, gender, address, contact_number, whatsapp_number, email, vehicle_type, vehicle_category, package_id, price, license_issue_date, agree) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssssssssssidss", $name, $nameWithInitial, $nic, $dob, $gender, $address, $contactNumber, $whatsappNumber, $email, $vehicleType, $vehicleCategory, $packageId, $price, $licenseIssueDate, $agree);
    mysqli_stmt_execute($stmt);

    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'slearndschool@gmail.com';
    $mail->Password = 'vtby xugc wndz yfuu';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('no-reply@slearn.com', 'SLearn');
    $mail->addAddress($email);
    $mail->isHTML(true);

    $mail->Subject = 'Vehicle Registration Confirmation';
    $mail->Body    = "
        <html>
        <head>
          <title>  Registration Confirmation</title>
        </head>
        <body>
          <h2>Registration Details</h2>
          <table>
            <tr><th>Name :</th><td>{$name}</td></tr>
            <tr><th>Name with Initial :</th><td>{$nameWithInitial}</td></tr>
            <tr><th>NIC :</th><td>{$nic}</td></tr>
            <tr><th>Date of Birth :</th><td>{$dob}</td></tr>
            <tr><th>Gender :</th><td>{$gender}</td></tr>
            <tr><th>Address :</th><td>{$address}</td></tr>
            <tr><th>Contact Number :</th><td>{$contactNumber}</td></tr>
            <tr><th>WhatsApp Number :</th><td>{$whatsappNumber}</td></tr>
            <tr><th>Email :</th><td>{$email}</td></tr>
            <tr><th>Vehicle Type :</th><td>{$vehicleType}</td></tr>
            <tr><th>Vehicle Category :</th><td>{$vehicleCategory}</td></tr>
            <tr><th>Package :</th><td>{$packageName}</td></tr>
            <tr><th>Price :</th><td>{$price} (pay )</td></tr>
            <tr><th>License Issue Date :</th><td>{$licenseIssueDate}</td></tr>
          </table>
          <p>Thank you for registering with us!</p>
        </body>
        </html>";

    if ($mail->send()) {
      header('Location: payment_page2.php');
      exit();

      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //save to price and package 
        $price = $_POST['price'];

        // Set session variables
        $_SESSION['price'] = $price;

        // Redirect to payment page
        header("Location: ./payment_page2.php");
        exit();
      }
    } else {
      echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
  }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Driving School Registration Form</title>
  <link rel="stylesheet" href="../CSS/Body/vehicle-form.css">
  <link rel="stylesheet" href="../CSS/Main/footer.css">
  <link rel="stylesheet" href="../CSS/Main/header.css">
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
        <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ' . htmlspecialchars($username); ?></a></li>
        <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
      </ul>
      <div class="toggle_btn" id="toggleButton">
        <i class="fa-solid fa-bars" id="toggleIcon"></i>
      </div>
    </nav>
  </header>

  <div class="form-container">
    <h2>Driving School Registration Form</h2>
    <br>
    <?php if (isset($error)) : ?>
      <p class="error"><?= $error ?></p>
    <?php endif; ?>
    <form method="POST">
      <label for="name">Name</label>
      <input type="text" id="name" name="name" required>

      <label for="name_with_initial">Name with Initial</label>
      <input type="text" id="name_with_initial" name="name_with_initial" required>

      <label for="nic">NIC</label>
      <input type="text" id="nic" name="nic" required>

      <label for="dob">Date of Birth</label>
      <input type="date" id="dob" name="dob" required>

      <label for="gender">Gender</label>
      <select id="gender" name="gender" required>
        <option value="select">select</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>

      <label for="address">Address</label>
      <textarea id="address" name="address" required></textarea>

      <label for="contact_number">Contact Number</label>
      <input type="tel" id="contact_number" name="contact_number" required>

      <label for="whatsapp_number">WhatsApp Number</label>
      <input type="tel" id="whatsapp_number" name="whatsapp_number">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="vehicle_type">Vehicle Type</label>
      <input type="text" id="vehicle_type" name="vehicle_type" required>

      <label for="vehicle_category">Vehicle Category</label>
      <select id="vehicle_category" name="vehicle_category" required>
        <option value="select">Select</option>
        <option value="Light">Light</option>
        <option value="Heavy">Heavy</option>
      </select>

      <label for="package">Package</label>
      <select id="package" name="package" required>
        <?php foreach ($packages as $package) : ?>
          <option value="select">Select</option>
          <option value="<?= $package['id'] ?>" data-price="<?= $package['price'] ?>"><?= $package['package_name'] ?></option>
        <?php endforeach; ?>
      </select>

      <label for="license_issue_date" id="license_label" style="display: none;">Driving License Issue Date</label>
      <input type="date" id="license_issue_date" name="license_issue_date" style="display: none;">

      <label>
        <input type="checkbox" name="agree" required> I agree to the terms and conditions
      </label>

      <button type="submit">Submit</button>
    </form>
  </div>

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

  <script>
    document.getElementById('logoutBtn').addEventListener('click', function(event) {
      event.preventDefault();
      var userConfirmed = confirm("Are you sure you want to logout of this website?");
      if (userConfirmed) {
        window.location.href = 'logout.php';
      }
    });

    document.getElementById('package').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
      var price = selectedOption.getAttribute('data-price');
      document.getElementById('price').value = price;
    });

    document.getElementById('vehicle_category').addEventListener('change', function() {
      var licenseLabel = document.getElementById('license_label');
      var licenseDate = document.getElementById('license_issue_date');
      if (this.value === 'Heavy') {
        licenseLabel.style.display = 'block';
        licenseDate.style.display = 'block';
        licenseDate.required = true;
      } else {
        licenseLabel.style.display = 'none';
        licenseDate.style.display = 'none';
        licenseDate.required = false;
      }
    });

    document.getElementById('vehicle_category').dispatchEvent(new Event('change'));
  </script>
</body>

</html>