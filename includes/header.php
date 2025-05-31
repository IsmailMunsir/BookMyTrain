<!-- includes/header.php -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BookMyTrain</title>

  <!-- ✅ Custom CSS -->
  <link rel="stylesheet" href="assets/css/header.css">

  <!-- ✅ Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;700&display=swap" rel="stylesheet">

  <!-- ✅ Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

<!-- ✅ Header Start -->
<header class="site-header">
  <div class="container header-container">

    <!-- ✅ Logo and Brand Name -->
    <a href="index.php" class="branding">
      <div class="logo-wrapper">
        <img src="assets/image/logo.png" alt="BookMyTrain Logo" class="logo" />
      </div>
      <h1 class="brand-name">Book<span>My</span>Train</h1>
    </a>

    <!-- ✅ Navigation Menu -->
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
<!-- ✅ Header End -->

<style>
  /* ================== HEADER STYLES ================== */

body {
  margin: 0;
  font-family: 'Segoe UI', sans-serif;
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

/* Header layout */
.header-container {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
}

/* Logo and branding */
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

/* Navigation menu */
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

/* Book Now button */
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

/* Responsive styles */
@media (max-width: 768px) {
  .header-container {
    flex-direction: column;
    align-items: flex-start;
    gap: 1.5rem;
  }

  .main-nav .nav-list {
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
    width: 100%;
  }

  .brand-name {
    font-size: 1.8rem;
  }

  .logo {
    height: 60px;
  }
}

</style>
