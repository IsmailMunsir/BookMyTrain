<?php
session_start();
include('config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = $user_id");
$user = mysqli_fetch_assoc($query);

// Update Profile
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
        $target_dir = "uploads/";
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $filename = time() . '_' . basename($_FILES["profile"]["name"]);
        $target_file = $target_dir . $filename;
        move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
        $profile_img = $filename;

        mysqli_query($conn, "UPDATE users SET name='$name', phone='$phone', address='$address', profile_image='$profile_img' WHERE id=$user_id");
    } else {
        mysqli_query($conn, "UPDATE users SET name='$name', phone='$phone', address='$address' WHERE id=$user_id");
    }

    header("Location: profile.php?updated=1");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile - BookMyTrain</title>
  <link rel="stylesheet" href="assets/css/profile.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background: #f1f4fd;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    .site-header {
      background: linear-gradient(90deg, #7e3af2, #a855f7);
      padding: 20px 0;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      position: sticky;
      top: 0;
      width: 100%;
      z-index: 999;
    }

    .container {
      width: 90%;
      max-width: 1300px;
      margin: 0 auto;
    }

    .header-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      flex-wrap: wrap;
    }

    .branding {
      display: flex;
      align-items: center;
      gap: 15px;
      text-decoration: none;
    }

    .logo {
      height: 70px;
      width: auto;
      border-radius: 10px;
      transition: transform 0.3s ease;
    }

    .logo:hover {
      transform: scale(1.05);
    }

    .brand-name {
      font-size: 2.2rem;
      font-weight: 800;
      color: #fff;
      letter-spacing: 1px;
    }

    .brand-name span {
      color: #facc15;
    }

    .main-nav .nav-list {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 30px;
      margin: 0;
      padding: 0;
    }

    .nav-list li a {
      color: #ffffff;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      padding: 8px 14px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .nav-list li a:hover {
      background-color: rgba(255, 255, 255, 0.15);
      transform: translateY(-2px);
    }

    .btn-book {
      background-color: #facc15;
      color: #000;
      font-weight: bold;
      padding: 10px 18px;
      border-radius: 8px;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
      transition: all 0.3s ease;
    }

    .btn-book:hover {
      background-color: #eab308;
      transform: scale(1.05);
    }

    .profile-container {
      background: #fff;
      padding: 40px;
      border-radius: 16px;
      max-width: 500px;
      width: 100%;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
      text-align: center;
      margin: 60px auto;
    }

    .profile-container h2 {
      margin-bottom: 20px;
      color: #333;
    }

    .success-msg {
      color: green;
      margin-bottom: 20px;
    }

    .avatar-wrapper {
      margin-bottom: 20px;
    }

    .profile-avatar {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #2575fc;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="file"] {
      width: 100%;
      padding: 14px;
      margin-bottom: 16px;
      border-radius: 10px;
      border: 1px solid #ccc;
      transition: 0.3s;
      font-size: 15px;
    }

    input:focus {
      outline: none;
      border-color: #2575fc;
      box-shadow: 0 0 5px rgba(37, 117, 252, 0.4);
    }

    button {
      padding: 14px;
      background-color: #2575fc;
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      width: 100%;
    }

    button:hover {
      background-color: #1a5fd0;
    }

    .site-footer {
      background: linear-gradient(to right, #3b0764, #7e3af2);
      color: white;
      padding: 40px 20px 20px;
      font-family: 'Segoe UI', sans-serif;
      margin-top: auto;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-top {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 30px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.2);
      padding-bottom: 20px;
    }

    .footer-brand {
      flex: 1 1 300px;
    }

    .footer-brand .footer-logo {
      width: 190px;
      margin-bottom: -14px;
    }

    .footer-brand .brand-name {
      font-size: 24px;
      color: #fff;
    }

    .footer-brand .brand-name span {
      color: #facc15;
    }

    .footer-links,
    .footer-contact {
      flex: 1 1 200px;
    }

    .footer-links h3,
    .footer-contact h3 {
      font-size: 18px;
      margin-bottom: 10px;
      color: #facc15;
    }

    .footer-links ul {
      list-style: none;
      padding: 0;
    }

    .footer-links li {
      margin-bottom: 8px;
    }

    .footer-links a {
      color: #ddd;
      text-decoration: none;
      transition: color 0.3s;
    }

    .footer-links a:hover {
      color: #fff;
    }

    .footer-contact p {
      margin: 5px 0;
    }

    .footer-contact i {
      margin-right: 8px;
      color: #facc15;
    }

    .footer-bottom {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }
  </style>
</head>

<body>

  <!-- ✅ Header -->
  <header class="site-header">
    <div class="container header-container">
      <a href="index.php" class="branding">
        <img src="assets/image/logo.png" alt="BookMyTrain Logo" class="logo" />
        <h1 class="brand-name">Book<span>My</span>Train</h1>
      </a>
      <nav class="main-nav">
        <ul class="nav-list">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="terms.php">Terms & Conditions</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="user/book-ticket.php" class="btn-book">🚆 Book Now</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- ✅ Profile Section -->
  <div class="profile-container">
    <h2><i class="fas fa-user-circle"></i> My Profile</h2>
    <?php if (isset($_GET['updated'])) echo "<p class='success-msg'>✅ Profile updated successfully.</p>"; ?>
    <form action="" method="POST" enctype="multipart/form-data">
      <div class="avatar-wrapper">
        <img src="uploads/<?= $user['profile_image'] ?: 'default.png' ?>" alt="Profile Image" class="profile-avatar">
        <input type="file" name="profile" accept="image/*">
      </div>
      <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
      <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
      <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
      <input type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
      <button type="submit">Update Profile</button>
    </form>
  </div>

  <!-- ✅ Footer -->
  <footer class="site-footer">
    <div class="footer-container">
      <div class="footer-top">
        <div class="footer-brand">
          <img src="assets/image/logo.png" alt="BookMyTrain Logo" class="footer-logo" />
          <h2 class="brand-name">Book<span>My</span>Train</h2>
          <p>Your trusted train booking partner in Sri Lanka.</p>
        </div>
        <div class="footer-links">
          <h3>Quick Links</h3>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="terms.php">Terms & Conditions</a></li>
          </ul>
        </div>
        <div class="footer-contact">
          <h3>Contact Us</h3>
          <p><i class="fas fa-envelope"></i> support@bookmytrain.lk</p>
          <p><i class="fas fa-phone"></i> +94 11 123 4567</p>
          <p><i class="fas fa-map-marker-alt"></i> Colombo, Sri Lanka</p>
        </div>
      </div>
      <div class="footer-bottom">
        <p>&copy; <?php echo date("Y"); ?> BookMyTrain. All rights reserved.</p>
      </div>
    </div>
  </footer>

</body>
</html>
