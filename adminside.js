function displayGreeting() {
    const greetingMessage = document.getElementById("greeting-message");
    const hour = new Date().getHours();
    let greetingText;

    if (hour < 12) {
        greetingText = "Good Morning, Admin!";
    } else if (hour < 18) {
        greetingText = "Good Afternoon, Admin!";
    } else {
        greetingText = "Good Evening, Admin!";
    }

    greetingMessage.textContent = greetingText;
}

function loadUsers() {
    const tableBody = document.getElementById("useradmin-table");
    tableBody.innerHTML = "";

    users.forEach((user, index) => {
        const row = document.createElement("tr");

        row.innerHTML = `
            <td>${user.id}</td>
            <td>${user.username}</td>
            <td>${user.password}</td>
            <td>
                <button onclick="editUser(${index})">Edit</button>
                <button onclick="deleteUser(${index})">Delete</button>
            </td>
        `;

        tableBody.appendChild(row);
    });
}
function showDashboard() {
    document.getElementById("dashboard").style.display = "block";
    document.getElementById("booking").style.display = "none";
    document.getElementById("useradmin").style.display = "none";
    document.getElementById("highlights").style.display = "none";
}
function showBooking() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("booking").style.display = "block";
    document.getElementById("useradmin").style.display = "none";
    document.getElementById("highlights").style.display = "none";
}

function showUserAdmin() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("booking").style.display = "none";
    document.getElementById("useradmin").style.display = "block";
    document.getElementById("highlights").style.display = "none";
}

function showHighlights() {
    document.getElementById("dashboard").style.display = "none";
    document.getElementById("booking").style.display = "none";
    document.getElementById("useradmin").style.display = "none";
    document.getElementById("highlights").style.display = "block";
}

document.getElementById("dashboard-link").addEventListener("click", showDashboard);
document.getElementById("booking-link").addEventListener("click", showBooking);
document.getElementById("useradmin-link").addEventListener("click", showUserAdmin);
document.getElementById("highlights-link").addEventListener("click", showHighlights);

function handleLogout() {
    if (confirm("Are you sure you want to log out?")) {
        fetch("logout.php", { method: "GET" })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    window.location.href = "main.php";
                } else {
                    alert("Logout failed. Please try again.");
                }
            })
            .catch((error) => {
                console.error("Error during logout:", error);
                alert("An error occurred. Please try again.");
            });
    }
}

document.getElementById("logout-link").addEventListener("click", handleLogout);

document.getElementById("logout-link").addEventListener("click", handleLogout);

document.addEventListener("DOMContentLoaded", () => {
    showDashboard();
    displayGreeting();
});

function showPopup(button) {
    document.getElementById('popup-modal').style.display = 'block';
    document.getElementById('popup-overlay').style.display = 'block';

    const bookingRow = button.closest('tr');
    const bookingId = bookingRow.cells[0].innerText;
    document.getElementById('popup-modal').setAttribute('data-booking-id', bookingId);
}

function closePopup() {
    document.getElementById('popup-modal').style.display = 'none';
    document.getElementById('popup-overlay').style.display = 'none';
}

function sendAction(action) {
    const bookingId = document.getElementById('popup-modal').getAttribute('data-booking-id');

    fetch('booking_action.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: `booking_id=${bookingId}&action=${action}`
    })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === 'Success') {
                alert(`${action.charAt(0).toUpperCase() + action.slice(1)} action performed successfully.`);

                const bookingRow = Array.from(document.querySelectorAll('tr')).find(row =>
                    row.cells[0].innerText === bookingId
                );
                if (bookingRow) {
                    const statusCell = bookingRow.cells[8];
                    statusCell.textContent = action === 'accept' ? 'Confirmed' : 'Cancelled';
                }

                closePopup();
            } else {
                alert('Error: ' + data);
            }
        })
        .catch(error => console.error('Error:', error));
}

function acceptBooking() { sendAction('accept'); }
function declineBooking() { sendAction('decline'); }

function editUser(username, password) {
    document.getElementById("admin-name").value = username;
    document.getElementById("admin-password").value = password;
    document.getElementById("admin-old-name").value = username;
    document.getElementById('edit-user-modal').style.display = 'block';
    document.getElementById('popup-overlay').style.display = 'block';
}

function saveUserChanges() {
    const username = document.getElementById("admin-name").value;
    const password = document.getElementById("admin-password").value;
    const oldName = document.getElementById("admin-old-name").value;

    fetch('update_admin_account.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: `admin_name=${username}&admin_password=${password}&admin_old_name=${oldName}`
    })
        .then(response => response.text())
        .then(data => {
            if (data.trim() === 'Success') {
                alert('Admin account updated successfully!');
                location.reload();
            } else {
                alert('Error updating admin account: ' + data);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
}

function closeEditModal() {
    document.getElementById('edit-user-modal').style.display = 'none';
    document.getElementById('popup-overlay').style.display = 'none';
}

