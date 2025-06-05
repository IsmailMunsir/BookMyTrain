<?php
session_start();
include('../includes/admin-sidebar.php'); // Sidebar Include
?>

<!-- External Styles & Scripts -->
<link rel="stylesheet" href="../assets/css/admin/dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/dashboard.js" defer></script>

<div class="admin-layout">
  <!-- Sidebar already included -->

  <!-- Main Content -->
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">
      <h1><i class="fas fa-tachometer-alt"></i> Admin <span>Dashboard</span></h1>
      <p class="dashboard-subtitle">Your control panel for everything train-related.</p>

      <div class="dashboard-cards">
        <div class="card glass" data-aos="zoom-in">
          <h2>Total Trains</h2>
          <p>120</p>
        </div>
        <div class="card glass" data-aos="zoom-in" data-aos-delay="100">
          <h2>Total Users</h2>
          <p>540</p>
        </div>
        <div class="card glass" data-aos="zoom-in" data-aos-delay="200">
          <h2>Total Bookings</h2>
          <p>312</p>
        </div>
        <!-- ✅ Advanced Manage Bookings Card -->
        <div class="card glass booking-card" data-aos="zoom-in" data-aos-delay="300">
          <div class="booking-icon"><i class="fas fa-ticket-alt"></i></div>
          <h2>Manage Bookings</h2>
          <p>312 Active</p>
          <span class="badge">Live</span>
          <div class="progress-bar"><div class="progress-fill"></div></div>
        </div>
      </div>
    </div>
  </main>
</div>

<!-- Inline Style -->
<style>
  * {
    box-sizing: border-box;
  }

  body, html {
    margin: 0;
    padding: 0;
    min-height: 100vh;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to right, #ece9f1, #f9f8ff);
  }

  .admin-layout {
    display: flex;
    padding-bottom: 70px;
  }

  .sidebar {
    width: 260px;
    background: #7e3af2;
    color: #fff;
    padding: 30px 20px;
    position: fixed;
    top: 0;
    left: 0;
    height: 100vh;
    overflow-y: auto;
  }

  .sidebar-header {
    text-align: center;
    font-size: 1.5rem;
    margin-bottom: 30px;
  }

  .sidebar ul {
    list-style: none;
    padding: 0;
  }

  .sidebar ul li {
    margin: 18px 0;
  }

  .sidebar ul li a {
    display: flex;
    align-items: center;
    gap: 12px;
    color: white;
    padding: 10px 15px;
    text-decoration: none;
    border-radius: 8px;
    transition: 0.3s;
  }

  .sidebar ul li a:hover,
  .sidebar ul li a.active {
    background: rgba(255, 255, 255, 0.15);
  }

  .dashboard-section {
    margin-left: 260px;
    padding: 60px 40px;
    width: calc(100% - 260px);
  }

  .dashboard-container h1 {
    font-size: 2.5rem;
    color: #333;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .dashboard-container h1 i {
    color: #7e3af2;
  }

  .dashboard-subtitle {
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 40px;
  }

  .dashboard-cards {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
    gap: 30px;
  }

  .card.glass {
    background: rgba(255, 255, 255, 0.6);
    border-radius: 15px;
    padding: 25px 20px;
    backdrop-filter: blur(10px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: transform 0.3s ease;
  }

  .card.glass:hover {
    transform: translateY(-6px);
  }

  .card.glass h2 {
    font-size: 1.4rem;
    color: #444;
    margin-bottom: 10px;
  }

  .card.glass p {
    font-size: 2rem;
    color: #7e3af2;
    font-weight: bold;
  }

  /* ✅ Manage Bookings Card Styles */
  .booking-card {
    position: relative;
    background: linear-gradient(135deg, #ffffff80, #f4e9ff90);
    overflow: hidden;
  }

  .booking-icon {
    font-size: 2rem;
    color: #7e3af2;
    margin-bottom: 12px;
  }

  .booking-card .badge {
    position: absolute;
    top: 12px;
    right: 16px;
    background: #7e3af2;
    color: #fff;
    padding: 5px 10px;
    font-size: 0.75rem;
    border-radius: 50px;
    animation: pulse 1.5s infinite ease-in-out;
  }

  @keyframes pulse {
    0% { transform: scale(1); opacity: 1; }
    50% { transform: scale(1.1); opacity: 0.6; }
    100% { transform: scale(1); opacity: 1; }
  }

  .progress-bar {
    width: 100%;
    height: 8px;
    background: #ddd;
    border-radius: 20px;
    margin-top: 15px;
    overflow: hidden;
  }

  .progress-fill {
    width: 75%;
    height: 100%;
    background: #7e3af2;
    animation: fillUp 2s ease-in-out forwards;
  }

  @keyframes fillUp {
    from { width: 0%; }
    to { width: 75%; }
  }

  .admin-footer {
    position: fixed;
    bottom: 0;
    left: 260px;
    width: calc(100% - 260px);
    background: #222;
    color: white;
    text-align: center;
    padding: 15px;
    font-size: 0.9rem;
    z-index: 1000;
  }
</style>

<!-- JavaScript -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    console.log("Admin Dashboard Loaded");

    const cards = document.querySelectorAll(".card");
    cards.forEach(card => {
      card.addEventListener("click", () => {
        const title = card.querySelector("h2").textContent;
        alert(`You clicked on "${title}"`);
      });
    });
  });

  AOS.init();
</script>

<!-- Footer -->
<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>
