<?php

include("../pages/contact_us.html");

use phpmailer\PHPMailer\PHPMailer;
use phpmailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'slearndschool@gmail.com';
    $mail->Password = '';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    // $mail->SMTPDebug = 2; // or 3 for more detailed logging
    // $mail->Debugoutput = 'html';

    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress("$email");
    $mail->Subject = ("$email ($subject)");
    $mail->Body = $message;
    $mail->send();

    header("Location: contact_us.html");

    // connection eka hadanawa db ekata
    $connection = mysqli_connect("localhost", "root", "", "slearn");

    if ($connection) {
        echo " <h1> connection success </h1>";
    } else {
        die("Not success");
    }

    $query = "INSERT INTO contact (name,email,subject,message) VALUES ('$name','$email','$subject','$message')";

    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }
}
