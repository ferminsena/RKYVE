function openStatusForm() {
    document.getElementById("statusFormContainer").style.display = "flex";
}

function closeStatusForm() {
    document.getElementById("statusFormContainer").style.display = "none";
    document.getElementById("statusError").textContent = ""; 
}

document.getElementById("checkStatusForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const bookingNumber = document.getElementById("bookingNumberInput").value;
    const statusError = document.getElementById("statusError");

    fetch(`statuspage.php?booking_number=${bookingNumber}`)
        .then(response => response.json())
        .then(data => {
            if (data.error) {
                statusError.textContent = "Invalid booking number. Please try again.";
            } else {
                window.location.href = `statuspage.php?booking_number=${bookingNumber}`;
            }
        })
        .catch(error => {
            console.error("Error validating booking number:", error);
            statusError.textContent = "An error occurred. Please try again later.";
        });
});

