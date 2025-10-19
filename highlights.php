<?php
$conn = mysqli_connect('localhost', 'root', '', 'highlights_db');

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM top_highlights_table"; 
$select_top = mysqli_query($conn, $sql);

if (!$select_top) {
    die("Query failed: " . mysqli_error($conn));
}

$sql = "SELECT * FROM bottom_highlights_table"; 
$select_bottom = mysqli_query($conn, $sql);

if (!$select_bottom) {
    die("Query failed: " . mysqli_error($conn));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RKYVE</title>
    <link rel="stylesheet" href="highlights.css"> 
    <link rel="stylesheet" href="navbar.css"> 
    <link rel="stylesheet" href="footer.css"> 
    <link rel="stylesheet" href="checkstatus.css">
</head>
<body>
  <!-- Header Section -->
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
      <!-- Hamburger Icon -->
      <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- Navigation Links -->
      <nav id="nav-links">
        <a href="menu.php">MENU</a>
        <a href="#highlightsnew">GALLERY</a>
        <a href="aboutus.php">ABOUT US</a>
        <button class="btnCheckStatus-popup" onclick="openStatusForm()">CHECK STATUS</button>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <div class="banner" id="highlightsnew">
    <h1><i>A cozy and inviting space that offers a unique blend of modern charm.</i></h1>
  </div>

  <section class="section" id="comfort">
      <h2><strong>SEEK YOUR COMFORT.</strong></h2>
      <p>See the ambiance, feel the warmth.</p>
      <div class="horizontal-scroll-container">
          <button class="arrow left" id="leftArrowComfort">&lt;</button>
          <div class="horizontal-scroll" id="comfortScroll">
           <!-- Begin displaying top_images from the database -->
           <?php while($row = mysqli_fetch_assoc($select_top)){ ?>
                <div class="item-container">
                    <div class="item-image">
                        <img src="uploadedtop_img/<?php echo $row['top_image']; ?>" height="100" alt="">
                    </div>
                </div>
            <?php } ?>
            <!-- End displaying images -->
          </div>
          <button class="arrow right" id="rightArrowComfort">&gt;</button>
      </div>
  </section>

  <section class="section" id="highlights">
    <h2><strong>HIGHLIGHTS OF THE DAY</strong></h2>
    <p>More than just a cafe, connect with friends and fellow cafe lovers in our welcoming space.</p>

    <!-- Begin Horizontal Scroll Container -->
    <div class="horizontal-scroll-container">
        <button class="arrow left" id="leftArrowHighlights">&lt;</button>
        <div class="horizontal-scroll" id="highlightsScroll">

            <!-- Begin displaying bottom_images from the database -->
            <?php while($row = mysqli_fetch_assoc($select_bottom)){ ?>
                <div class="item-container">
                    <div class="item-image">
                        <img src="uploadedbottom_img/<?php echo $row['bottom_image']; ?>" height="100" alt="">
                    </div>
                </div>
            <?php } ?>

        </div>
        <button class="arrow right" id="rightArrowHighlights">&gt;</button>
    </div>
</section>

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
          <li><a href="menu.php"><p>Menu</p></a></li>
          <li><a href="#highlightsnew"><p>Gallery</p></a></li>
          <li><a href="Aboutus.php"><p>About us</p></a></li>
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

  <script src="checkstatus.js"></script>
  <script src="highlights.js"></script> 
  <script src="ham.js"></script>
</body>
</html>