<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load PHPMailer Autoload
require 'phpmailer/vendor/autoload.php';

// Create a new PHPMailer instance
$mail = new PHPMailer(true);

try {
    // SMTP Configuration
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output. Set to 0 to disable.
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'aliyaqoob079@gmail.com';                  // SMTP username
    $mail->Password   = 'mepzraznhqnjxgjm';                  // SMTP password


    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('aliyaqoob079@gmail.com', 'Ali Yaqoob');   // Add yur email address
    $mail->addAddress('aliyaqoob079@gmail.com', 'Manahil');     // Add a recipient email address

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Contact From Client';
    $body = '<h2>Ben Resume Contact</h2>';
    $body .= '<p><strong>First Name:</strong> ' . $_POST['first_name'] . '</p>';
    $body .= '<p><strong>Last Name:</strong> ' . $_POST['last_name'] . '</p>';
    $body .= '<p><strong>Email:</strong> ' . $_POST['email'] . '</p>';
    $body .= '<p><strong>Phone:</strong> ' . $_POST['phone'] . '</p>';
    $body .= '<p><strong>Address:</strong> ' . $_POST['address'] . '</p>';
    $body .= '<p><strong>Zip:</strong> ' . $_POST['zip'] . '</p>';
    $body .= '<p><strong>Broker Agent:</strong> ' . ($_POST['broker_agent'] == 'yes' ? 'Yes' : 'No') . '</p>';
    $mail->Body = $body;
    // Send the email
    $mail->send();
   header("location:thankyou.html");
} catch (Exception $e) {
    echo "Message could not be sent. Error: {$mail->ErrorInfo}";
}
?>
