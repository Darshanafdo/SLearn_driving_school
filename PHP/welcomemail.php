<?php

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'vendor/autoload.php';

// function sendWelcomeEmail($email, $username)
// {
//     $mail = new PHPMailer(true);

//     try {
//         $mail->isSMTP();
//         $mail->Host = 'smtp.gmail.com';
//         $mail->SMTPAuth = true;
//         $mail->Username = 'slearndschool@gmail.com';
//         $mail->Password = ''; 
//         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $mail->Port = 587;

    
//         $mail->setFrom('slearnschool@gmail.com', 'SLearn Driving School');
//         $mail->addAddress($email);

//         // Content
//         $mail->isHTML(true);
//         $mail->Subject = 'Welcome to SLearn Driving School!';
//         $mail->Body = "<p>Hello $username,</p>
// <p>Welcome to SLearn Driving School! We're glad to have you.</p>
// <p>Best Regards,<br>SLearn Team</p>";

//         $mail->send();
//         echo 'Welcome email has been sent';
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }
