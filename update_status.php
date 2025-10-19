<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "bookings_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die(json_encode(["error" => "Connection failed: " . mysqli_connect_error()]));
}

$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['booking_number'], $data['status'])) {
    $bookingNumber = $data['booking_number'];
    $status = $data['status'];

    $sql = "UPDATE booking SET status = ? WHERE booking_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $status, $bookingNumber);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["error" => "Failed to update status."]);
    }

    $stmt->close();
    $conn->close();
    exit;
}

echo json_encode(["error" => "Invalid request."]);
?>
