<?php session_start(); ?>
<?php include('../includes/header.php'); ?>

<!-- External Styles -->
<link rel="stylesheet" href="../assets/css/auth.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />

<section class="auth-section register-section" data-aos="fade-up">
  <div class="register-card">
    <div class="register-header">
      <i class="fas fa-user-plus"></i>
      <h1>Create Your <span class="highlight">BookMyTrain</span> Account</h1>
    </div>

    <?php if (isset($_SESSION['error'])): ?>
      <div class="form-error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form id="registerForm" action="process-register.php" method="POST" class="register-form">
      <div class="form-group">
        <label for="name"><i class="fas fa-user"></i> Full Name</label>
        <input type="text" name="name" id="name" placeholder="Your full name" required>
      </div>
      <div class="form-group">
        <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
        <input type="email" name="email" id="email" placeholder="example@domain.com" required>
      </div>
      <div class="form-group">
        <label for="password"><i class="fas fa-lock"></i> Password</label>
        <input type="password" name="password" id="password" placeholder="Create a password" required>
      </div>
      <div class="form-group">
        <label for="confirm_password"><i class="fas fa-lock"></i> Confirm Password</label>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Re-enter password" required>
      </div>
      <button type="submit" class="btn-register"><i class="fas fa-user-check"></i> Register</button>
    </form>

    <p class="form-footer">Already have an account? <a href="login.php">Login here</a>.</p>
  </div>
</section>

<!-- External Scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/auth.js"></script>

<style>
    /* Global Reset */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body, html {
  font-family: 'Segoe UI', sans-serif;
  background: #f0f4f8;
  color: #333;
}

/* Register Section */
.register-section {
  min-height: 100vh;
  background: linear-gradient(to right, #7e3af2, #9333ea);
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 50px 20px;
}

/* Card Container */
.register-card {
  background: #fff;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  width: 100%;
  max-width: 500px;
  animation: fadeInUp 1s ease;
}

.register-header {
  text-align: center;
  margin-bottom: 25px;
}

.register-header i {
  font-size: 40px;
  color: #7e3af2;
  margin-bottom: 10px;
}

.register-header h1 {
  font-size: 24px;
}

.highlight {
  color: #7e3af2;
}

/* Form */
.register-form {
  display: flex;
  flex-direction: column;
  gap: 18px;
}

.form-group label {
  font-size: 14px;
  font-weight: bold;
  color: #555;
  margin-bottom: 6px;
  display: block;
}

.form-group input {
  width: 100%;
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 16px;
  transition: 0.3s;
}

.form-group input:focus {
  border-color: #7e3af2;
  outline: none;
  box-shadow: 0 0 0 3px rgba(126, 58, 242, 0.2);
}

/* Submit Button */
.btn-register {
  background-color: #7e3af2;
  color: #fff;
  font-weight: bold;
  padding: 14px;
  border: none;
  border-radius: 12px;
  font-size: 16px;
  cursor: pointer;
  transition: 0.3s ease;
}

.btn-register:hover {
  background-color: #5b2cb5;
}

.form-footer {
  text-align: center;
  margin-top: 25px;
  font-size: 15px;
}

.form-footer a {
  color: #7e3af2;
  text-decoration: none;
  font-weight: bold;
}

.form-error {
  background: #ffe2e2;
  color: #b00020;
  padding: 10px 15px;
  border-radius: 10px;
  margin-bottom: 15px;
  font-weight: bold;
  text-align: center;
}

/* Animations */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>

<script>
    document.addEventListener("DOMContentLoaded", () => {
  AOS.init();

  const form = document.getElementById("registerForm");
  if (form) {
    form.addEventListener("submit", (e) => {
      const pass = form.password.value;
      const confirm = form.confirm_password.value;
      if (pass !== confirm) {
        e.preventDefault();
        alert("❗ Passwords do not match. Please try again.");
      }
    });
  }
});

</script>
<?php include('../includes/footer.php'); ?>
