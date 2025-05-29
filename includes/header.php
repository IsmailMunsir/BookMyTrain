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
