<?php
session_start();
include('../includes/admin-sidebar.php');
include('../config/db.php');

// Add Route
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['from_city'])) {
    $from = mysqli_real_escape_string($conn, $_POST['from_city']);
    $to = mysqli_real_escape_string($conn, $_POST['to_city']);
    $distance = intval($_POST['distance_km']);
    mysqli_query($conn, "INSERT INTO routes (from_city, to_city, distance_km) VALUES ('$from', '$to', $distance)");
    header("Location: manage-routes.php");
    exit;
}

// Delete Route
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM routes WHERE id = $id");
    header("Location: manage-routes.php");
    exit;
}

// Load Data
$routes = mysqli_query($conn, "SELECT * FROM routes ORDER BY id DESC");
$totalRoutes = mysqli_num_rows($routes);
$cityCountRow = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(DISTINCT from_city) + COUNT(DISTINCT to_city) AS city_count FROM routes"));
$cityCount = $cityCountRow['city_count'];
?>

<!-- External CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="../assets/css/admin/manage-routes.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/manage-routes.js" defer></script>

<div class="admin-layout">
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">
      <h1><i class="fas fa-route"></i> Manage <span>Routes</span></h1>
      <p class="dashboard-subtitle">Manage all train routes in the system.</p>

      <!-- Stat Cards -->
      <div class="dashboard-cards">
        <div class="card glass" data-aos="zoom-in-up">
          <div class="icon-circle"><i class="fas fa-route"></i></div>
          <h2>Total Routes</h2>
          <p><?= $totalRoutes ?></p>
        </div>
        <div class="card glass" data-aos="zoom-in-up" data-aos-delay="100">
          <div class="icon-circle"><i class="fas fa-map-marker-alt"></i></div>
          <h2>Cities Covered</h2>
          <p><?= $cityCount ?></p>
        </div>
      </div>

      <!-- Routes Table -->
      <div class="table-section" data-aos="fade-up">
        <h2>Route List</h2>
        <table class="route-table">
          <thead>
            <tr>
              <th>ID</th>
              <th>From</th>
              <th>To</th>
              <th>Distance</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = mysqli_fetch_assoc($routes)) : ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['from_city']) ?></td>
                <td><?= htmlspecialchars($row['to_city']) ?></td>
                <td><?= $row['distance_km'] ?> KM</td>
                <td>
                  <button class="btn-edit" title="Edit"><i class="fas fa-edit"></i></button>
                  <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this route?');" class="btn-delete" title="Delete"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>

      <!-- Add Route Form -->
      <div class="form-section" data-aos="fade-up">
        <h2>Add New Route</h2>
        <form method="POST" id="routeForm">
          <input type="text" name="from_city" placeholder="From City" required />
          <input type="text" name="to_city" placeholder="To City" required />
          <input type="number" name="distance_km" placeholder="Distance (KM)" required />
          <button type="submit" class="btn-submit">Add Route</button>
        </form>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?= date("Y") ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

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
}

.dashboard-container h1 i {
  color: #7e3af2;
}

.dashboard-subtitle {
  font-size: 1rem;
  color: #777;
  margin-bottom: 30px;
}

.dashboard-cards {
  display: flex;
  gap: 30px;
  flex-wrap: wrap;
  margin-bottom: 40px;
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

.table-section {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
  margin-bottom: 50px;
}

.route-table {
  width: 100%;
  border-collapse: collapse;
}

.route-table th, .route-table td {
  padding: 14px;
  text-align: left;
  border-bottom: 1px solid #eee;
}

.route-table th {
  background: #f9f9f9;
  font-weight: 600;
  color: #444;
}

.btn-edit, .btn-delete {
  background: none;
  border: none;
  cursor: pointer;
  padding: 5px;
  font-size: 1rem;
}

.btn-edit i {
  color: #17a2b8;
}

.btn-delete i {
  color: #dc3545;
}

.form-section {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
}

.form-section h2 {
  margin-bottom: 15px;
  font-size: 1.6rem;
  color: #333;
}

#routeForm {
  display: flex;
  flex-wrap: wrap;
  gap: 20px;
}

#routeForm input {
  flex: 1;
  padding: 12px;
  border-radius: 8px;
  border: 1px solid #ccc;
}

.btn-submit {
  padding: 12px 24px;
  background: #7e3af2;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s ease;
}

.btn-submit:hover {
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

<script>
  document.addEventListener("DOMContentLoaded", () => {
  AOS.init();

  const form = document.getElementById("routeForm");
  if (form) {
    form.addEventListener("submit", () => {
      alert("New route added successfully!");
    });
  }

  const deleteButtons = document.querySelectorAll(".btn-delete");
  deleteButtons.forEach(btn => {
    btn.addEventListener("click", (e) => {
      const confirmDelete = confirm("Are you sure you want to delete this route?");
      if (!confirmDelete) {
        e.preventDefault();
      }
    });
  });
});

</script>