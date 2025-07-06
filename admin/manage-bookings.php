<?php
session_start();
include('../includes/admin-sidebar.php');
include('../config/db.php');

// Handle booking status update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && isset($_POST['booking_id'])) {
  $booking_id = intval($_POST['booking_id']);
  $action = $_POST['action'];

  if ($action === 'cancel') {
    mysqli_query($conn, "UPDATE bookings SET status='cancelled' WHERE id=$booking_id");
  } elseif ($action === 'confirm') {
    mysqli_query($conn, "UPDATE bookings SET status='confirmed' WHERE id=$booking_id");
  }
  header("Location: manage-bookings.php");
  exit;
}

// Count stats
$total = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bookings"));
$confirmed = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bookings WHERE status='confirmed'"));
$cancelled = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM bookings WHERE status='cancelled'"));

// Get all bookings
$bookings = mysqli_query($conn, "
  SELECT b.*, u.name AS user_name
  FROM bookings b
  JOIN users u ON b.user_id = u.id
  ORDER BY b.created_at DESC
");
?>

<!-- External Resources -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="../assets/css/admin/manage-bookings.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/manage-bookings.js" defer></script>

<div class="admin-layout">
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">
      <h1><i class="fas fa-ticket-alt"></i> Manage <span>Bookings</span></h1>
      <p class="dashboard-subtitle">Track and manage all user bookings across the train network.</p>

      <div class="dashboard-cards" data-aos="zoom-in">
        <div class="card glass"><h2>Total Bookings</h2><p><?= $total ?></p></div>
        <div class="card glass"><h2>Confirmed</h2><p><?= $confirmed ?></p></div>
        <div class="card glass"><h2>Cancelled</h2><p><?= $cancelled ?></p></div>
      </div>

      <div class="controls">
        <input type="text" class="search-input" placeholder="Search by user or train..." oninput="filterBookings()" />
        <select class="status-filter" onchange="filterBookings()">
          <option value="all">All Statuses</option>
          <option value="confirmed">Confirmed</option>
          <option value="cancelled">Cancelled</option>
        </select>
        <button class="btn-refresh" onclick="location.reload();"><i class="fas fa-sync-alt"></i> Refresh</button>
      </div>

      <div class="booking-table-wrapper" data-aos="fade-up" data-aos-delay="100">
        <table class="booking-table" id="bookingTable">
          <thead>
            <tr>
              <th>#</th>
              <th>User</th>
              <th>Train</th>
              <th>From</th>
              <th>To</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; while ($row = mysqli_fetch_assoc($bookings)): ?>
              <tr>
                <td><?= str_pad($i++, 3, "0", STR_PAD_LEFT) ?></td>
                <td><?= htmlspecialchars($row['user_name']) ?></td>
                <td><?= htmlspecialchars($row['train_name']) ?></td>
                <td><?= htmlspecialchars($row['from_station']) ?></td>
                <td><?= htmlspecialchars($row['to_station']) ?></td>
                <td><?= htmlspecialchars($row['travel_date']) ?></td>
                <td>
                  <span class="badge <?= $row['status'] === 'confirmed' ? 'success' : 'cancelled' ?>">
                    <?= ucfirst($row['status']) ?>
                  </span>
                </td>
                <td>
                  <form method="POST" class="booking-action-form">
                    <input type="hidden" name="booking_id" value="<?= $row['id'] ?>">
                    <button type="button" class="action-btn view"><i class="fas fa-eye"></i></button>
                    <button type="button" class="action-btn edit"><i class="fas fa-edit"></i></button>
                    <?php if ($row['status'] === 'confirmed'): ?>
                      <button class="action-btn cancel" name="action" value="cancel"><i class="fas fa-times"></i></button>
                    <?php else: ?>
                      <button class="action-btn confirm" name="action" value="confirm"><i class="fas fa-check"></i></button>
                    <?php endif; ?>
                  </form>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?= date("Y") ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>


<!-- Styles -->
<style>
  * { box-sizing: border-box; }
  body, html {
    margin: 0; padding: 0;
    font-family: 'Segoe UI', sans-serif;
    background: linear-gradient(to bottom right, #f7f7fb, #e8e8f4);
  }

  .admin-layout { display: flex; padding-bottom: 80px; }

  .dashboard-section {
    margin-left: 260px;
    padding: 60px 40px;
    width: calc(100% - 260px);
  }

  h1 {
    font-size: 2.6rem;
    color: #333;
    display: flex;
    align-items: center;
    gap: 12px;
    position: relative;
  }

  h1 i {
    color: #7e3af2;
    background: #e0d4ff;
    padding: 10px;
    border-radius: 50%;
  }

  .dashboard-subtitle { font-size: 1.1rem; color: #555; margin-bottom: 30px; }

  .dashboard-cards {
    display: flex;
    gap: 20px;
    margin-bottom: 30px;
  }

  .card {
    background: white;
    padding: 20px 30px;
    border-radius: 15px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.06);
    flex: 1;
    text-align: center;
  }

  .card h2 {
    font-size: 1.1rem;
    color: #666;
    margin-bottom: 10px;
  }

  .card p {
    font-size: 1.8rem;
    font-weight: bold;
    color: #333;
  }

  .controls {
    display: flex;
    align-items: center;
    gap: 20px;
    margin-bottom: 20px;
  }

  .search-input, .status-filter {
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 1rem;
  }

  .btn-refresh {
    background: #7e3af2;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: bold;
  }

  .btn-refresh:hover { background: #5f2ac9; }

  .booking-table-wrapper {
    background: #fff;
    border-radius: 12px;
    overflow-x: auto;
    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.05);
  }

  .booking-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 960px;
  }

  .booking-table th, .booking-table td {
    text-align: left;
    padding: 16px 20px;
    border-bottom: 1px solid #eee;
    font-size: 0.95rem;
  }

  .booking-table th {
    background: #7e3af2;
    color: white;
    font-weight: bold;
  }

  .booking-table tbody tr:hover { background: #f4f0ff; }

  .badge {
    padding: 6px 14px;
    border-radius: 30px;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
  }

  .badge.success { background: #28a745; color: white; }
  .badge.cancelled { background: #dc3545; color: white; }

  .action-btn {
    background: transparent;
    border: none;
    font-size: 1.1rem;
    cursor: pointer;
    margin-right: 8px;
    transition: 0.2s;
  }

  .action-btn.view:hover { color: #17a2b8; }
  .action-btn.edit:hover { color: #ffc107; }
  .action-btn.cancel:hover { color: #dc3545; }

  .pagination-controls {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 20px;
    margin-top: 25px;
  }

  .page-btn {
    padding: 10px 20px;
    border: 1px solid #7e3af2;
    background: #fff;
    border-radius: 6px;
    cursor: pointer;
  }

  .page-info {
    font-weight: bold;
    color: #444;
  }

  .recent-bookings {
    margin-top: 40px;
    background: white;
    padding: 20px 25px;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.04);
  }

  .recent-bookings h3 {
    margin-bottom: 15px;
    font-size: 1.2rem;
    color: #333;
  }

  .recent-bookings ul {
    list-style: none;
    padding: 0;
  }

  .recent-bookings li {
    margin-bottom: 10px;
    font-size: 0.95rem;
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .success-icon { color: #28a745; }
  .cancel-icon { color: #dc3545; }

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
    AOS.init();

    document.querySelectorAll(".action-btn.cancel").forEach(btn => {
      btn.addEventListener("click", () => {
        const name = btn.closest("tr").children[1].textContent;
        if (confirm(`Are you sure to cancel booking for ${name}?`)) {
          alert("Booking cancelled (demo).");
        }
      });
    });

    document.querySelectorAll(".action-btn.edit").forEach(btn => {
      btn.addEventListener("click", () => {
        alert("Edit booking (demo feature).");
      });
    });

    document.querySelectorAll(".action-btn.view").forEach(btn => {
      btn.addEventListener("click", () => {
        alert("View booking details (demo).");
      });
    });

    document.querySelector(".btn-refresh")?.addEventListener("click", () => {
      location.reload();
    });

    document.querySelector(".status-filter")?.addEventListener("change", (e) => {
      alert(`Filtering by: ${e.target.value} (demo only)`);
    });
  });
</script>
