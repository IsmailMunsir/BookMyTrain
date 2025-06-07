<?php
session_start();
include('../includes/admin-sidebar.php');
?>

<!-- External Styles & Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="../assets/css/admin/profile.css">

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/profile.js" defer></script>

<div class="admin-layout">
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">

      <!-- Profile Info Card -->
      <div class="profile-card glass" data-aos="fade-up">
        <div class="profile-image">
          <img src="../assets/image/profile-avatar.png" alt="Admin Avatar" />
        </div>
        <div class="profile-details">
          <h1>Admin Profile</h1>
          <p class="tagline">Welcome back, <strong>Ahamed Ismail</strong>!</p>
          <div class="info">
            <p><i class="fas fa-user"></i> <strong>Name:</strong> Ahamed Ismail</p>
            <p><i class="fas fa-envelope"></i> <strong>Email:</strong> admin@example.com</p>
            <p><i class="fas fa-user-shield"></i> <strong>Role:</strong> Super Admin</p>
          </div>
        </div>
      </div>

    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<script>AOS.init();</script>


<style>
  /* General Reset */
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

/* Layout */
.admin-layout {
  display: flex;
  padding-bottom: 80px;
}

.dashboard-section {
  margin-left: 260px;
  width: calc(100% - 260px);
  padding: 60px 40px;
}

.dashboard-container {
  max-width: 900px;
  margin: 0 auto;
}

/* Profile Card */
.profile-card {
  background: #fff;
  border-radius: 20px;
  padding: 40px;
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  gap: 30px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s;
}

.profile-card:hover {
  transform: translateY(-5px);
}

.profile-image img {
  width: 150px;
  height: 150px;
  border-radius: 50%;
  object-fit: cover;
  border: 5px solid #7e3af2;
}

.profile-details {
  flex: 1;
  min-width: 260px;
}

.profile-details h1 {
  font-size: 2rem;
  color: #7e3af2;
  margin-bottom: 10px;
}

.profile-details .tagline {
  color: #666;
  font-size: 1rem;
  margin-bottom: 20px;
}

.profile-details .info p {
  font-size: 1.1rem;
  margin-bottom: 10px;
  color: #333;
}

.profile-details .info i {
  margin-right: 10px;
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
  console.log("Profile page loaded");
});

</script>