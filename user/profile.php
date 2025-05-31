<?php include('../includes/header.php'); ?>

<!-- ✅ External CSS -->
<link rel="stylesheet" href="../assets/css/user/profile.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- ✅ Profile Section -->
<section class="user-profile" data-aos="fade-up">
  <div class="container profile-wrapper">

    <!-- Profile Info -->
    <div class="profile-header" data-aos="fade-down">
      <img src="../assets/image/profile-avatar.png" alt="Profile Avatar" class="avatar" />
      <h1><i class="fas fa-user-circle"></i> My Profile</h1>
      <p>Keep your information up to date for a better booking experience.</p>
    </div>

    <!-- Profile Form -->
    <form action="update-profile.php" method="POST" class="profile-form" data-aos="fade-up">
      <div class="input-group">
        <label><i class="fas fa-user"></i> Full Name</label>
        <input type="text" name="name" placeholder="Your Full Name" required>
      </div>
      <div class="input-group">
        <label><i class="fas fa-envelope"></i> Email</label>
        <input type="email" name="email" placeholder="you@example.com" required>
      </div>
      <div class="input-group">
        <label><i class="fas fa-phone"></i> Phone Number</label>
        <input type="text" name="phone" placeholder="07XXXXXXXX" required>
      </div>
      <div class="input-group">
        <label><i class="fas fa-key"></i> Change Password</label>
        <input type="password" name="password" placeholder="Leave blank to keep current">
      </div>

      <button type="submit" class="btn-submit">Update Profile</button>
    </form>

  </div>
</section>

<!-- ✅ JS Libraries -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/user/profile.js"></script>
<script>AOS.init();</script>


<style>
  .user-profile {
  background: #f9f9ff;
  padding: 70px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.profile-wrapper {
  max-width: 700px;
  margin: auto;
  background: white;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.profile-header {
  text-align: center;
  margin-bottom: 30px;
}

.profile-header h1 {
  font-size: 2.2rem;
  color: #7e3af2;
}

.profile-header p {
  font-size: 1rem;
  color: #555;
  margin-top: 10px;
}

.avatar {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  margin-bottom: 15px;
  border: 4px solid #7e3af2;
}

.profile-form .input-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
  text-align: left;
}

.profile-form label {
  font-weight: bold;
  margin-bottom: 6px;
  color: #333;
}

.profile-form input {
  padding: 12px 15px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 1rem;
}

.btn-submit {
  display: block;
  margin: 30px auto 0;
  background-color: #7e3af2;
  color: white;
  padding: 12px 30px;
  font-size: 1rem;
  font-weight: bold;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-submit:hover {
  background-color: #5a28c8;
}


</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const form = document.querySelector('.profile-form');
  form.addEventListener('submit', (e) => {
    const phoneInput = form.querySelector('input[name="phone"]');
    const phone = phoneInput.value.trim();

    if (!/^(07)[0-9]{8}$/.test(phone)) {
      alert("Please enter a valid Sri Lankan phone number starting with 07.");
      phoneInput.focus();
      e.preventDefault();
    }
  });
});


</script>
<?php include('../includes/footer.php'); ?>
