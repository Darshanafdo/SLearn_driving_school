<?php
// Database connection
$host = 'localhost';
$dbname = 'slearn';
$username = 'root';
$password = '';

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
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
  $packageId = $_POST['package'];
  $licenseIssueDate = $_POST['license_issue_date'];
  $agree = isset($_POST['agree']);

  // Validate driving license issue date (at least 2 years old)
  $licenseIssueTimestamp = strtotime($licenseIssueDate);
  $twoYearsAgo = strtotime('-2 years');
  if ($licenseIssueTimestamp > $twoYearsAgo) {
    $error = "The driving license must be issued at least 2 years ago.";
  } else {
    // Process the form data (e.g., save to database)
    // You can add your own logic here, like saving user data
    echo "Form submitted successfully!";
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
</head>

<body>
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

      <label for="license_issue_date">Driving License Issue Date</label>
      <input type="date" id="license_issue_date" name="license_issue_date" required>

      <label>
        <input type="checkbox" name="agree" required> I agree to the privacy policy
      </label>

      <button type="submit">Submit</button>
      <button type="reset" class="clear">Clear</button>
    </form>
  </div>

  <script>
    // JavaScript to update price based on selected package
    document.getElementById('package').addEventListener('change', function() {
      var selectedOption = this.options[this.selectedIndex];
      var price = selectedOption.getAttribute('data-price');
      document.getElementById('price').value = price;
    });
  </script>
</body>

</html>