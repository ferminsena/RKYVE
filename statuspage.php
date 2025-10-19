<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "bookings_db";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$booking = null;
$error = null;
$result = null;

if (isset($_GET['booking_number'])) {
    $bookingNumber = $_GET['booking_number'];

    $sql = "SELECT booking_number, name, email, phone_number, people, start_date,
            TIME_FORMAT(start_time, '%H:%i') AS formatted_start_time, 
            TIME_FORMAT(end_time, '%H:%i') AS formatted_end_time, 
            status
            FROM booking 
            WHERE booking_number = ?";

    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("s", $bookingNumber);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $booking = $result->fetch_assoc();
        } else {
            $error = "No booking found with this number.";
        }

        $stmt->close();
    } else {
        $error = "Database query failed.";
    }
} else {
    $error = "No booking number provided.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Status</title>
    <link rel="stylesheet" href="adminsid.css">
</head>
<body>
    <div class="table-container">
        <h2>Booking Management</h2>
        <?php if ($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php elseif ($booking): ?>
            <table>
                <thead>
                    <tr>
                        <th>Booking #</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>People</th>
                        <th>Start Date</th>
                        <th>Start Time</th>
                        <th>End Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($booking['booking_number']); ?></td>
                        <td><?php echo htmlspecialchars($booking['name']); ?></td>
                        <td><?php echo htmlspecialchars($booking['email']); ?></td>
                        <td><?php echo htmlspecialchars($booking['phone_number']); ?></td>
                        <td><?php echo htmlspecialchars($booking['people']); ?></td>
                        <td><?php echo htmlspecialchars($booking['start_date']); ?></td>
                        <td><?php echo htmlspecialchars($booking['formatted_start_time']); ?></td>
                        <td><?php echo htmlspecialchars($booking['formatted_end_time']); ?></td>
                        <td><?php echo htmlspecialchars($booking['status']); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <p>Please enter a valid booking number.</p>
        <?php endif; ?>
    </div>
</body>
</html>
