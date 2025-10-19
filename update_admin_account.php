<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $newAdminName = $_POST['admin_name'];
    $newAdminPassword = $_POST['admin_password'];
    $oldAdminName = $_POST['admin_old_name'];

    $hostName = "localhost";
    $dbUser = "root";
    $dbPassword = "";
    $dbName = "admin_account_db";
    $conn_admin = new mysqli($hostName, $dbUser, $dbPassword, $dbName);

    if ($conn_admin->connect_error) {
        die("Connection failed: " . $conn_admin->connect_error);
    }

    $sql = "UPDATE admin_login SET Admin_Name=?, Admin_Password=? WHERE Admin_Name=?";
    $stmt = $conn_admin->prepare($sql);
    $stmt->bind_param("sss", $newAdminName, $newAdminPassword, $oldAdminName);

    if ($stmt->execute()) {
        echo 'Success';
    } else {
        echo 'Error: ' . $stmt->error;
    }

    $stmt->close();
    $conn_admin->close();
}
?>
