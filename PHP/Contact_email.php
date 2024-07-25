<?php

include("../pages/contact_us.html");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    try {
        // email sent settings 
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'slearndschool@gmail.com';
        $mail->Password = 'vtby xugc wndz yfuu';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('slearndschool@gmail.com', 'SlearnD School');
        $mail->addAddress($email);
        $mail->addReplyTo('no-reply@slearndschool.com', 'No Reply');

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;

        // Email Bodya
        $mailContent = "
            <html>
            <head>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { width: 80%; margin: 0 auto; padding: 20px; }
                    .header { background-color: #4CAF50; padding: 10px; text-align: center; color: white; }
                    .content { margin-top: 20px; }
                    .footer { margin-top: 20px; text-align: center; color: #777; }
                </style>
            </head>
            <body>
                <div class='container'>
                    <div class='header'>
                        <h2>Contact Form Submission</h2>
                    </div>
                    <div class='content'>
                        <p><strong>Name:</strong> $name</p>
                        <p><strong>Email:</strong> $email</p>
                        <p><strong>Subject:</strong> $subject</p>
                        <p><strong>Message:</strong></p>
                        <p>$message</p>
                    </div>
                    <div class='footer'>
                        <p>Thank you for reaching out to us. We will contact you.. Thanks you</p>
                    </div>
                </div>
            </body>
            </html>
        ";

        $mail->Body = $mailContent;

        $mail->send();


        header("Location: ./home.php");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    // Database connection 
    $connection = mysqli_connect("localhost", "root", "", "slearn");

    if ($connection) {
        echo "<h1>Connection success</h1>";
    } else {
        die("Not success");
    }
    //insert 
    $query = "INSERT INTO contact (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }
}
