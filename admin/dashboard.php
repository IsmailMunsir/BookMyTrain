<?php
session_start();
include('../includes/admin-sidebar.php');
?>

<!-- External Styles & Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="../assets/css/admin/dashboard.css">

<!-- External Scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/admin/dashboard.js" defer></script>

<div class="admin-layout">
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">
      <h1><i class="fas fa-tachometer-alt"></i> Admin <span>Dashboard</span></h1>
      <p class="dashboard-subtitle">Your control panel for everything train-related.</p>

      <!-- Stat Cards -->
      <div class="dashboard-cards">
        <div class="card glass" data-aos="zoom-in-up">
          <div class="icon-circle"><i class="fas fa-train"></i></div>
          <h2>Total Trains</h2>
          <p>120</p>
          <div class="progress-bar"><div class="bar" style="width: 85%;"></div></div>
        </div>
        <div class="card glass" data-aos="zoom-in-up" data-aos-delay="100">
          <div class="icon-circle"><i class="fas fa-users"></i></div>
          <h2>Total Users</h2>
          <p>540</p>
          <div class="progress-bar"><div class="bar" style="width: 70%;"></div></div>
        </div>
        <div class="card glass" data-aos="zoom-in-up" data-aos-delay="200">
          <div class="icon-circle"><i class="fas fa-ticket-alt"></i></div>
          <h2>Total Bookings</h2>
          <p>312</p>
          <div class="progress-bar"><div class="bar" style="width: 90%;"></div></div>
        </div>
        <div class="card glass" data-aos="zoom-in-up" data-aos-delay="300">
          <div class="icon-circle"><i class="fas fa-comment-dots"></i></div>
          <h2>Feedbacks</h2>
          <p>85</p>
          <div class="progress-bar"><div class="bar" style="width: 60%;"></div></div>
        </div>
      </div>

      <!-- Booking Trend Chart -->
      <div class="chart-section" data-aos="fade-up">
        <h2>Booking Trend</h2>
        <canvas id="bookingChart"></canvas>
      </div>

      <!-- Recent Bookings -->
      <div class="recent-bookings" data-aos="fade-up">
        <h2>Recent Bookings</h2>
        <table class="booking-table">
          <thead>
            <tr>
              <th>Booking ID</th>
              <th>User</th>
              <th>Train</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>#B1234</td>
              <td>John Doe</td>
              <td>Express 101</td>
              <td>2025-06-08</td>
              <td><span class="badge success">Confirmed</span></td>
            </tr>
            <tr>
              <td>#B1235</td>
              <td>Ahamed I.</td>
              <td>Coastal Line</td>
              <td>2025-06-08</td>
              <td><span class="badge warning">Pending</span></td>
            </tr>
            <tr>
              <td>#B1236</td>
              <td>Kabilayn</td>
              <td>Hill Country</td>
              <td>2025-06-08</td>
              <td><span class="badge success">Confirmed</span></td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- Quick Access -->
      <div class="quick-access" data-aos="fade-up">
        <h2>Quick Access</h2>
        <div class="quick-buttons">
          <a href="add-train.php" class="btn-quick"><i class="fas fa-plus-circle"></i> Add Train</a>
          <a href="manage-users.php" class="btn-quick"><i class="fas fa-users"></i> Manage Users</a>
          <a href="manage-bookings.php" class="btn-quick"><i class="fas fa-ticket-alt"></i> View Bookings</a>
        </div>
      </div>

      <!-- System Notifications -->
      <div class="system-notifications" data-aos="fade-up">
        <h2>System Notifications</h2>
        <ul class="notifications-list">
          <li><i class="fas fa-info-circle"></i> New train added: <strong>Coastal Express</strong> (ID: T120)</li>
          <li><i class="fas fa-user-plus"></i> New user registered: <strong>ismail_dev@gmail.com</strong></li>
          <li><i class="fas fa-ticket-alt"></i> Booking #B1289 marked as <strong>Cancelled</strong>.</li>
        </ul>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<script>AOS.init();</script>



<style>
/* Reset & Layout */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #f3f4f6, #ffffff);
  color: #333;
  min-height: 100vh;
}

