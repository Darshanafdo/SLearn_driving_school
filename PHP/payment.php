<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <!-- Billing Address -->
        <div class="row">
            <div class="col">
                <h3 class="title">Billing Address</h3>
                <div class="inputBox">
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" placeholder="Enter your full name" required>
                </div>
                <!-- Other address fields (email, city, state, zip) -->
            </div>

            <!-- Payment Details -->
            <div class="col">
                <h3 class="title">Card Accepted:</h3>
                <img src="cards.png" alt="credit/debit card image">
                <div class="inputBox">
                    <label for="cardName">Name On Card:</label>
                    <input type="text" id="cardName" placeholder="Enter card name" required>
                </div>
                <div class="inputBox">
                    <label for="cardNum">Credit Card Number:</label>
                    <input type="text" id="cardNum" placeholder="1111-2222-3333-4444" maxlength="19" required>
                </div>
                <!-- Other card details (expiry month, CVV) -->
            </div>
        </div>

        <!-- Privacy Policy Agreement -->
        <div class="inputBox">
            <input type="checkbox" id="privacyAgreement" required>
            <label for="privacyAgreement">I agree to the privacy policy</label>
        </div>

        <!-- Amount and Pay Button -->
        <div class="inputBox">
            <label for="amount">Amount:</label>
            <input type="number" id="amount" placeholder="Enter amount" required>
        </div>
        <button type="submit">Pay</button>
    </div>

    <!-- Include your JavaScript logic (splitting card number, etc.) in index.js -->
    <script src="index.js"></script>
</body>

</html>