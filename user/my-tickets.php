<?php
include('../includes/header.php');
include('../config/db.php');

// Simulate logged-in user (replace with $_SESSION['user_id'] in real use)
$user_id = 1;

// Fetch bookings
$query = "SELECT * FROM bookings WHERE user_id = $user_id ORDER BY travel_date DESC";
$result = mysqli_query($conn, $query);
?>

<!-- ✅ External Styles -->
<link rel="stylesheet" href="../assets/css/user/my-tickets.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet"/>

<!-- ✅ Booked Tickets Section -->
<section class="my-tickets" data-aos="fade-up">
  <div class="container">
    <h1><i class="fas fa-ticket-alt"></i> My Booked Tickets</h1>
    <p class="subtitle">Below is the list of your booked tickets. You can cancel them if needed.</p>

    <div class="ticket-list">
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <?php $genderArray = json_decode($row['passenger_genders'], true); ?>
          <div class="ticket-card" data-aos="zoom-in">
            <div class="ticket-info">
              <p><strong>Booking Date:</strong> <?= date('F j, Y, g:i a', strtotime($row['booked_at'])) ?></p>
              <p><strong>Travel Date:</strong> <?= htmlspecialchars($row['travel_date']) ?></p>
              <p><strong>From:</strong> <?= htmlspecialchars($row['from_station']) ?></p>
              <p><strong>To:</strong> <?= htmlspecialchars($row['to_station']) ?></p>
              <p><strong>Class:</strong> <?= ucfirst($row['class']) ?> Class</p>
              <p><strong>Compartment:</strong> <?= htmlspecialchars($row['compartment']) ?></p>
              <p><strong>Seat Count:</strong> <?= $row['seat_count'] ?></p>
              <p><strong>Passenger Genders:</strong>
                <?= implode(', ', array_map('ucfirst', $genderArray)) ?>
              </p>
              <p><strong>Status:</strong> <span style="color: green;">Confirmed</span></p>
            </div>
            <div class="ticket-actions">
              <a href="cancel-ticket.php?id=<?= $row['id'] ?>" class="btn-cancel">Cancel Ticket</a>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p>No bookings found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- ✅ AOS & JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
  document.querySelectorAll('.btn-cancel').forEach(btn => {
    btn.addEventListener('click', function (e) {
      if (!confirm("Are you sure you want to cancel this ticket?")) {
        e.preventDefault();
      }
    });
  });
</script>

<!-- ✅ Inline Styles for Simplicity -->
<style>
.my-tickets {
  background: #f9f9ff;
  padding: 70px 20px;
  font-family: 'Segoe UI', sans-serif;
}
.my-tickets .container {
  max-width: 1000px;
  margin: auto;
  text-align: center;
}
.my-tickets h1 {
  font-size: 2.5rem;
  color: #7e3af2;
  margin-bottom: 10px;
}
.my-tickets .subtitle {
  font-size: 1.1rem;
  color: #444;
  margin-bottom: 40px;
}
.ticket-list {
  display: flex;
  flex-direction: column;
  gap: 30px;
}
.ticket-card {
  background: #fff;
  display: flex;
  justify-content: space-between;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
  text-align: left;
}
.ticket-card:hover {
  transform: translateY(-5px);
}
.ticket-info p {
  margin: 6px 0;
  font-size: 1rem;
  color: #333;
}
.ticket-actions {
  display: flex;
  align-items: center;
}
.btn-cancel {
  background-color: #e63946;
  color: #fff;
  padding: 10px 20px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}
.btn-cancel:hover {
  background-color: #c12834;
}
</style>

<?php include('../includes/footer.php'); ?>
