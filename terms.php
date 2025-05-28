<?php $customStylesheet = "assets/css/terms.css"; ?>
<?php $customScript = "assets/js/terms.js"; ?>
<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="terms-wrapper">
  <aside class="terms-sidebar">
    <ul>
      <li><a href="#intro">Introduction</a></li>
      <li><a href="#booking">Booking</a></li>
      <li><a href="#cancellation">Cancellation</a></li>
      <li><a href="#security">Security</a></li>
      <li><a href="#privacy">Privacy</a></li>
      <li><a href="#changes">Changes</a></li>
    </ul>
  </aside>

  <main class="terms-content">
    <section id="intro">
      <h1>Terms & Conditions</h1>
      <p>By using BookMyTrain, you agree to these terms. Please read them carefully before booking tickets.</p>
    </section>

    <section id="booking">
      <h2>1. Ticket Booking</h2>
      <p>All bookings are subject to availability. Please ensure your details are correct before finalizing a booking.</p>
    </section>

    <section id="cancellation">
      <h2>2. Cancellations & Refunds</h2>
      <p>Refunds follow Sri Lanka Railways policies. Please review refund eligibility before canceling.</p>
    </section>

    <section id="security">
      <h2>3. Account Security</h2>
      <p>You are responsible for your account and password. Avoid sharing login credentials.</p>
    </section>

    <section id="privacy">
      <h2>4. Use of Personal Data</h2>
      <p>Your personal data is protected in line with our <a href="privacy.php">Privacy Policy</a>.</p>
    </section>

    <section id="changes">
      <h2>5. Changes to Terms</h2>
      <p>We may update terms at any time. Continued use of the platform indicates acceptance.</p>
    </section>
  </main>
</div>

<?php include('includes/footer.php'); ?>
