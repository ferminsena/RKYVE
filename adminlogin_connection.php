<?php

$con = mysqli_connect("localhost", "root", "", "admin_account_db");


if (mysqli_connect_error()) {
    echo "Cannot connect";
} else {
    echo "Connected";
}
?>