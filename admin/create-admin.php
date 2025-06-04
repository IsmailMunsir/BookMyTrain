<?php
session_start();
?>

<link rel="stylesheet" href="../assets/css/admin/create-admin.css">
<script src="../assets/js/admin/create-admin.js" defer></script>
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>

<?php
// ✅ Handle form submission BEFORE any HTML output
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = trim($_POST['name']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirm = $_POST['confirm_password'];

  if ($password !== $confirm) {
    $_SESSION['error'] = "Passwords do not match.";
    header("Location: create-admin.php");
    exit;
  } else {
    // TODO: Add DB logic here
    $_SESSION['success'] = "New admin created successfully!";
    header("Location: create-admin.php");
    exit;
  }
}
?>

<div class="admin-layout">
  <?php include('../includes/admin-sidebar.php'); ?>

  <section class="create-admin-section" data-aos="fade-up">
    <div class="container">
      <div class="heading-wrapper">
        <span class="label">Hader</span>
        <h1>Create Admin</h1>
      </div>

      <?php if (isset($_SESSION['success'])): ?>
        <p class="success"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
      <?php endif; ?>
      <?php if (isset($_SESSION['error'])): ?>
        <p class="error"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
      <?php endif; ?>

      <form action="create-admin.php" method="POST" class="admin-form">
        <input type="text" name="name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email Address" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="password" name="confirm_password" placeholder="Confirm Password" required>
        <button type="submit" class="btn-primary">Create Admin</button>
      </form>
    </div>
  </section>
</div>

<?php include('../includes/admin-footer.php'); ?>

<script>
  AOS.init();
</script>


<style>
  .create-admin-section {
  padding: 80px 20px;
  background: linear-gradient(to bottom, #f4f4f4, #fff);
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}

.container {
  max-width: 700px;
  margin: 0 auto;
  background: #ffffff;
  padding: 40px;
  border-radius: 12px;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.08);
}

.heading-wrapper {
  position: relative;
  display: inline-block;
  margin-bottom: 30px;
}

.heading-wrapper h1 {
  font-size: 3rem;
  color: #7e3af2;
  margin: 0;
}

.heading-wrapper .label {
  position: absolute;
  left: -80px;
  top: 50%;
  transform: translateY(-50%);
  background: #7e3af2;
  color: #fff;
  padding: 8px 20px;
  font-size: 1rem;
  border-radius: 30px;
  font-weight: bold;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.admin-form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  margin-top: 20px;
}

.admin-form input {
  padding: 12px 15px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 1rem;
}

.admin-form .btn-primary {
  padding: 12px;
  background-color: #7e3af2;
  color: white;
  font-weight: bold;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background 0.3s;
}

.admin-form .btn-primary:hover {
  background-color: #5e2bcb;
}

.success {
  color: green;
  margin-bottom: 10px;
}

.error {
  color: red;
  margin-bottom: 10px;
}

</style>
