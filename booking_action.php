<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "bookings_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingId = $_POST['booking_id'];
    $action = $_POST['action'];

    if ($action === 'accept') {
        $status = 'Confirmed';
        $subject = 'Booking Confirmation';
        $body = "<p>Dear Customer,</p><p>Your booking booking number $bookingId has been confirmed. Thank you for choosing us.</p><p>Best regards,<br>RKYVE</p>";
    } elseif ($action === 'decline') {
        $status = 'Cancelled';
        $subject = 'Booking Cancellation';
        $body = "<p>Dear Customer,</p><p>Your booking number $bookingId has been cancelled due to the room being already reserved. We regret any inconvenience caused.</p><p>Best regards,<br>RKYVE</p>";
    } else {
        echo "Error: Invalid action.";
        exit;
    }

    $sql = "UPDATE booking SET status='$status' WHERE booking_number='$bookingId'";

    $result = $conn->query("SELECT email FROM booking WHERE booking_number='$bookingId'");
    if ($result && $row = $result->fetch_assoc()) {
        $userEmail = $row['email'];

        if ($conn->query($sql)) {
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'rkyvetest@gmail.com';
                $mail->Password = 'lztipombwllnfmww';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;
                // Recipients
                $mail->setFrom('rkyvetest@gmail.com', 'Booking System');
                $mail->addAddress($userEmail);

                // Content
                $mail->isHTML(true);
                $mail->Subject = $subject;
                $mail->Body = $body;

                $mail->send();
                echo "Success";
            } catch (Exception $e) {
                echo "Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: No email found for this booking.";
    }
}

$conn->close();
?>