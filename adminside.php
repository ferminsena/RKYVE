<?php
$hostName = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "bookings_db";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$admin_dbName = "admin_account_db";
$conn_admin = new mysqli($hostName, $dbUser, $dbPassword, $admin_dbName);
if ($conn_admin->connect_error) {
    die("Connection failed: " . $conn_admin->connect_error);
}

$sql = "SELECT booking_number, name, email, phone_number, people, start_date, 
        TIME_FORMAT(start_time, '%H:%i') AS formatted_start_time, 
        TIME_FORMAT(end_time, '%H:%i') AS formatted_end_time, 
        status
        FROM booking";
$result = $conn->query($sql);
$sql_admin = "SELECT Admin_Name, Admin_Password FROM admin_login";
$result_admin = $conn_admin->query($sql_admin);

if ($result_admin->num_rows > 0) {
} else {
    echo "No admin found.";
}

@include 'highlights_config.php';

if (isset($_POST['add_top_image'])) {

    $top_image = $_FILES['top_image']['name'];
    $top_image_tmp_name = $_FILES['top_image']['tmp_name'];
    $top_image_folder = 'uploadedtop_img/' . $top_image;

    if (empty($top_image)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO top_highlights_table(top_image) VALUES('$top_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($top_image_tmp_name, $top_image_folder);
            echo "<script>alert('New image added successfully');</script>";
        } else {
            echo "<script>alert('Could not add the image');</script>";
        }
    }
    header("Location:" . $_SERVER['PHP_SELF']);
    exit();
}

@include 'highlights_config.php';

if (isset($_POST['add_bottom_image'])) {

    $bottom_image = $_FILES['bottom_image']['name'];
    $bottom_image_tmp_name = $_FILES['bottom_image']['tmp_name'];
    $bottom_image_folder = 'uploadedbottom_img/' . $bottom_image;

    if (empty($bottom_image)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO bottom_highlights_table(bottom_image) VALUES('$bottom_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($bottom_image_tmp_name, $bottom_image_folder);
            echo "<script>alert('New image added successfully');</script>";
        } else {
            echo "<script>alert('Could not add the image');</script>";
        }
    }

    header("Location:" . $_SERVER['PHP_SELF']);
    exit();
}

session_start();
if (!isset($_SESSION['AdminLoginId'])) {
    header("Location: main.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="adminside.css">
    <link rel="stylesheet" href="adminsidebooking.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.4.0/fonts/remixicon.css" rel="stylesheet" />
</head>

<body>
    <aside class="sidebar">
        <div class="header">
            <img src="images/logo.png" alt="Logo">
            <h1>RKYVE</h1>
        </div>

        <nav>
            <a href="javascript:void(0)" id="dashboard-link">
                <i class="ri-dashboard-line"></i>
                <p>dashboard</p>
            </a>
            <a href="javascript:void(0)" id="booking-link">
                <i class="ri-calendar-line"></i>
                <p>booking</p>
            </a>
            <a href="javascript:void(0)" id="useradmin-link">
                <i class="ri-user-line"></i>
                <p>User Admin</p>
            </a>
            <a href="javascript:void(0)" id="highlights-link">
                <i class="ri-star-line"></i>
                <p>Highlights</p>
            </a>
            <a href="javascript:void(0)" id="logout-link">
                <i class="ri-logout-box-line"></i>
                <p>log out </p>
            </a>
        </nav>
    </aside>
    <!-- Dashboard Section -->
    <main class="content">
        <section id="dashboard">
            <h2>Welcome to the Dashboard</h2>
            <div id="greeting-message"></div>
            <p>Here is an overview of the system.</p>
        </section>

        <section id="booking" style="display:none;">
            <h2>Booking Management</h2>
            <div class="table-container">
                <table>
                    <style>
                        table td {
                            text-transform: none;
                        }
                    </style>
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
                            <th>Actions</th>
                        </tr>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>
                        <td>{$row['booking_number']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone_number']}</td>
                        <td>{$row['people']}</td>
                        <td>{$row['start_date']}</td>
                        <td>{$row['formatted_start_time']}</td>
                        <td>{$row['formatted_end_time']}</td>
                        <td>{$row['status']}</td>
                <td>
                    <button onclick=\"showPopup(this)\">Action</button>
                </td>
                    </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>No bookings found</td></tr>";
                        }
                        $conn->close();
                        ?>
                    </thead>
                </table>
            </div>
        </section>
        <!-- User Admin Section -->
        <section id="useradmin" style="display:none;">
            <h2>User Management</h2>
            <div class="table-container">
                <table>
                    <style>
                        #useradmin-table td {
                            text-transform: none;
                        }
                    </style>
                    <thead>
                        <tr>

                            <th>Username</th>
                            <th>Password</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="useradmin-table">
                        <?php
                        if ($result_admin->num_rows > 0) {
                            while ($row_admin = $result_admin->fetch_assoc()) {
                                echo "<tr>
                                <td>{$row_admin['Admin_Name']}</td>
                                <td>{$row_admin['Admin_Password']}</td>
                                <td>
                                    <button onclick=\"editUser('{$row_admin['Admin_Name']}', '{$row_admin['Admin_Password']}')\">Edit</button>
                                </td>
                            </tr>";
                            }
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- Pop up edit User Account -->
        <div id="edit-user-modal"
            style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: 1px solid #ccc; padding: 20px; z-index: 1000;">
            <h3>Edit Admin Account</h3>
            <form id="edit-user-form">
                <style>
                    #admin-name,
                    #admin-password {
                        text-transform: none;
                    }
                </style>
                <label for="admin-name">Username:</label>
                <input type="text" id="admin-name" name="admin_name" autocapitalize="none" required><br><br>
                <label for="admin-password">Password:</label>
                <input type="text" id="admin-password" name="admin_password" autocapitalize="none" required><br><br>
                <input type="hidden" id="admin-old-name" autocapitalize="none" name="admin_old_name">
                <!-- Store the original username -->
                <button type="button" onclick="saveUserChanges()">Save Changes</button>
                <button type="button" onclick="closeEditModal()">Cancel</button>
            </form>
        </div>
        <div id="popup-overlay"
            style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;">
        </div>


        <!-- Highlights Section -->
        <section id="highlights" style="display:none;">
            <h2>Highlights</h2>
            <p>Content for highlights will be added here.</p>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="top_image" class="box">
                <input type="submit" class="btn" name="add_top_image" value="add top image">
            </form>

            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="bottom_image" class="box">
                <input type="submit" class="btn" name="add_bottom_image" value="add bottom image">
            </form>
            </div>
        </section>
    </main>
    </main>
    <div class="container"></div>
    <div id="popup-modal"
        style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; border: 1px solid #ccc; padding: 20px; z-index: 1000;">
        <h3>Manage Booking</h3>
        <button onclick="acceptBooking()">Accept</button>
        <button onclick="declineBooking()">Decline</button>
        <button onclick="closePopup()">Cancel</button>
    </div>
    <div id="popup-overlay"
        style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999;">
    </div>
    <script src="adminside.js"></script>
</body>

</html>