.admin-layout {
  display: flex;
  padding-bottom: 80px;
}

/* Main Dashboard */
.dashboard-section {
  margin-left: 260px;
  width: calc(100% - 260px);
  padding: 60px 40px;
}

.dashboard-container h1 {
  font-size: 2.5rem;
  display: flex;
  align-items: center;
  gap: 10px;
  color: #222;
}

.dashboard-container h1 i {
  color: #7e3af2;
}

.dashboard-subtitle {
  font-size: 1.1rem;
  color: #666;
  margin-bottom: 40px;
}

/* Stat Cards */
.dashboard-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}

.card.glass {
  background: rgba(255, 255, 255, 0.6);
  border-radius: 20px;
  padding: 30px 20px;
  text-align: center;
  backdrop-filter: blur(10px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  transition: 0.3s ease;
}

.card.glass:hover {
  transform: translateY(-5px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

.icon-circle {
  width: 60px;
  height: 60px;
  background: #7e3af2;
  border-radius: 50%;
  color: white;
  font-size: 1.6rem;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto 15px;
  box-shadow: 0 6px 18px rgba(126, 58, 242, 0.4);
}

.card h2 {
  font-size: 1.2rem;
  color: #444;
  margin-bottom: 10px;
}

.card p {
  font-size: 2rem;
  font-weight: 600;
  color: #7e3af2;
}

.progress-bar {
  width: 100%;
  height: 8px;
  background: #ddd;
  border-radius: 5px;
  overflow: hidden;
  margin-top: 15px;
}

.bar {
  height: 100%;
  background: linear-gradient(to right, #7e3af2, #9333ea);
  animation: grow 1.5s ease forwards;
}

@keyframes grow {
  0% { width: 0; }
  100% { width: 100%; }
}

/* Chart Section */
.chart-section {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
  margin-bottom: 50px;
}

.chart-section h2 {
  margin-bottom: 20px;
  font-size: 1.8rem;
  color: #333;
}

/* Recent Bookings Table */
.recent-bookings {
  background: #fff;
  padding: 30px;
  border-radius: 20px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  margin-bottom: 50px;
}

.booking-table {
  width: 100%;
  border-collapse: collapse;
}

.booking-table th,
.booking-table td {
  padding: 14px 12px;
  text-align: left;
  border-bottom: 1px solid #eee;
  font-size: 0.95rem;
}

.booking-table th {
  background: #f9f9f9;
  font-weight: 600;
  color: #444;
}

.badge {
  padding: 5px 10px;
  border-radius: 20px;
  font-size: 0.8rem;
  color: #fff;
}

.badge.success { background: #28a745; }
.badge.warning { background: #f0ad4e; }
.badge.danger  { background: #dc3545; }

/* Quick Access */
.quick-access h2,
.system-notifications h2 {
  font-size: 1.6rem;
  margin-bottom: 20px;
}

.quick-buttons {
  display: flex;
  gap: 20px;
  flex-wrap: wrap;
}

.btn-quick {
  background: #7e3af2;
  color: #fff;
  padding: 12px 20px;
  border-radius: 10px;
  text-decoration: none;
  display: flex;
  align-items: center;
  gap: 10px;
  font-weight: 500;
  transition: 0.3s;
}

.btn-quick:hover {
  background: #5f2db9;
}

/* Notifications */
.system-notifications {
  background: #fff;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.07);
  margin-bottom: 50px;
}

.notifications-list {
  list-style: none;
  padding: 0;
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
  font-size: 0.95rem;
  z-index: 100;
}


</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const ctx = document.getElementById('bookingChart').getContext('2d');
  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
      datasets: [{
        label: 'Bookings',
        data: [50, 80, 100, 120, 90, 140],
        borderColor: '#7e3af2',
        backgroundColor: 'rgba(126, 58, 242, 0.1)',
        fill: true,
        tension: 0.4,
        pointRadius: 4,
        pointBackgroundColor: '#7e3af2'
      }]
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { color: '#555' }
        },
        x: {
          ticks: { color: '#555' }
        }
      }
    }
  });
});


</script>