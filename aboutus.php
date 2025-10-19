<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RKYVE</title>
  <link rel="stylesheet" href="navbar.css">
  <link rel="stylesheet" href="footer.css">
  <link rel="stylesheet" href="aboutus.css">
  <link rel="stylesheet" href="checkstatus.css">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.4.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
  <header>
    <div class="navbar">
      <div class="logo">
        <a href="main.php">
          <img src="images_navbar/logo.png" alt="RKYVE Logo" class="logo-image">
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
        <a href="highlights.php">GALLERY</a>
        <a href="#aboutus">ABOUT US</a>
        <button class="btnCheckStatus-popup" onclick="openStatusForm()">CHECK STATUS</button>
      </nav>
    </div>
  </header>

  <section class="about-us" id="aboutus">

    <div>
      <h2>Are you looking for a perfect place to study?</h2>
      <p><b>"Bored working at home?"</b></p>
      <p>
        <strong>
          The perfect blend of productivity and comfort in our coworking and study space! Whether you're working solo,
          collaborating with a team, we provide high-speed WiFi, cozy seating, and a quiet, inspiring atmosphere. Boost
          your focus, stay energized, and get more done.
        </strong>
      </p>
    </div>
  </section>

  <section class="icon-container">
    <div class="icon-item">
      <i class="ri-wifi-line"></i>
      <p>Free WiFi</p>
    </div>
    </div>
    <div class="icon-item">
      <i class="ri-plug-line"></i>
      <p>Free Charging</p>
    </div>
    <div class="icon-item">
      <i class="ri-macbook-fill"></i>
      <p>Workspace</p>
    </div>
    <div class="icon-item">
      <i class="ri-movie-line"></i>
      <p>Movie Room</p>
    </div>
    <div class="icon-item">
      <i class="ri-cup-fill"></i>
      <p>Café</p>
    </div>
    <div class="icon-item">
      <i class="ri-temp-cold-line"></i>
      <p>Air Conditioning</p>
    </div>
    <div class="icon-item">
      <i class="ri-shield-check-line"></i>
      <p>Blackout Free</p>
    </div>
  </section>

  <section class="features">
    <h2>The perfect after-work treat.</h2>
    <div>
      <img src="images_aboutus/about5.jpg" alt="Feature 1">
      <img src="images_aboutus/about7.jpg" alt="Feature 2">
      <img src="images_aboutus/about6.jpg" alt="Feature 3">
    </div>
  </section>

  <section class="contact">
    <div class="info">
      <h2>Get in touch with us!</h2>
      <p>Dine & Visit us!</p>
      <p>We are located at Guinto Bldg, Gov Panotes Ave, DCN</p>
      <p>(near Daet Elementary School & Mabini Colleges).</p>

      <ul>
        <p>
        <h2>Operating Hours:</h2>
        </p>
        <li>Monday - Saturday: Cafe 9am–9pm, Study Hub 24hrs</li>
        <li>Sunday: 11am–8pm</li>
      </ul>
    </div>
    <div class="contact-details">
      <h3>Contact Details</h3>
      <p>Facebook: <a href="https://www.facebook.com/profile.php?id=61563864477780"
          target="_blank"><strong>RKYVE</a></strong></p>
      <p>Email: <strong><a href="mailto:rkyvestudycospacecafe@gmail.com"
            class="email">rkyvestudycospacecafe@gmail.com</a></strong></p>
      <div class="map">
        <h3>Find us here!</h3><a
          href="https://www.google.com/maps/place/RKYVE+Co-Working+Space+%26+Cafe/@14.1153072,122.9582819,19.3z/data=!4m6!3m5!1s0x3398af001dd44cbf:0xcccae41ffaafbbe2!8m2!3d14.1154527!4d122.9584479!16s%2Fg%2F11lp5x6ktf?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoJLDEwMjExMjM0SAFQAw%3D%3D"
          target="_blank">
          <img src="images_footer/map-example.png" alt="Map Location"></a>
      </div>
    </div>
  </section>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section">
        <h3><br>ADDRESS</h3>
        <a href="https://www.google.com/maps/place/RKYVE+Co-Working+Space+%26+Cafe/@14.1153072,122.9582819,19.3z/data=!4m6!3m5!1s0x3398af001dd44cbf:0xcccae41ffaafbbe2!8m2!3d14.1154527!4d122.9584479!16s%2Fg%2F11lp5x6ktf?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoJLDEwMjExMjM0SAFQAw%3D%3D"
          target="_blank">
          <img src="images_footer/map-example.png" alt="Map location" class="footer-map"></a>
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
          <li><a href="main.php">
              <p>Home</p>
            </a></li>
          <li><a href="menu.php">
              <p>Menu</p>
            </a></li>
          <li><a href="highlights.php">
              <p>Gallery</p>
            </a></li>
          <li><a href="#aboutus">
              <p>About us</p>
            </a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3><br><br><br>MESSAGE US</h3>
        <p><a href="mailto:rkyvestudycospacecafe@gmail.com" class="email">rkyvestudycospacecafe@gmail.com</a></p>
        <h4><br>FOLLOW US</h4>
        <div class="social-icons">
          <a href="https://www.facebook.com/profile.php?id=61563864477780" target="_blank"><img
              src="images_footer/facebook-icon.png" alt="Facebook"></a>
          <a href="https://www.instagram.com" target="_blank"><img src="images_footer/instagram-icon.png"
              alt="Instagram"></a>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2024 GAWA. All Rights Reserved.</p>
    </div>
  </footer>
  <div id="statusFormContainer" class="status-form-container" style="display: none;">
    <div class="status-checker">
      <span class="close-btn" onclick="closeStatusForm()">&times;</span>
      <h2>Check Your Booking Status</h2>
      <form id="statusForm" method="GET" action="status.php">
        <input type="text" name="booking_number" id="bookingNumber" placeholder="Enter Booking Number" required>
        <button type="submit">Check Status</button>
      </form>
      <div id="statusError" style="color: red; margin-top: 10px;"></div>
    </div>
  </div>

  <style>
    /* Popup container */
    .popup {
      display: none;
      position: fixed;
      top: 10%;
      left: 50%;
      transform: translateX(-50%);
      z-index: 1000;
    }

    .popup-content {
      background: #333;
      padding: 40px;
      border-radius: 10px;
      text-align: center;
      width: 350px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
      color: black;
      position: relative;
    }

    .popup-close {
      position: absolute;
      top: 5px;
      right: 5px;
      font-size: 24px;
      color: white;
      background: transparent;
      border: none;
      cursor: pointer;
    }

    .popup-close:hover {
      color: #f00;
    }

    .popup p {
      font-size: 18px;
      margin: 10px 0;
    }

    .popup strong {
      font-size: 24px;
      color: #ffcc00;
    }
  </style>

  <script src="checkstatus.js"></script>
  <script src="ham.js"></script>
</body>

</html>