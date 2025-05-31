<?php session_start(); ?>
<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/auth-admin.css">
<script src="../assets/js/auth-admin.js" defer></script>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $email = $_POST['email'];
  $password = $_POST['password'];

  if ($email === 'admin@bookmytrain.com' && $password === 'admin123') {
    $_SESSION['admin'] = $email;
    header("Location: ../admin/dashboard.php");
    exit;
  } else {
    $error = "Invalid admin credentials.";
  }
}
?>

<section class="auth-section">
  <div class="auth-container">
    <h2>Admin <span>Login</span></h2>

    <?php if (isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form method="POST" class="auth-form">
      <div class="form-group">
        <input type="email" name="email" placeholder="Admin Email" required>
      </div>
      <div class="form-group">
        <input type="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn-primary">Login</button>
    </form>

    <p class="switch">No account? <a href="admin-register.php">Register</a></p>
  </div>
</section>

<style>
.auth-section {
  min-height: 100vh;
  background: linear-gradient(135deg, #7e3af2, #4f46e5);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 40px 15px;
}

.auth-container {
  background: #fff;
  padding: 40px 30px;
  border-radius: 15px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 440px;
  text-align: center;
  animation: fadeIn 0.5s ease;
}

.auth-container h2 {
  font-size: 30px;
  color: #333;
  margin-bottom: 20px;
}

.auth-container h2 span {
  color: #7e3af2;
}

.auth-form {
  display: flex;
  flex-direction: column;
  align-items: center;
}

.auth-form .form-group {
  width: 100%;
  margin-bottom: 15px;
}

.auth-form input {
  width: 100%;
  padding: 12px 16px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 8px;
  transition: 0.3s;
  box-sizing: border-box;
}

.auth-form input:focus {
  outline: none;
  border-color: #7e3af2;
  box-shadow: 0 0 6px rgba(126, 58, 242, 0.4);
}

.btn-primary {
  width: 100%;
  padding: 12px;
  background: #7e3af2;
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s;
}

.btn-primary:hover {
  background: #5b2bd9;
}

.switch {
  margin-top: 15px;
  font-size: 15px;
}

.switch a {
  color: #4f46e5;
  font-weight: 600;
  text-decoration: none;
}

.error-msg {
  background: #fee2e2;
  color: #b91c1c;
  padding: 10px;
  margin-bottom: 15px;
  border-radius: 6px;
  font-size: 14px;
}

@keyframes fadeIn {
  from {
    transform: translateY(40px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const inputs = document.querySelectorAll(".auth-form input");

  inputs.forEach((input) => {
    input.addEventListener("focus", () => {
      input.style.boxShadow = "0 0 5px rgba(126, 58, 242, 0.4)";
    });
    input.addEventListener("blur", () => {
      input.style.boxShadow = "none";
    });
  });
});
</script>

<?php include('../includes/footer.php'); ?>
