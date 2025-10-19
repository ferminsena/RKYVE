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
  <title>RKYVE</title>
  <link rel="stylesheet" href="status.css">
</head>
<body>
    <header>
      <div class="navbar">
        <link rel="stylesheet" href="navbar.css">
        <div class="logo">
          <a href="main.php">
            <img src="images/logo.png" alt="RKYVE Logo" class="logo-image">
          </a>
          <span class="logo-text">
            <span class="text-yellow">RKY</span><span class="text-blue">VE</span>
          </span>
        </div>

        <div class="hamburger" id="hamburger">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <nav id="nav-links">
          <a href="menu.php">MENU</a>
          <a href="highlights.php">HIGHLIGHTS</a>
          <a href="aboutus.php">ABOUT US</a>
        </nav>
      </div>
    </header>

    <main id="home" class="content">
      <div class="status-header">
        <img src="images/image1.jpg" alt="Background Image">

        <div class="overlay-text">BOOKING</div>

        <div class="overlay-subtext">
            <a href="#home">HOME</a> / BOOKING
        </div>
    </div>

    <h2 class="table-heading">BOOKING DETAILS</h2>
    <div class="table-container">
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
                        <th>Date</th>
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
  </main>

  <footer class="footer">
    <div class="footer-container">
      <link rel="stylesheet" href="footer.css">
      <div class="footer-section">
        <h3><br>ADDRESS</h3>
        <a href="https://www.google.com/maps/place/RKYVE+Co-Working+Space+%26+Cafe/@14.1153072,122.9582819,19.3z/data=!4m6!3m5!1s0x3398af001dd44cbf:0xcccae41ffaafbbe2!8m2!3d14.1154527!4d122.9584479!16s%2Fg%2F11lp5x6ktf?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoJLDEwMjExMjM0SAFQAw%3D%3D" target="_blank">
        <img src="images/map-example.png" alt="Map location" class="footer-map"></a>
        <p>Guinto bldg. Gov Panotes Ave. Daet Camarines Norte <br>(near Daet elementary & Mabini Colleges)</p>
      </div>
      <div class="footer-section">
        <h3><br><br><br>OPERATING HOURS</h3>
        <p>Monday - Saturday</p>
        <p>Cafe: 8am - 12mn</p>
        <p>CoSpace/Study hub: 24hrs</p>
      </div>
      <div class="footer-section">
        <h3><br><br><br>QUICK LINKS</h3>
        <ul>
          <li><a href="main.php"><p>Home</p></a></li>
          <li><a href="menu.php"><p>Menu</p></a></li>
          <li><a href="highlights.php"><p>Highlights</p></a></li>
          <li><a href="aboutus.php"><p>About us</p></a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3><br><br><br>CONTACT US</h3>
        <p><a href="mailto:rkyvestudycospacecafe@gmail.com" class="email">rkyvestudycospacecafe@gmail.com</a></p>
        <h4><br>FOLLOW US</h4>
        <div class="social-icons">
          <a href="https://www.facebook.com/profile.php?id=61563864477780" target="_blank"><img src="images/facebook-icon.png" alt="Facebook"></a>
          <a href="https://www.instagram.com/fermin_sena9/" target="_blank"><img src="images/instagram-icon.png" alt="Instagram"></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 GAWA. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
