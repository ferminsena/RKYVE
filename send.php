<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST["email"])) {
    try {
        $mail = new phpmailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rkyvetest@gmail.com';
        $mail->Password = 'lztipombwllnfmww';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('rkyvetest@gmail.com', 'Booking System');
        $mail->addAddress($_POST["email"]);
        $mail->isHTML(true);
        $mail->Subject = $_POST["subject"];
        $mail->Body = $_POST["message"];

        $mail->send();
        echo "<script>alert('Email sent successfully!'); window.location.href = 'admin_booking_management.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Failed to send email: {$mail->ErrorInfo}'); window.location.href = 'admin_booking_management.php';</script>";
    }
}
?>
