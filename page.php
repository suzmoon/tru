<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars($_POST['name']);
    $surname = htmlspecialchars($_POST['surname']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $website = htmlspecialchars($_POST['website']);

    if ($email) {
        // Use PHPMailer to send the email via Gmail SMTP
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'suzanxresth@gmail.com';  // Replace with your Gmail address
            $mail->Password = 'emef dbir efms hvcz';    // Use Gmail App Password if 2FA is enabled
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('your-email@gmail.com', 'Your Name');  // From email & name
            $mail->addAddress('suzanxresth@gmail.com', 'Your Name');  // Your email (recipient)

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Submission';
            $mail->Body = "Name: $name $surname<br>Email: $email<br>Website: $website";

            // Send the email
            $mail->send();
            echo "Thank you for contacting us. Your message has been sent.<br>";
            // Provide a "Go Back to Page" option
            echo '<button onclick="window.location.href=\'webpage.html\'">Go Back to Page</button>';
        } catch (Exception $e) {
            echo "Message could not be sent. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Invalid email address. Please go back and correct it.";
    }
}
?>