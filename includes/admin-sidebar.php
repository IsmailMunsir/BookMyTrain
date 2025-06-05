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


<style>
  /* Admin Sidebar Styling */
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
  z-index: 100;
}

.sidebar-header {
  text-align: center;
  font-size: 1.5rem;
  margin-bottom: 30px;
}

.sidebar ul {
  list-style: none;
  padding: 0;
  margin: 0;
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
  transition: background 0.3s ease;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
  background: rgba(255, 255, 255, 0.15);
}

.sidebar ul li a i {
  font-size: 1rem;
}

</style>

<script>
  // JS for Admin Sidebar (optional interactivity)
document.addEventListener("DOMContentLoaded", () => {
  const links = document.querySelectorAll(".sidebar ul li a");

  links.forEach(link => {
    link.addEventListener("click", () => {
      // Remove 'active' class from all links
      links.forEach(l => l.classList.remove("active"));
      // Add 'active' class to clicked link
      link.classList.add("active");
    });
  });
});

</script>