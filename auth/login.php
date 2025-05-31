<?php session_start(); ?>
<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/auth/login.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<section class="auth-section">
  <div class="auth-wrapper" data-aos="zoom-in">
    <div class="auth-header">
      <h1><i class="fas fa-user-lock"></i> Login to <span class="highlight">BookMyTrain</span></h1>
      <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
      <?php endif; ?>
    </div>

    <form action="process-login.php" method="POST" class="auth-form" id="loginForm">
      <div class="form-group">
        <div class="input-icon">
          <i class="fas fa-envelope"></i>
          <input type="email" name="email" placeholder="Email Address" required>
        </div>
      </div>
      <div class="form-group">
        <div class="input-icon">
          <i class="fas fa-lock"></i>
          <input type="password" name="password" placeholder="Password" required>
        </div>
      </div>
      <button type="submit" class="btn-login"><i class="fas fa-sign-in-alt"></i> Login</button>
    </form>

    <p class="form-footer">Don’t have an account? <a href="register.php">Register here.</a></p>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/auth/login.js"></script>
<script>AOS.init();</script>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');

.auth-section {
  background: linear-gradient(135deg, #7e3af2, #a78bfa);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 40px 20px;
}

.auth-wrapper {
  background: #fff;
  padding: 50px 40px;
  border-radius: 24px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
  width: 100%;
  max-width: 450px;
  text-align: center;
  margin: auto;
}

.auth-header h1 {
  font-size: 24px;
  margin-bottom: 25px;
  color: #333;
}

.auth-header .highlight {
  color: #7e3af2;
}

.auth-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  width: 100%;
}

.auth-form .form-group {
  width: 100%;
  margin-bottom: 20px;
}

.input-icon {
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;
  justify-content: center;
}

.input-icon i {
  position: absolute;
  left: 16px;
  color: #888;
  font-size: 16px;
  pointer-events: none;
}

.input-icon input {
  width: 100%;
  padding: 14px 14px 14px 44px;
  border: 1px solid #ccc;
  border-radius: 14px;
  font-size: 15px;
  transition: all 0.3s ease;
  box-sizing: border-box;
}

.input-icon input:focus {
  border-color: #7e3af2;
  box-shadow: 0 0 0 3px rgba(126, 58, 242, 0.2);
  outline: none;
}

.btn-login {
  width: 100%;
  padding: 14px;
  background: #7e3af2;
  color: #fff;
  border: none;
  border-radius: 16px;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-login:hover {
  background: #5b2ec8;
  box-shadow: 0 8px 18px rgba(126, 58, 242, 0.3);
  transform: translateY(-1px);
}

.form-footer {
  margin-top: 20px;
  font-size: 14px;
}

.form-footer a {
  color: #7e3af2;
  text-decoration: none;
  font-weight: 500;
}

.form-footer a:hover {
  text-decoration: underline;
}

.error {
  background: #ffeaea;
  color: #c0392b;
  padding: 10px;
  border-radius: 8px;
  margin-bottom: 15px;
  font-size: 14px;
}

</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("loginForm");

  form.addEventListener("submit", (e) => {
    const email = form.querySelector('input[name="email"]').value.trim();
    const password = form.querySelector('input[name="password"]').value.trim();

    if (!email || !password) {
      e.preventDefault();
      alert("Please fill in all fields.");
    }

    console.log("Login submitted.");
  });
});

</script>
<?php include('../includes/footer.php'); ?>
