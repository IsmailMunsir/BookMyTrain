<?php
session_start();
include('../includes/admin-sidebar.php');
?>

<!-- External Styles & Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css">
<link rel="stylesheet" href="../assets/css/admin/add-train.css">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/admin/add-train.js" defer></script>

<!-- Admin Layout -->
<div class="admin-layout">
  <main class="dashboard-section" data-aos="fade-up">
    <div class="dashboard-container">
      <h1><i class="fas fa-plus-circle"></i> Add <span>Train</span></h1>
      <p class="dashboard-subtitle">Fill the form below to add a new train to the system.</p>

      <div class="form-wrapper" data-aos="fade-up" data-aos-delay="200">
        <form action="process-add-train.php" method="POST" class="train-form">
          <div class="form-grid">

            <div class="form-group">
              <label for="train_name"><i class="fas fa-train"></i> Train Name</label>
              <input type="text" id="train_name" name="train_name" placeholder="Ex: Udarata Menike" required>
            </div>

            <div class="form-group">
              <label for="from_station"><i class="fas fa-map-marker-alt"></i> From Station</label>
              <input type="text" id="from_station" name="from_station" placeholder="Ex: Colombo Fort" required>
            </div>

            <div class="form-group">
              <label for="to_station"><i class="fas fa-map-marker-alt"></i> To Station</label>
              <input type="text" id="to_station" name="to_station" placeholder="Ex: Badulla" required>
            </div>

            <div class="form-group">
              <label for="departure_time"><i class="fas fa-clock"></i> Departure Time</label>
              <input type="time" id="departure_time" name="departure_time" required>
            </div>

            <div class="form-group">
              <label for="arrival_time"><i class="fas fa-clock"></i> Arrival Time</label>
              <input type="time" id="arrival_time" name="arrival_time" required>
            </div>

            <div class="form-group full-width">
              <label for="train_type"><i class="fas fa-tags"></i> Train Type</label>
              <select id="train_type" name="train_type" required>
                <option value="">-- Select Type --</option>
                <option value="Express">Express</option>
                <option value="Intercity">Intercity</option>
                <option value="Night Mail">Night Mail</option>
              </select>
            </div>

          </div>

          <div class="form-footer" data-aos="fade-up" data-aos-delay="300">
            <button type="submit" class="btn-submit">
              <i class="fas fa-save"></i> Add Train
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>

<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>


<style>
  * {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body, html {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to bottom right, #f4f6fb, #eaeaff);
}

.admin-layout {
  display: flex;
  min-height: 100vh;
  padding-bottom: 80px;
}

.dashboard-section {
  margin-left: 260px;
  padding: 60px 50px;
  width: calc(100% - 260px);
}

.dashboard-container h1 {
  font-size: 2.5rem;
  color: #333;
  display: flex;
  align-items: center;
  gap: 10px;
}

.dashboard-container h1 i {
  color: #7e3af2;
}

.dashboard-subtitle {
  font-size: 1.1rem;
  color: #555;
  margin-bottom: 30px;
}

.form-wrapper {
  background: #fff;
  padding: 35px;
  border-radius: 15px;
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.08);
  max-width: 850px;
  margin: auto;
}

.train-form .form-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
}

.form-group {
  display: flex;
  flex-direction: column;
}

.form-group label {
  font-weight: 600;
  margin-bottom: 8px;
  color: #333;
  display: flex;
  align-items: center;
  gap: 8px;
}

.full-width {
  grid-column: span 2;
}

.train-form input,
.train-form select {
  padding: 13px 15px;
  border: 2px solid #ddd;
  border-radius: 10px;
  font-size: 1rem;
  transition: border-color 0.3s, box-shadow 0.3s;
}

.train-form input:focus,
.train-form select:focus {
  border-color: #7e3af2;
  box-shadow: 0 0 8px rgba(126, 58, 242, 0.2);
  outline: none;
}

.btn-submit {
  background-color: #7e3af2;
  color: white;
  padding: 15px 30px;
  border: none;
  font-size: 1rem;
  font-weight: bold;
  border-radius: 10px;
  cursor: pointer;
  display: inline-flex;
  align-items: center;
  gap: 10px;
  transition: background 0.3s ease;
}

.btn-submit:hover {
  background-color: #5e2acf;
}

.form-footer {
  text-align: center;
  margin-top: 30px;
}

.admin-footer {
  position: fixed;
  bottom: 0;
  left: 260px;
  width: calc(100% - 260px);
  background: #222;
  color: #fff;
  text-align: center;
  padding: 15px;
  font-size: 0.9rem;
  z-index: 1000;
}

</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  AOS.init({
    duration: 1000,
    once: true,
    easing: 'ease-in-out'
  });

  console.log("✅ Add Train Page Loaded Successfully");
});

</script>