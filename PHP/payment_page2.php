<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .payment-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
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
    <div class="payment-container">
        <h2>Secure Payment</h2>
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
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "slearn";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get form data
            $cardName = $_POST['cardName'];
            $cardNumber = $_POST['cardNumber'];
            $expMonth = $_POST['expMonth'];
            $expYear = $_POST['expYear'];
            $cvv = $_POST['cvv'];
            $email = $_POST['email'];

            // Insert payment details into the database
            $sql = "INSERT INTO payment_details (card_name, card_number, exp_month, exp_year, cvv) VALUES (?, ?, ?, ?, ?)";

            // Prepare statement to prevent SQL injection
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $cardName, $cardNumber, $expMonth, $expYear, $cvv);

            if ($stmt->execute()) {
                echo "<p class='message'>Payment successful! An email has been sent to you.</p>";

                // Send confirmation email
                $to = $email;
                $subject = "Payment Confirmation";
                $message = "Dear $cardName,\n\nThank you for your payment. Here are your payment details:\n\n";
                $message .= "Card Name: $cardName\n";
                $message .= "Card Number: **** **** **** " . substr($cardNumber, -4) . "\n";
                $message .= "Expiration Date: $expMonth/$expYear\n";
                $message .= "Amount: $100.00\n\n"; // Add more details as required
                $message .= "Best regards,\nYour Company";

                $headers = "From: no-reply@yourcompany.com";

                if (mail($to, $subject, $message, $headers)) {
                    echo "<p class='message'>Email sent successfully.</p>";
                } else {
                    echo "<p class='message' style='color: red;'>Failed to send email.</p>";
                }
            } else {
                echo "<p class='message' style='color: red;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
            }

            // Close the statement and connection
            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>

</html>