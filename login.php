<?php
session_start();
$adminEmail = "admin@example.com";
$adminPassword = "securepassword";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email === $adminEmail && $password === $adminPassword) {
        $_SESSION["loggedIn"] = true;
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Invalid login credentials.";
    }
}
?>
