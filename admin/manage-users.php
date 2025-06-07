<?php
session_start();
include('../includes/admin-sidebar.php');
?>

<!-- External Libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="../assets/css/admin/manage-users.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../assets/js/admin/manage-users.js" defer></script>

<div class="admin-layout">
  <main class="user-section" data-aos="fade-up">
    <div class="user-container">
      <h1><i class="fas fa-users"></i> Manage <span>Users</span></h1>
      <p class="user-subtitle">View, ban, or update users registered in the system.</p>

      <!-- Dashboard Cards -->
      <div class="dashboard-cards" data-aos="fade-up">
        <div class="card glass">
          <div class="icon-circle"><i class="fas fa-users"></i></div>
          <h2>Total Users</h2>
          <p>230</p>
        </div>
        <div class="card glass">
          <div class="icon-circle"><i class="fas fa-user-check"></i></div>
          <h2>Active Users</h2>
          <p>180</p>
        </div>
        <div class="card glass">
          <div class="icon-circle"><i class="fas fa-user-slash"></i></div>
          <h2>Banned Users</h2>
          <p>50</p>
        </div>
      </div>

      <!-- Controls -->
      <div class="user-controls" data-aos="fade-up">
        <input type="text" placeholder="Search by name or email..." />
        <select>
          <option value="all">All Users</option>
          <option value="active">Active</option>
          <option value="banned">Banned</option>
        </select>
        <button class="btn-refresh"><i class="fas fa-sync-alt"></i> Refresh</button>
      </div>

      <!-- Users Table -->
      <div class="user-table-wrapper" data-aos="fade-up">
        <table class="user-table">
          <thead>
            <tr>
              <th>#ID</th>
              <th>Full Name</th>
              <th>Email</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Ismail Ahamed</td>
              <td>ismail@email.com</td>
              <td><span class="status badge active">Active</span></td>
              <td>
                <button class="btn action view"><i class="fas fa-eye"></i></button>
                <button class="btn action ban"><i class="fas fa-user-slash"></i></button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Chathura Silva</td>
              <td>chathura@email.com</td>
              <td><span class="status badge banned">Banned</span></td>
              <td>
                <button class="btn action view"><i class="fas fa-eye"></i></button>
                <button class="btn action unban"><i class="fas fa-user-check"></i></button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>


<style>
  /* Base Reset */
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
  padding-bottom: 100px;
}
.user-section {
  margin-left: 260px;
  padding: 50px 40px;
  width: calc(100% - 260px);
}
h1, h2 {
  font-weight: bold;
  color: #222;
}
.user-container h1 {
  font-size: 2.5rem;
  display: flex;
  align-items: center;
  gap: 12px;
}
.user-container h1 i {
  color: #7e3af2;
}
.user-subtitle {
  font-size: 1rem;
  color: #555;
  margin-bottom: 30px;
}

/* Dashboard Cards */
.dashboard-cards {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
  gap: 30px;
  margin-bottom: 50px;
}
.card.glass {
  background: #fff;
  border-radius: 20px;
  padding: 30px 20px;
  text-align: center;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
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
}
.card h2 {
  font-size: 1.2rem;
  margin-bottom: 10px;
}
.card p {
  font-size: 2rem;
  font-weight: 600;
  color: #7e3af2;
}

/* Controls */
.user-controls {
  display: flex;
  flex-wrap: wrap;
  gap: 14px;
  align-items: center;
  margin-bottom: 25px;
}
.user-controls input,
.user-controls select,
.user-controls button {
  height: 42px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 0.95rem;
  padding: 0 14px;
}
.user-controls input {
  width: 260px;
}
.user-controls select {
  width: 160px;
}
.btn-refresh {
  background-color: #7e3af2;
  color: white;
  border: none;
  cursor: pointer;
  font-weight: 600;
}
.btn-refresh:hover {
  background-color: #5a28c7;
}

/* Table */
.user-table-wrapper {
  overflow-x: auto;
  border-radius: 10px;
  background: #fff;
  box-shadow: 0 12px 24px rgba(0,0,0,0.06);
  margin-bottom: 50px;
}
.user-table {
  width: 100%;
  min-width: 850px;
  border-collapse: collapse;
}
.user-table thead {
  background: #7e3af2;
  color: white;
}
.user-table th, .user-table td {
  padding: 16px 20px;
  text-align: left;
  font-size: 0.95rem;
  border-bottom: 1px solid #eee;
}
.user-table tbody tr:hover {
  background: #f9f9ff;
}

/* Status */
.status.badge {
  padding: 5px 12px;
  border-radius: 20px;
  font-weight: bold;
  font-size: 0.85rem;
  display: inline-block;
  text-align: center;
}
.status.active {
  background: #d1fae5;
  color: #065f46;
}
.status.banned {
  background: #fee2e2;
  color: #991b1b;
}

/* Action Buttons */
.btn.action {
  border: none;
  background: transparent;
  font-size: 1.1rem;
  margin: 0 6px;
  cursor: pointer;
  transition: transform 0.2s ease;
}
.btn.action:hover {
  transform: scale(1.2);
}
.btn.view {
  color: #2563eb;
}
.btn.ban {
  color: #dc2626;
}
.btn.unban {
  color: #16a34a;
}

/* Footer */
.admin-footer {
  position: fixed;
  bottom: 0;
  left: 260px;
  width: calc(100% - 260px);
  background: #1f2937;
  color: #fff;
  text-align: center;
  padding: 14px 20px;
  font-size: 0.9rem;
  z-index: 999;
}

/* Responsive */
@media (max-width: 768px) {
  .user-section {
    margin-left: 0;
    width: 100%;
    padding: 30px 20px;
  }
  .admin-footer {
    left: 0;
    width: 100%;
  }
  .user-controls {
    flex-direction: column;
    align-items: stretch;
  }
}

</style>

<script>
  AOS.init();

document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".btn.view").forEach(btn => {
    btn.addEventListener("click", () => alert("Viewing user details..."));
  });

  document.querySelectorAll(".btn.ban").forEach(btn => {
    btn.addEventListener("click", () => {
      if (confirm("Are you sure to ban this user?")) {
        alert("User banned.");
      }
    });
  });

  document.querySelectorAll(".btn.unban").forEach(btn => {
    btn.addEventListener("click", () => {
      if (confirm("Are you sure to unban this user?")) {
        alert("User unbanned.");
      }
    });
  });
});

</script>