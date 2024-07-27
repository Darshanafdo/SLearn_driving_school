<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$vehicleCategory = $_SESSION['vehicle_category'] ?? 'N/A';
$package = $_SESSION['package'] ?? 'N/A';
$price = $_SESSION['price'] ?? 'N/A';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment</title>
    <link rel="stylesheet" href="../CSS/Main/footer.css">
    <link rel="stylesheet" href="../CSS/Main/header.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .payment-container {
            display: grid;
            align-items: center;
            justify-content: center;
            justify-items: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 30px 80px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #218838;
        }

        .message {
            margin-top: 20px;
            color: #28a745;
            font-weight: bold;
        }
    </style>
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
                <li><a href="Schedule_login_form.php"><i class="uil uil-calendar-alt"></i> Schedule</a></li>
                <li><a class="action_btn" href="./profile.php"><?php echo 'Hi ' . htmlspecialchars($username); ?></a></li>
                <li><a id="logoutBtn" class="action_btn" href="logout.php">Logout <i class="uil uil-forward"></i></a></li>
            </ul>
            <div class="toggle_btn" id="toggleButton">
                <i class="fa-solid fa-bars" id="toggleIcon"></i>
            </div>
        </nav>
    </header>

    <div class="payment-container">
        <h2>Secure Payment</h2>
        <p>Vehicle Category: <?php echo htmlspecialchars($vehicleCategory); ?></p>
        <p>Package: <?php echo htmlspecialchars($package); ?></p>
        <p>Price: <?php echo htmlspecialchars($price); ?></p>
        <form action="./payment_page2.php" method="POST" id="payment-form">
            <label for="cardName">Name on Card</label>
            <input type="text" id="cardName" name="cardName" required>

            <label for="cardNumber">Card Number</label>
            <input type="text" id="cardNumber" name="cardNumber" required>

            <label for="expMonth">Expiration Month</label>
            <input type="text" id="expMonth" name="expMonth" required>

            <label for="expYear">Expiration Year</label>
            <input type="text" id="expYear" name="expYear" required>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <button type="submit">Submit Payment</button>
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
            <p class="footer-company-name">SLearn © 2023</p>
        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Sri Lanka College of Technology</span> Olcott Mawatha, Colombo - 10</p>
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
            var userConfirmed = confirm("Are you sure you want to logout?");
            if (userConfirmed) {
                window.location.href = 'logout.php';
            }
        });

        document.getElementById('toggleButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            dropdownMenu.classList.toggle('show');
        });
    </script>
    <script src="../JS/Main/header.js"></script>
</body>

</html>