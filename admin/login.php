<?php
session_start();
if (isset($_SESSION['admin_logged_in'])) {
  header("Location: dashboard.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link rel="stylesheet" href="../assets/css/admin/login.css">
  <script src="../assets/js/admin/login.js" defer></script>
</head>
<body>
  <div class="admin-login-container">
    <form action="login-process.php" method="POST" class="admin-login-form" id="loginForm">
      <h2>Admin Login</h2>
      <?php if (isset($_SESSION['login_error'])): ?>
        <p class="error"><?php echo $_SESSION['login_error']; unset($_SESSION['login_error']); ?></p>
      <?php endif; ?>
      <label for="username">Username:</label>
      <input type="text" name="username" id="username" required>

      <label for="password">Password:</label>
      <input type="password" name="password" id="password" required>

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>

<style>
    body {
  background: #f0f4f8;
  font-family: 'Segoe UI', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  margin: 0;
}

.admin-login-container {
  background: white;
  padding: 40px;
  border-radius: 10px;
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
  width: 350px;
}

.admin-login-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
}

.admin-login-form h2 {
  text-align: center;
  color: #333;
}

.admin-login-form label {
  font-size: 0.95rem;
  color: #444;
}

.admin-login-form input {
  padding: 10px;
  border-radius: 6px;
  border: 1px solid #ccc;
  font-size: 1rem;
}

.admin-login-form button {
  background: #7e3af2;
  color: #fff;
  padding: 12px;
  border: none;
  border-radius: 6px;
  font-size: 1rem;
  cursor: pointer;
  transition: background 0.3s ease;
}

.admin-login-form button:hover {
  background: #5f2db9;
}

.error {
  color: #dc3545;
  font-size: 0.9rem;
  text-align: center;
  margin-bottom: 10px;
}

</style>
