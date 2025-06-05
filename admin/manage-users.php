<?php
session_start();
include('../includes/admin-sidebar.php'); // Sidebar
?>

<!-- External Styles & Scripts -->
<link rel="stylesheet" href="../assets/css/admin/manage-users.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/manage-users.js" defer></script>

<div class="admin-layout">
  <main class="user-section" data-aos="fade-up">
    <div class="user-container">
      <h1><i class="fas fa-users"></i> Manage <span>Users</span></h1>
      <p class="user-subtitle">View, ban, or update users registered in the system.</p>

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
            <!-- Sample Users -->
            <tr>
              <td>1</td>
              <td>Ismail Ahamed</td>
              <td>ismail@email.com</td>
              <td><span class="status badge active">Active</span></td>
              <td>
                <button class="btn action view" title="View"><i class="fas fa-eye"></i></button>
                <button class="btn action ban" title="Ban"><i class="fas fa-user-slash"></i></button>
              </td>
            </tr>
            <tr>
              <td>2</td>
              <td>Chathura Silva</td>
              <td>chathura@email.com</td>
              <td><span class="status badge banned">Banned</span></td>
              <td>
                <button class="btn action view" title="View"><i class="fas fa-eye"></i></button>
                <button class="btn action unban" title="Unban"><i class="fas fa-user-check"></i></button>
              </td>
            </tr>
            <!-- More users dynamically -->
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<script>
  AOS.init();
</script>

<style>
/* Base & Layout */
body, html {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #eef2f7, #ffffff);
}

.admin-layout {
  display: flex;
  padding-bottom: 70px;
}

.user-section {
  margin-left: 260px;
  padding: 60px 40px;
  width: calc(100% - 260px);
}

/* Header */
.user-container h1 {
  font-size: 2.8rem;
  color: #222;
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 10px;
}

.user-container h1 i {
  color: #7e3af2;
}

.user-subtitle {
  font-size: 1.1rem;
  color: #555;
  margin-bottom: 40px;
}

/* Table */
.user-table-wrapper {
  overflow-x: auto;
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 12px 25px rgba(0,0,0,0.08);
}

.user-table {
  width: 100%;
  border-collapse: collapse;
  min-width: 800px;
}

.user-table thead {
  background: #7e3af2;
  color: #fff;
}

.user-table th,
.user-table td {
  padding: 18px 22px;
  text-align: left;
  font-size: 0.95rem;
  border-bottom: 1px solid #f0f0f0;
}

.user-table tbody tr:hover {
  background-color: #f9f9ff;
}

/* Status Badges */
.status.badge {
  padding: 6px 14px;
  border-radius: 30px;
  font-weight: 600;
  font-size: 0.85rem;
  display: inline-block;
  text-align: center;
}

.status.active {
  background-color: #d1fae5;
  color: #065f46;
}

.status.banned {
  background-color: #fee2e2;
  color: #991b1b;
}

/* Buttons */
.btn.action {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 1.1rem;
  margin: 0 6px;
  transition: transform 0.25s ease, color 0.3s ease;
}

.btn.action:hover {
  transform: scale(1.25);
}

.btn.view { color: #2563eb; }
.btn.ban { color: #dc2626; }
.btn.unban { color: #16a34a; }

/* Footer */
.admin-footer {
  position: fixed;
  bottom: 0;
  left: 260px;
  width: calc(100% - 260px);
  background: #1f2937;
  color: #fff;
  text-align: center;
  padding: 15px 20px;
  font-size: 0.9rem;
  z-index: 999;
}

/* Responsive */
@media (max-width: 768px) {
  .user-section {
    margin-left: 0;
    width: 100%;
    padding: 20px;
  }

  .admin-footer {
    left: 0;
    width: 100%;
  }
}


</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  const viewButtons = document.querySelectorAll(".btn.view");
  const banButtons = document.querySelectorAll(".btn.ban");
  const unbanButtons = document.querySelectorAll(".btn.unban");

  viewButtons.forEach(button => {
    button.addEventListener("click", () => {
      alert("Viewing user details (modal popup feature can be added)");
    });
  });

  banButtons.forEach(button => {
    button.addEventListener("click", () => {
      const confirmBan = confirm("Are you sure you want to ban this user?");
      if (confirmBan) {
        alert("User banned successfully.");
        // Add your backend logic here
      }
    });
  });

  unbanButtons.forEach(button => {
    button.addEventListener("click", () => {
      const confirmUnban = confirm("Do you want to unban this user?");
      if (confirmUnban) {
        alert("User unbanned successfully.");
        // Add your backend logic here
      }
    });
  });
});

</script>