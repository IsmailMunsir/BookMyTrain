<?php
session_start();
include('../includes/admin-sidebar.php');
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
      <p class="dashboard-subtitle">Monitor and control all train records within the system.</p>

      <!-- Stat Cards -->
      <div class="dashboard-cards">
        <div class="card glass" data-aos="zoom-in-up">
          <div class="icon-circle"><i class="fas fa-train"></i></div>
          <h2>Total Trains</h2>
          <p>120</p>
          <div class="progress-bar"><div class="bar" style="width: 85%;"></div></div>
        </div>
        <div class="card glass" data-aos="zoom-in-up" data-aos-delay="100">
          <div class="icon-circle"><i class="fas fa-route"></i></div>
          <h2>Active Routes</h2>
          <p>36</p>
          <div class="progress-bar"><div class="bar" style="width: 75%;"></div></div>
        </div>
      </div>

      <!-- Booking Chart -->
      <div class="chart-section" data-aos="fade-up">
        <h2>Train Booking Trend</h2>
        <canvas id="bookingChart"></canvas>
      </div>

      <!-- Recent Trains -->
      <div class="recent-bookings" data-aos="fade-up">
        <h2>Recently Added Trains</h2>
        <table class="booking-table">
          <thead>
            <tr>
              <th>Train ID</th>
              <th>Name</th>
              <th>Route</th>
              <th>Departure</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>T100</td>
              <td>Express 101</td>
              <td>Colombo - Kandy</td>
              <td>08:00 AM</td>
              <td><span class="badge success">Running</span></td>
            </tr>
            <tr>
              <td>T101</td>
              <td>Coastal Line</td>
              <td>Colombo - Galle</td>
              <td>09:45 AM</td>
              <td><span class="badge warning">Maintenance</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Quick Access -->
      <div class="quick-access" data-aos="fade-up">
        <h2>Quick Train Actions</h2>
        <div class="quick-buttons">
          <a href="add-train.php" class="btn-quick"><i class="fas fa-plus-circle"></i> Add Train</a>
          <a href="manage-routes.php" class="btn-quick"><i class="fas fa-route"></i> Manage Routes</a>
        </div>
      </div>

      <!-- System Notifications -->
      <div class="system-notifications" data-aos="fade-up">
        <h2>System Notifications</h2>
        <ul class="notifications-list">
          <li><i class="fas fa-bell"></i> New train added: <strong>Southern Express</strong> (T105)</li>
          <li><i class="fas fa-info-circle"></i> Route updated for: <strong>Hill Country</strong></li>
        </ul>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<!-- ✅ FULL CSS -->
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
.dashboard-container h1 {
  font-size: 2.4rem;
  color: #1e1e2f;
  display: flex;
  align-items: center;
  gap: 10px;
  margin-bottom: 8px;
}
.dashboard-container h1 i {
  color: #7e3af2;
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

/* Chart */
.chart-section {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  margin-bottom: 60px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}
.chart-section h2 {
  font-size: 1.6rem;
  margin-bottom: 20px;
  color: #333;
}
canvas#bookingChart {
  width: 100% !important;
  height: auto !important;
  max-height: 320px;
}

/* Table */
.recent-bookings {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  margin-bottom: 50px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
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
.badge {
  padding: 5px 10px;
  font-size: 0.8rem;
  color: white;
  border-radius: 20px;
}
.badge.success { background-color: #28a745; }
.badge.warning { background-color: #ffc107; }

/* Quick Buttons */
.quick-access {
  margin-bottom: 50px;
}
.quick-buttons {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
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

/* Notifications */
.system-notifications {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  margin-bottom: 60px;
}
.system-notifications h2 {
  font-size: 1.5rem;
  margin-bottom: 15px;
}
.notifications-list {
  list-style: none;
  padding-left: 0;
}
.notifications-list li {
  padding: 10px 0;
  border-bottom: 1px solid #eee;
  font-size: 0.95rem;
  color: #444;
  display: flex;
  align-items: center;
  gap: 10px;
}
.notifications-list li i {
  color: #7e3af2;
}

/* Footer */
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

<!-- ✅ JavaScript -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  AOS.init();
  const ctx = document.getElementById('bookingChart').getContext('2d');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Bookings',
        data: [50, 80, 110, 140, 130, 160],
        backgroundColor: 'rgba(126, 58, 242, 0.7)',
        borderRadius: 6
      }]
    },
    options: {
      responsive: true,
      plugins: { legend: { display: false }},
      scales: {
        y: {
          beginAtZero: true,
          ticks: { color: '#666' },
          grid: { color: '#eee' }
        },
        x: {
          ticks: { color: '#666' },
          grid: { display: false }
        }
      }
    }
  });
});
</script>
