<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'assets/phpmailer/PHPMailer.php';
require 'assets/phpmailer/SMTP.php';
require 'assets/phpmailer/Exception.php';

function kirimEmail($to, $nama, $status) {
  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'emailmu@gmail.com';
  $mail->Password = 'passwordmu';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  $mail->setFrom('emailmu@gmail.com', 'Bengkel');
  $mail->addAddress($to);
  $mail->Subject = 'Status Servis';
  $mail->Body = "Halo $nama, status servis Anda: $status";
  $mail->send();
}
?>