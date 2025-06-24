<?php
session_start();
include('../includes/admin-sidebar.php');
include('../config/db.php');

// Fetch total trains
$totalTrains = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM trains"));

// Fetch all trains
$trainQuery = "SELECT * FROM trains ORDER BY created_at DESC";
$trainResult = mysqli_query($conn, $trainQuery);
?>

<!-- External Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="admin-layout">
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">
      <h1><i class="fas fa-train"></i> Manage <span>Trains</span></h1>
      <p class="dashboard-subtitle">View and control all train records in the system.</p>

      <!-- Stat Cards -->
      <div class="dashboard-cards">
        <div class="card glass" data-aos="zoom-in-up">
          <div class="icon-circle"><i class="fas fa-train"></i></div>
          <h2>Total Trains</h2>
          <p><?= $totalTrains ?></p>
          <div class="progress-bar"><div class="bar" style="width: 90%;"></div></div>
        </div>
        <div class="card glass" data-aos="zoom-in-up" data-aos-delay="100">
          <div class="icon-circle"><i class="fas fa-calendar-day"></i></div>
          <h2>Last Updated</h2>
          <p><?= date("F j, Y") ?></p>
          <div class="progress-bar"><div class="bar" style="width: 60%;"></div></div>
        </div>
      </div>

      <!-- Booking Chart -->
      <div class="chart-section" data-aos="fade-up">
        <h2>Train Booking Trend</h2>
        <canvas id="bookingChart"></canvas>
      </div>

      <!-- Trains Table -->
      <div class="recent-bookings" data-aos="fade-up">
        <h2>All Trains</h2>
        <table class="booking-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Route</th>
              <th>Departure</th>
              <th>Arrival</th>
              <th>Type</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
            <?php while($row = mysqli_fetch_assoc($trainResult)): ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['train_name']) ?></td>
                <td><?= htmlspecialchars($row['from_station']) ?> - <?= htmlspecialchars($row['to_station']) ?></td>
                <td><?= date("h:i A", strtotime($row['departure_time'])) ?></td>
                <td><?= date("h:i A", strtotime($row['arrival_time'])) ?></td>
                <td><?= htmlspecialchars($row['train_type']) ?></td>
                <td><?= date("M d, Y", strtotime($row['created_at'])) ?></td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <!-- Quick Access -->
      <div class="quick-access" data-aos="fade-up">
        <h2>Quick Actions</h2>
        <div class="quick-buttons">
          <a href="add-train.php" class="btn-quick"><i class="fas fa-plus-circle"></i> Add Train</a>
          <a href="manage-routes.php" class="btn-quick"><i class="fas fa-route"></i> Manage Routes</a>
        </div>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?= date("Y") ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<!-- CSS Styling -->
<style>
body, html {
  font-family: 'Segoe UI', sans-serif;
  margin: 0;
  padding: 0;
  background: #f4f6f8;
}
.admin-layout {
  display: flex;
  min-height: 100vh;
  padding-bottom: 80px;
}
.dashboard-section {
  margin-left: 260px;
  width: calc(100% - 260px);
  padding: 50px 60px 100px;
}
.dashboard-container {
  max-width: 1300px;
  margin: 0 auto;
}
h1 {
  font-size: 2.4rem;
  color: #1e1e2f;
  display: flex;
  align-items: center;
  gap: 10px;
}
.dashboard-subtitle {
  font-size: 1rem;
  color: #777;
  margin-bottom: 40px;
}
.dashboard-cards {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
  margin-bottom: 60px;
}
.card.glass {
  flex: 1;
  min-width: 280px;
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
}
.icon-circle {
  width: 60px;
  height: 60px;
  background: #7e3af2;
  color: white;
  font-size: 24px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  margin: 0 auto 15px;
}
.card h2 {
  font-size: 1.2rem;
  color: #444;
  margin-bottom: 10px;
}
.card p {
  font-size: 2rem;
  font-weight: bold;
  color: #7e3af2;
}
.progress-bar {
  width: 100%;
  height: 8px;
  background: #ddd;
  border-radius: 5px;
  overflow: hidden;
  margin-top: 10px;
}
.bar {
  height: 100%;
  background: linear-gradient(to right, #7e3af2, #9333ea);
}
.chart-section, .recent-bookings, .quick-access {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  margin-bottom: 50px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}
h2 {
  font-size: 1.5rem;
  margin-bottom: 20px;
}
.booking-table {
  width: 100%;
  border-collapse: collapse;
}
.booking-table th, .booking-table td {
  padding: 14px;
  text-align: left;
  border-bottom: 1px solid #eee;
}
.booking-table th {
  background: #f9f9f9;
  font-weight: 600;
  color: #444;
}
.quick-buttons {
  display: flex;
  gap: 20px;
}
.btn-quick {
  background: #7e3af2;
  color: white;
  padding: 12px 20px;
  border-radius: 10px;
  text-decoration: none;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  font-weight: 500;
}
.btn-quick:hover {
  background: #5f2db9;
}
.admin-footer {
  position: fixed;
  bottom: 0;
  left: 260px;
  width: calc(100% - 260px);
  background: #222;
  color: #eee;
  text-align: center;
  padding: 15px;
  font-size: 0.9rem;
}
</style>

<!-- JavaScript Chart Init -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  AOS.init();
  const ctx = document.getElementById('bookingChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Bookings',
        data: [60, 90, 130, 110, 170, 140],
        backgroundColor: 'rgba(126, 58, 242, 0.1)',
        borderColor: '#7e3af2',
        borderWidth: 2,
        fill: true,
        tension: 0.3
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false }},
      scales: {
        y: { beginAtZero: true, ticks: { color: '#666' }, grid: { color: '#eee' }},
        x: { ticks: { color: '#666' }, grid: { display: false }}
      }
    }
  });
});
</script>
