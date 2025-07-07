<?php
session_start();
include('../config/db.php');

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

include('../includes/header.php');

$user_id = $_SESSION['user_id'];

// Fetch user's bookings
$stmt = $conn->prepare("SELECT * FROM bookings WHERE user_id = ? ORDER BY travel_date DESC");
$stmt->bind_param("s", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<link rel="stylesheet" href="../assets/css/user/my-tickets.css" />
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

<section class="my-tickets" data-aos="fade-up">
  <div class="container">
    <h1><i class="fas fa-ticket-alt"></i> My Booked Tickets</h1>
    <p class="subtitle">All your train ticket bookings are listed below.</p>

    <div class="ticket-list">
      <?php if ($result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
          <?php
            $genderArray = json_decode($row['passenger_genders'], true);
            $genderDisplay = is_array($genderArray) ? implode(', ', array_map('ucfirst', $genderArray)) : 'Not Available';

            $statusDisplay = '';
            $statusClass = '';
            if ($row['status'] === 'confirmed') {
              $statusDisplay = '✅ Confirmed';
              $statusClass = 'status-confirmed';
            } elseif ($row['status'] === 'cancelled') {
              $statusDisplay = '❌ Cancelled';
              $statusClass = 'status-cancelled';
            } else {
              $statusDisplay = '⏳ Pending';
              $statusClass = 'status-pending';
            }
          ?>
          <div class="ticket-card" data-aos="zoom-in">
            <div class="ticket-info">
              <p><strong>Booking Date:</strong> <?= date('F j, Y, g:i a', strtotime($row['created_at'])) ?></p>
              <p><strong>Travel Date:</strong> <?= htmlspecialchars($row['travel_date']) ?></p>
              <p><strong>From:</strong> <?= htmlspecialchars($row['from_station']) ?></p>
              <p><strong>To:</strong> <?= htmlspecialchars($row['to_station']) ?></p>
              <p><strong>Class:</strong> <?= ucfirst(htmlspecialchars($row['class'])) ?> Class</p>
              <p><strong>Compartment:</strong> <?= htmlspecialchars($row['compartment']) ?></p>
              <p><strong>Seat Count:</strong> <?= htmlspecialchars($row['seat_count']) ?></p>
              <p><strong>Passenger Genders:</strong> <?= htmlspecialchars($genderDisplay) ?></p>
              <p><strong>Status:</strong> <span class="<?= $statusClass ?>"><?= $statusDisplay ?></span></p>
            </div>
            <div class="ticket-actions">
              <?php if ($row['status'] !== 'cancelled'): ?>
                <a href="cancel-ticket.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn-cancel">❌ Cancel Ticket</a>
              <?php endif; ?>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="no-booking-msg">🚫 You have not booked any tickets yet.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

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



<style>
  .my-tickets {
  padding: 70px 20px;
  background: #f4f7ff;
  font-family: 'Segoe UI', sans-serif;
}
.my-tickets .container {
  max-width: 1000px;
  margin: auto;
}
.my-tickets h1 {
  font-size: 2.5rem;
  color: #512da8;
  text-align: center;
  margin-bottom: 10px;
}
.my-tickets .subtitle {
  font-size: 1.1rem;
  color: #666;
  text-align: center;
  margin-bottom: 40px;
}
.ticket-list {
  display: flex;
  flex-direction: column;
  gap: 25px;
}
.ticket-card {
  background: #fff;
  padding: 25px;
  border-radius: 12px;
  box-shadow: 0 10px 20px rgba(0,0,0,0.08);
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  align-items: flex-start;
  transition: all 0.3s ease;
}
.ticket-card:hover {
  transform: translateY(-3px);
}
.ticket-info {
  flex: 1;
  min-width: 280px;
}
.ticket-info p {
  font-size: 1rem;
  margin: 6px 0;
  color: #333;
}
.ticket-info p strong {
  color: #555;
}
.ticket-actions {
  display: flex;
  align-items: center;
  justify-content: center;
  min-width: 180px;
  margin-top: 15px;
}
.btn-cancel {
  background-color: #d32f2f;
  color: #fff;
  padding: 10px 18px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}
.btn-cancel:hover {
  background-color: #b71c1c;
}
.status-confirmed {
  color: green;
  font-weight: bold;
}
.status-cancelled {
  color: #d32f2f;
  font-weight: bold;
}
.status-pending {
  color: orange;
  font-weight: bold;
}
.no-booking-msg {
  text-align: center;
  color: #999;
  font-size: 1.1rem;
  margin-top: 40px;
}
@media (max-width: 768px) {
  .ticket-card {
    flex-direction: column;
  }
  .ticket-actions {
    justify-content: flex-start;
  }
}

</style>
<?php include('../includes/footer.php'); ?>
