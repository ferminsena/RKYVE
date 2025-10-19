<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$servername = "localhost";
$username = "root";
$password = "";
$dbanme = "bookings_db";
$conn = new mysqli($servername, $username, $password, $dbanme);

if ($conn->connect_error) {
    die("Connection Failed;" . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone"];
    $people = $_POST["people"];
    $start_date = $_POST["start_date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];

    $booking_number = rand(100000, 999999);

    $sql = "INSERT INTO `booking`(`booking_number`,`name`, `email`, `phone_number`, `people`,  `start_date`, `start_time`, `end_time`) 
            VALUES ('$booking_number', '$name', '$email', '$phone_number', '$people', '$start_date', '$start_time', '$end_time')";

    if ($conn->query($sql) === TRUE) {
    }
    try {
        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'rkyvetest@gmail.com';
        $mail->Password = 'lztipombwllnfmww';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('rkyvetest@gmail.com', 'Booking System');
        $mail->addAddress($email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Booking Confirmation';
        $mail->Body = "<p>Dear $name,</p>
                      <p>Thank you for booking with us! Here are your booking details:</p>
                      <ul>
                        <li>Booking Number: <b>$booking_number</b></li>
                        <li>Name: <b>$name</b></li>
                        <li>Phone: <b>$phone_number</b></li>
                        <li>People: <b>$people</b></li>
                        <li>Date: <b>$start_date</b></li>
                        <li>Start Time: <b>$start_time</b></li>
                        <li>End Time: <b>$end_time</b></li>
                      </ul>
                      <p>Please wait to receive a confirmation email if your booking is approved. Thank you for your patience!</p>
                      <p>Best Regards,</p>
                      <p>RKYVE</p>";
        $mail->send();
    } catch (Exception $e) {

    }

    header("Location: main.php?booking_number=$booking_number");
    exit();
} else {
    echo "Error: " . $conn->error;
}

$stmt->close();

$conn->close();