<?php
session_start();
include('../includes/header.php');
?>

<!-- External Styles & Scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="../assets/css/admin/login.css">
<script src="../assets/js/admin/login.js" defer></script>

<!-- Login Section -->
<section class="login-section">
  <div class="login-container">
    <div class="login-card" data-aos="zoom-in">
      <h1><i class="fas fa-lock"></i> Admin Login</h1>
      <p class="login-subtext">Access the BookMyTrain Admin Panel</p>

      <form action="login-process.php" method="POST" class="login-form">
        <div class="form-group">
          <label for="username"><i class="fas fa-user"></i> Username</label>
          <input type="text" name="username" id="username" required placeholder="Enter username">
        </div>
        <div class="form-group">
          <label for="password"><i class="fas fa-key"></i> Password</label>
          <input type="password" name="password" id="password" required placeholder="Enter password">
        </div>
        <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
      </form>
    </div>
  </div>
</section>

<?php include('../includes/footer.php'); ?>


<style>
  body, html {
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #e9eaf3, #ffffff);
  margin: 0;
  padding: 0;
  height: 100%;
}

.login-section {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.login-container {
  width: 100%;
  max-width: 450px;
  padding: 20px;
}

.login-card {
  background: #fff;
  padding: 40px 30px;
  border-radius: 15px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  text-align: center;
}

.login-card h1 {
  font-size: 2rem;
  color: #7e3af2;
  margin-bottom: 10px;
}

.login-subtext {
  color: #666;
  margin-bottom: 25px;
  font-size: 0.95rem;
}

.login-form .form-group {
  text-align: left;
  margin-bottom: 20px;
}

.login-form label {
  display: block;
  font-weight: 500;
  color: #333;
  margin-bottom: 5px;
}

.login-form input {
  width: 100%;
  padding: 12px 14px;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 1rem;
  outline: none;
  transition: border 0.3s;
}

.login-form input:focus {
  border-color: #7e3af2;
}

.btn-login {
  background: #7e3af2;
  color: #fff;
  padding: 12px 20px;
  border: none;
  border-radius: 10px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s;
  width: 100%;
}

.btn-login:hover {
  background: #5f2db9;
}

</style>

<script>
  document.addEventListener("DOMContentLoaded", () => {
  console.log("Login page loaded.");
});

</script>