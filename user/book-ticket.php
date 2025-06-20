<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Book Ticket</title>
  <link rel="stylesheet" href="../assets/css/user/book-ticket.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"/>
  <style>
    .ticket-booking-section { background: #f9f9ff; padding: 60px 20px; font-family: 'Segoe UI', sans-serif; }
    .ticket-booking-container { max-width: 700px; margin: auto; background: #fff; padding: 40px; border-radius: 16px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08); }
    .ticket-booking-input-group { margin-bottom: 20px; }
    .ticket-booking-input-group label { display: block; margin-bottom: 8px; font-weight: bold; }
    .ticket-booking-container input,
    .ticket-booking-container select { width: 100%; padding: 14px; border-radius: 8px; border: 1px solid #ccc; font-size: 16px; }
    .ticket-booking-container input:focus,
    .ticket-booking-container select:focus { border-color: #7e3af2; outline: none; box-shadow: 0 0 0 3px rgba(126,58,242,0.2); }
    .ticket-booking-btn-primary { width: 100%; padding: 14px; font-size: 18px; background-color: #7e3af2; color: white; font-weight: bold; border: none; border-radius: 8px; cursor: pointer; }
    .ticket-booking-btn-primary:hover { background-color: #5e29c9; }
    .ticket-booking-btn-group { display: flex; gap: 10px; }
    .pulse { animation: pulse 2s infinite; }
    @keyframes pulse { 0% { box-shadow: 0 0 0 0 rgba(126,58,242,0.4); } 70% { box-shadow: 0 0 0 15px rgba(126,58,242,0); } 100% { box-shadow: 0 0 0 0 rgba(126,58,242,0); } }
    .seat-counter { font-weight: bold; color: #333; }
    .gender-row { display: flex; gap: 20px; align-items: center; margin-bottom: 10px; }
    .gender-row label { margin: 0; font-weight: normal; }
  </style>
</head>
<body>

<?php include('../includes/header.php'); ?>

<section class="ticket-booking-section" data-aos="fade-up">
  <div class="ticket-booking-container">
    <h1><i class="fas fa-ticket-alt"></i> Book Your Train Ticket</h1>
    <p class="tagline">Start by entering your journey details</p>

    <form action="process-booking.php" method="POST" class="booking-form">
      <div id="step-1">
        <div class="ticket-booking-input-group">
          <label><i class="fas fa-train"></i> From Station</label>
          <input type="text" name="from" placeholder="e.g. Colombo Fort" required />
        </div>
        <div class="ticket-booking-input-group">
          <label><i class="fas fa-map-marker-alt"></i> To Station</label>
          <input type="text" name="to" placeholder="e.g. Kandy" required />
        </div>
        <div class="ticket-booking-input-group">
          <label><i class="fas fa-calendar-alt"></i> Travel Date</label>
          <input type="date" name="travel_date" required />
        </div>
        <button type="button" class="ticket-booking-btn-primary pulse" onclick="showStep2()">⬆️ Continue</button>
      </div>

      <div id="step-2" style="display:none;">
        <div class="ticket-booking-input-group">
          <label><i class="fas fa-chair"></i> Class</label>
          <select name="class" id="classSelect" required onchange="updateCompartments()">
            <option value="" disabled selected>Select Class</option>
            <option value="first">First Class</option>
            <option value="second">Second Class</option>
            <option value="third">Third Class</option>
          </select>
        </div>

        <div class="ticket-booking-input-group">
          <label><i class="fas fa-th-large"></i> Compartment</label>
          <select name="compartment" id="compartmentSelect" required>
            <option value="" disabled selected>Select Compartment</option>
          </select>
        </div>

        <div class="ticket-booking-input-group">
          <label><i class="fas fa-th"></i> Seat Count (Max: 15)</label>
          <input type="number" id="manualSeatCount" name="selected_seats" min="1" max="15" placeholder="Enter number of seats" required />
          <p class="seat-counter"><span id="selectedCount">0</span> seat(s) selected</p>
        </div>

        <div class="ticket-booking-input-group">
          <label><i class="fas fa-users"></i> Passenger Genders</label>
          <div id="genderInputsContainer"></div>
        </div>

        <div class="ticket-booking-btn-group">
          <button type="button" class="ticket-booking-btn-primary pulse" onclick="goBackStep1()">⬅️ Back</button>
          <button type="submit" class="ticket-booking-btn-primary pulse">✅ Book Ticket</button>
        </div>
      </div>
    </form>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>AOS.init();</script>

<script>
function showStep2() {
  const from = document.querySelector('input[name="from"]');
  const to = document.querySelector('input[name="to"]');
  const travelDate = document.querySelector('input[name="travel_date"]');

  if (!from.value.trim() || !to.value.trim() || !travelDate.value.trim()) {
    alert("Please fill in all fields before continuing.");
    return;
  }

  document.getElementById('step-1').style.display = 'none';
  document.getElementById('step-2').style.display = 'block';
}

function goBackStep1() {
  document.getElementById('step-2').style.display = 'none';
  document.getElementById('step-1').style.display = 'block';
}

function updateCompartments() {
  const classSelect = document.getElementById("classSelect");
  const compartmentSelect = document.getElementById("compartmentSelect");

  const compartments = {
    first: ["A", "B", "C", "D"],
    second: ["D", "E", "F", "G"],
    third: ["H", "I", "J", "K"]
  };

  const selectedClass = classSelect.value;
  const options = compartments[selectedClass] || [];

  compartmentSelect.innerHTML = '<option value="" disabled selected>Select Compartment</option>';
  options.forEach(c => {
    const opt = document.createElement("option");
    opt.value = c;
    opt.textContent = `Compartment ${c}`;
    compartmentSelect.appendChild(opt);
  });
}

window.addEventListener("DOMContentLoaded", () => {
  const seatCountInput = document.getElementById("manualSeatCount");
  const seatCountDisplay = document.getElementById("selectedCount");
  const genderContainer = document.getElementById("genderInputsContainer");

  seatCountInput.addEventListener("input", () => {
    let count = parseInt(seatCountInput.value);
    if (isNaN(count) || count < 0) count = 0;
    if (count > 15) {
      alert("You can select a maximum of 15 seats.");
      seatCountInput.value = 15;
      count = 15;
    }
    seatCountDisplay.innerText = count;

    genderContainer.innerHTML = "";
    for (let i = 1; i <= count; i++) {
      const div = document.createElement("div");
      div.className = "gender-row";
      div.innerHTML = `
        <label>Passenger ${i}:</label>
        <label><input type="radio" name="gender_seat_${i}" value="male" required> Male</label>
        <label><input type="radio" name="gender_seat_${i}" value="female" required> Female</label>
      `;
      genderContainer.appendChild(div);
    }
  });
});
</script> 

<?php include('../includes/footer.php'); ?>
</body>
</html>
