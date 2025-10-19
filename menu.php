<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RKYVE</title>
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="checkstatus.css">
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
        <a href="#menu">MENU</a>
        <a href="highlights.php">GALLERY</a>
        <a href="aboutus.php">ABOUT US</a>
        <button class="btnCheckStatus-popup" onclick="openStatusForm()">CHECK STATUS</button>
      </nav>
    </div>
  </header>

<main id="menu">
    <div class="menu">
        <link rel="stylesheet" href="menu.css">
        <div class="section-title">
            <select id="sectionDropdown" onchange="changeSectionDropdown()">
            </select>
        </div>
        <div class="content">
            <div class="menu-items" id="menuItems">
            </div>
            <div class="display">
                <img id="itemImage" src="" alt="Item Image">
                <div id="itemName">Chocolate Milkshake</div>
                <div id="itemPrice">₱150</div>
                <p id="itemDescription" class="item-description">This is a short description of the item, explaining its key features.</p>
            </div>
        </div>
    </div>
</main>

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-section">
        <h3><br>ADDRESS</h3>
        <a href="https://www.google.com/maps/place/RKYVE+Co-Working+Space+%26+Cafe/@14.1153072,122.9582819,19.3z/data=!4m6!3m5!1s0x3398af001dd44cbf:0xcccae41ffaafbbe2!8m2!3d14.1154527!4d122.9584479!16s%2Fg%2F11lp5x6ktf?entry=ttu&g_ep=EgoyMDI0MTEyNC4xIKXMDSoJLDEwMjExMjM0SAFQAw%3D%3D" target="_blank">
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
          <li><a href="main.php"><p>Home</p></a></li>
          <li><a href="#menu"><p>Menu</p></a></li>
          <li><a href="highlights.php"><p>Gallery</p></a></li>
          <li><a href="aboutus.php"><p>About us</p></a></li>
        </ul>
      </div>
      <div class="footer-section">
        <h3><br><br><br>CONTACT US</h3>
        <p><a href="mailto:rkyvestudycospacecafe@gmail.com" class="email">rkyvestudycospacecafe@gmail.com</a></p>
        <h4><br>FOLLOW US</h4>
        <div class="social-icons">
          <a href="https://www.facebook.com/profile.php?id=61563864477780" target="_blank"><img src="images_footer/facebook-icon.png" alt="Facebook"></a>
          <a href="https://www.instagram.com" target="_blank"><img src="images_footer/instagram-icon.png" alt="Instagram"></a>
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

  <script src="menu.js"></script>
  <script src="ham.js"></script>
  <script src="checkstatus.js"></script>
</body>
</html>
