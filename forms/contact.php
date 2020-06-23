<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../assets/vendor/PHPMailer-6.1.6/src/Exception.php';
require '../assets/vendor/PHPMailer-6.1.6/src/PHPMailer.php';
require '../assets/vendor/PHPMailer-6.1.6/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
//$mail = new PHPMailer(true);
$mail = new PHPMailer();

try {

  //POST vars
  $email = $_POST['email'];
  $name = $_POST['name'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $ecomsultoresEmail = 'info@ecomsultores.com';
  $ecomsultoresName = 'Information';


  //Server settings
  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = 'ecomsultores.com';                     // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = $ecomsultoresEmail;                // SMTP username
  $mail->Password   = 'EzeMail1234!';                         // SMTP password
  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged - default: `PHPMailer::ENCRYPTION_STARTTLS`
  $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

  //Recipients
  $mail->setFrom($ecomsultoresEmail, $ecomsultoresName);
  //$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
  $mail->addAddress($ecomsultoresEmail);             // Name is optional
  $mail->addReplyTo($email, $name);
  //$mail->addCC('cc@example.com');
  //$mail->addBCC('bcc@example.com');

  // Attachments
  //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
  //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  // Content
  $mail->isHTML(true);                                    // Set email format to HTML
  $mail->Subject = $subject;
  $mail->Body    = $message;
  $mail->AltBody = strip_tags($message);

  $mail->send();
  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
