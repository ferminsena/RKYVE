<?php
session_start()
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <link rel="stylesheet" href="bookform.css">
</head>
<body>
<form class="booking-form" action="bookformdatabase.php" method="post" onsubmit="return validateForm(event)">
        <h2>Book a Reservation</h2>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Your Full Name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Your Email Address" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" placeholder="Your Phone Number" required>
        </div>
        <div class="form-group">
            <label for="people">Number of People:</label>
            <select id="people" name="people" required>
                <option value="" disabled selected>Select Number of People</option>
            </select>
        </div>
        <div class="form-group">
            <label for="start-date">Date:</label>
            <input type="date" id="start-date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="start-time">Start Time:</label>
            <select id="start-time" name="start_time" required>
                <option value="" disabled selected>Select Start Time</option>
            </select>
        </div>
        <div class="form-group">
            <label for="end-time">End Time:</label>
            <select id="end-time" name="end_time" required>
                <option value="" disabled selected>Select End Time</option>
            </select>
        </div>
        <div id="error-message" class="error"></div>
        <div class="form-group">
            <input type="submit" value="Book Now">
        </div>
        <div class="back-button">
            <a href="javascript:history.back()">Back to Previous Page</a>
        </div>
    </form>
    <script src="bookformadmin.js"></script>
</body>
</html>