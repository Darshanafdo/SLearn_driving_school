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

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $db_username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Could not connect to the database: " . $e->getMessage());
}

// Fetch packages from the database
$packagesQuery = $pdo->query("SELECT * FROM packages ORDER BY package_name");
$packages = $packagesQuery->fetchAll(PDO::FETCH_ASSOC);

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
    $packageQuery = $pdo->prepare("SELECT price FROM packages WHERE id = ?");
    $packageQuery->execute([$packageId]);
    $package = $packageQuery->fetch(PDO::FETCH_ASSOC);
    $price = $package['price'];

    // Save the price in session
    $_SESSION['price'] = $price;
    $_SESSION['email'] = $email; // Save email to session for use in the payment page

    // Insert registration data into the database
    $stmt = $pdo->prepare("INSERT INTO vehicle_registrations 
            (name, name_with_initial, nic, dob, gender, address, contact_number, whatsapp_number, email, vehicle_type, vehicle_category, package_id, price, license_issue_date, agree) 
            VALUES 
            (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $nameWithInitial, $nic, $dob, $gender, $address, $contactNumber, $whatsappNumber, $email, $vehicleType, $vehicleCategory, $packageId, $price, $licenseIssueDate, $agree]);

    header('Location: payment_page2.php');
    exit();
  }
}
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
        <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ';
                                                        echo htmlspecialchars($username); ?></a></li>
        <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
      </ul>
      <div class="toggle_btn" id="toggleButton">
        <i class="fa-solid fa-bars" id="toggleIcon"></i>
      </div>
    </nav>
  </header>

  <div class="form-container">
    <h2>Driving School Registration Form</h2>
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

      <label>Gender</label>
      <select name="gender" required>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
      </select>

      <label for="address">Address</label>
      <textarea id="address" name="address" rows="3" required></textarea>

      <label for="contact_number">Contact Number</label>
      <input type="tel" id="contact_number" name="contact_number" required>

      <label for="whatsapp_number">WhatsApp Number</label>
      <input type="tel" id="whatsapp_number" name="whatsapp_number">

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required>

      <label for="vehicle_type">Vehicle Type</label>
      <select id="vehicle_type" name="vehicle_type" required>
        <option value="">Select Vehicle Type</option>
        <option value="Auto">Auto</option>
        <option value="Manual">Manual</option>
      </select>

      <label for="vehicle_category">Vehicle Category</label>
      <select id="vehicle_category" name="vehicle_category" required>
        <option value="">Select Vehicle Category</option>
        <option value="Light">Light vehicle</option>
        <option value="Heavy">Heavy vehicle</option>
      </select>

      <label for="package">Select a Package</label>
      <select id="package" name="package" required>
        <option value="">Select Package</option>
        <?php foreach ($packages as $package) : ?>
          <option value="<?= $package['id'] ?>" data-price="<?= $package['price'] ?>" data-vehicle-type="<?= $package['vehicle_type'] ?>">
            <?= $package['package_name'] ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label for="price">Price</label>
      <input type="text" id="price" name="price" readonly>

      <label for="license_issue_date" id="license_label">Driving License Issue Date</label>
      <input type="date" id="license_issue_date" name="license_issue_date">

      <label>
        <input type="checkbox" name="agree" required> I agree to the privacy policy
      </label>

      <button type="submit">Submit</button>
      <button type="reset" class="clear">Clear</button>
    </form>
  </div>

  <!-- Dropdown menu -->
  <div class="dropdown_menu" id="dropdownMenu">
    <ul class="nav-links">
      <li><a class="active" href="home.php"><i class="uil uil-estate"></i> Home</a></li>
      <li><a href="About_us.html"><i class="uil uil-comment-info"></i> About us</a></li>
      <li><a href="Packages Details.html"><i class="uil uil-package"></i> Packages</a></li>
      <li><a href="contact_us.html"><i class="uil uil-phone-pause"></i> Contact</a></li>
      <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> Schedule</a></li>
      <li><a href="./profile.php"><i class="uil uil-sign-in-alt"></i> <?php echo htmlspecialchars($username); ?></a></li>
      <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
    </ul>
  </div>

  <!-- Footer -->
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
        Lorem ipsum dolor sit amet, consectateur adispicing elit. Fusce euismod convallis velit,
        eu auctor lacus vehicula sit amet.
      </p>
      <div class="footer-icons">
        <a href="https://www.google.com/" class="icon"><i class="fa-brands fa-google-plus-g"></i></a>
        <a href="https://www.facebook.com/" class="icon"><i class="fa-brands fa-facebook-f"></i></a>
        <a href="https://github.com/" class="icon"><i class="fa-brands fa-github"></i></a>
        <a href="https://www.linkedin.com/" class="icon"><i class="fa-brands fa-linkedin-in"></i></a>
      </div>
    </div>
  </footer>

  <!-- JavaScript for logout confirmation -->
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

  <!-- Existing JavaScript -->
  <script src="../JS/Main/header.js"></script>

  <script>
    // JavaScript to update price based on selected package
    document.getElementById('package').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
      var price = selectedOption.getAttribute('data-price');
      document.getElementById('price').value = price;
    });

    // JavaScript to show/hide driving license issue date based on vehicle category
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

    // Initialize the visibility of the driving license issue date field
    document.getElementById('vehicle_category').dispatchEvent(new Event('change'));
  </script>
</body>

</html>