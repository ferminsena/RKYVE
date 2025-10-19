document.addEventListener("DOMContentLoaded", () => {
    populatePeopleOptions();
    populateTimeOptions("start-time");
    populateTimeOptions("end-time");
    setMinDate(); });

function setMinDate() {
    const startDateInput = document.getElementById("start-date");
    const today = new Date();

    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);

    const year = tomorrow.getFullYear();
    const month = String(tomorrow.getMonth() + 1).padStart(2, "0");
    const day = String(tomorrow.getDate()).padStart(2, "0");
    const minDate = `${year}-${month}-${day}`;

    startDateInput.setAttribute("min", minDate);
}

function populatePeopleOptions() {
    const peopleSelect = document.getElementById("people");
    for (let i = 1; i <= 12; i++) {
        const option = document.createElement("option");
        option.value = i;
        option.textContent = i;
        peopleSelect.appendChild(option);
    }
}

function populateTimeOptions(selectId) {
    const select = document.getElementById(selectId);
    const times = generateTimeOptions();
    times.forEach((time) => {
        const option = document.createElement("option");
        option.value = time;
        option.textContent = time;
        select.appendChild(option);
    });
}

function generateTimeOptions() {
    const times = [];
    const periods = ["AM", "PM"];

    periods.forEach((period) => {
        for (let hour = 0; hour < 12; hour++) {
            const displayHour = hour === 0 ? 12 : hour;
            times.push(`${displayHour}:00 ${period}`);
            times.push(`${displayHour}:30 ${period}`);
        }
    });

    return times;
}

function validateForm(event) {
    const nameInput = document.getElementById("name");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
    const peopleInput = document.getElementById("people");
    const startDateInput = document.getElementById("start-date");
    const startTimeInput = document.getElementById("start-time");
    const endTimeInput = document.getElementById("end-time");
    const errorMessage = document.getElementById("error-message");

    errorMessage.textContent = "";

    if (
        !nameInput.value ||
        !emailInput.value ||
        !phoneInput.value ||
        !peopleInput.value ||
        !startDateInput.value
    ) {
        errorMessage.textContent = "Please fill in all required fields.";
        return false;
    }

    const startDate = new Date(startDateInput.value);
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    if (startDate <= today) {
        errorMessage.textContent = "The selected date must start from tomorrow.";
        return false;
    }

    const startTime = startTimeInput.value;
    const endTime = endTimeInput.value;

    if (!startTime || !endTime) {
        errorMessage.textContent = "Please select both start and end times.";
        return false;
    }

    if (startTime >= endTime) {
        errorMessage.textContent =
            "End time must be later than start time for the same day.";
        return false;
    }

    const successMessage = document.createElement("div");
    successMessage.textContent = "Your booking was successful!";
    successMessage.style.color = "green";
    errorMessage.appendChild(successMessage);

    setTimeout(() => {
        history.back();
    }, 5000);

    return true; 
}
