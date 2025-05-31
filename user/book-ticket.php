<?php include('../includes/header.php'); ?>

<!-- ✅ External CSS -->
<link rel="stylesheet" href="../assets/css/user/book-ticket.css">

<!-- ✅ FontAwesome & AOS Animation -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

<!-- ✅ Booking Section -->
<section class="book-ticket" data-aos="fade-up">
  <div class="container">
    <h1><i class="fas fa-ticket-alt"></i> Book Your Train Ticket</h1>
    <p class="tagline">Plan your journey with comfort, speed, and ease.</p>

    <form action="process-booking.php" method="POST" class="booking-form">
      <div class="input-group">
        <label for="from"><i class="fas fa-train"></i> From Station</label>
        <input type="text" id="from" name="from" placeholder="e.g. Colombo Fort" required>
      </div>
      <div class="input-group">
        <label for="to"><i class="fas fa-map-marker-alt"></i> To Station</label>
        <input type="text" id="to" name="to" placeholder="e.g. Kandy" required>
      </div>
      <div class="input-group">
        <label for="travel_date"><i class="fas fa-calendar-alt"></i> Travel Date</label>
        <input type="date" id="travel_date" name="travel_date" required>
      </div>
      <div class="input-group">
        <label for="class"><i class="fas fa-chair"></i> Class</label>
        <select name="class" id="class" required>
          <option value="" disabled selected>Select Class</option>
          <option value="first">First Class</option>
          <option value="second">Second Class</option>
          <option value="third">Third Class</option>
        </select>
      </div>
      <button type="submit" class="btn-primary pulse">🚆 Book Ticket</button>
    </form>
  </div>
</section>

<!-- ✅ AOS Animation Script -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<!-- ✅ Inline Style (You can move to ../assets/css/user/book-ticket.css) -->
<style>
.book-ticket {
  background: #f9f9ff;
  padding: 60px 20px;
  font-family: 'Segoe UI', sans-serif;
  overflow-x: hidden;
}
.book-ticket .container {
  max-width: 700px;
  margin: auto;
  background: #fff;
  padding: 40px;
  border-radius: 16px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
  animation: fadeIn 1s ease-in-out;
}
.book-ticket h1 {
  text-align: center;
  color: #7e3af2;
  font-size: 32px;
  margin-bottom: 10px;
}
.book-ticket .tagline {
  text-align: center;
  color: #555;
  font-size: 16px;
  margin-bottom: 30px;
}
.booking-form .input-group {
  margin-bottom: 20px;
}
.booking-form label {
  display: block;
  margin-bottom: 8px;
  font-weight: bold;
  color: #333;
}
.booking-form input,
.booking-form select {
  width: 100%;
  padding: 14px 16px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  transition: 0.3s;
}
.booking-form input:focus,
.booking-form select:focus {
  border-color: #7e3af2;
  box-shadow: 0 0 0 3px rgba(126, 58, 242, 0.2);
  outline: none;
}
.btn-primary {
  width: 100%;
  padding: 14px;
  font-size: 18px;
  border: none;
  border-radius: 8px;
  background-color: #7e3af2;
  color: white;
  font-weight: bold;
  cursor: pointer;
  transition: 0.3s ease-in-out;
}
.btn-primary:hover {
  background-color: #5e29c9;
}
.pulse {
  animation: pulse 2s infinite;
}
@keyframes pulse {
  0% { box-shadow: 0 0 0 0 rgba(126, 58, 242, 0.4); }
  70% { box-shadow: 0 0 0 15px rgba(126, 58, 242, 0); }
  100% { box-shadow: 0 0 0 0 rgba(126, 58, 242, 0); }
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
@media screen and (max-width: 600px) {
  .book-ticket .container {
    padding: 25px;
  }
  .btn-primary {
    font-size: 16px;
  }
}
</style>

<?php include('../includes/footer.php'); ?>

