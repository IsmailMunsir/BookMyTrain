
<link rel="stylesheet" href="../assets/css/admin/dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/dashboard.js" defer></script>

<div class="admin-layout">
  <!-- Sidebar -->
  <aside class="sidebar">
  <div class="sidebar-header">
    <h2><i class="fas fa-train"></i> BookMyTrain</h2>
  </div>
  <ul>
    <li><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
    <li><a href="add-train.php"><i class="fas fa-plus-circle"></i> Add Train</a></li>
    <li><a href="manage-trains.php"><i class="fas fa-train"></i> Manage Trains</a></li>
    <li><a href="manage-users.php"><i class="fas fa-users"></i> Manage Users</a></li>
    <li><a href="manage-bookings.php"><i class="fas fa-ticket-alt"></i> Manage Bookings</a></li>
    <li><a href="create-admin.php"><i class="fas fa-user-plus"></i> Create Admin</a></li>
    <li><a href="profile.php"><i class="fas fa-user-cog"></i> Profile</a></li>
    <li><a href="../auth/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
  </ul>
</aside>


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
        <div class="card glass" data-aos="zoom-in" data-aos-delay="300">
          <h2>Feedbacks</h2>
          <p>85</p>
        </div>
      </div>
    </div>
  </main>
</div>


<style>
  /* Reset and Global Layout */
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
  padding-bottom: 70px; /* space for footer */
}

/* Sidebar */
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

/* Main Dashboard Area */
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

/* Glassmorphism Card Style */
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

/* Sticky Footer */
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

</script>
<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<script>AOS.init();</script>
