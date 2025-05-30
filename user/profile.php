<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/user/profile.css">

<section class="user-profile">
  <div class="container">
    <h1>My Profile</h1>
    <form action="update-profile.php" method="POST">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <button type="submit" class="btn-primary">Update Profile</button>
    </form>
  </div>
</section>

<?php include('../includes/footer.php'); ?>
