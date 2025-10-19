<?php
require("adminlogin_connection.php"); 
session_start();

if (isset($_POST['login'])) {
  $query = "SELECT * FROM `admin_login` WHERE `Admin_Name` = '$_POST[AdminName]' AND `Admin_Password` = '$_POST[AdminPassword]'";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['AdminLoginId'] = $_POST['AdminName']; 
    header("Location: adminside.php");
    exit(); 
  } else {
    echo "<script>alert('Incorrect username or password');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Login</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="adminlogin.css">

</head>

<body>
  <div class="slideshow-container">
    <main id="home">
      <div class="home">

      </div>
  </div>
  </main>
  </div>

  <div class="wrapper">
    <div class="logreg-box">
      <div class="logreg-title">
        <h2>Login</h2>
      </div>
      <form method="POST">
        <div class="input-box">
          <input type="text" id="login-email" name="AdminName" required>
          <label>User</label>
        </div>
        <div class="input-box">
          <input type="password" id="login-password" name="AdminPassword" required>
          <label>Password</label>
        </div>
        <button type="submit" id="login" name="login" class="btn">Login</button>
        <div class="logreg-link">
        </div>
      </form>
    </div>
    <?php
    if (isset($_POST['login'])) {
      $query = "SELECT * FROM `admin_login` WHERE `Admin_Name` = '$_POST[AdminName]' AND `Admin_Password` = '$_POST[AdminPassword]'";
      $result = mysqli_query($con, $query);
      if (mysqli_num_rows($result) == 1) {
        echo session_start();
        $_SESSION['AdminLoginId'] = $_POST['AdminName'];
        header("location: adminside.php");
      } else {
        echo "<script>alert('Incorrect password');</script>";
      }
    }
    ?>
  </div>
  <script src="adminlogin.js"></script>
</body>

</html>