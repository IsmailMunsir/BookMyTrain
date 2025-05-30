<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/contact.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- Hero Section -->
<section class="contact-hero" data-aos="zoom-in">
  <div class="hero-content">
    <h1>Contact <span class="highlight">BookMyTrain</span></h1>
    <p>We’d love to hear from you. Reach out with questions, ideas, or support needs—let’s stay connected.</p>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
  <div class="container form-wrapper">

    <!-- Contact Form -->
    <div class="form-info" data-aos="fade-right">
      <h2><i class="fas fa-paper-plane"></i> Send Us a Message</h2>
      <p>Our team typically replies within 24 hours.</p>
      <form action="send_contact.php" method="post">
        <div class="input-group">
          <input type="text" name="name" placeholder="Your Name" required>
        </div>
        <div class="input-group">
          <input type="email" name="email" placeholder="Your Email" required>
        </div>
        <div class="input-group">
          <textarea name="message" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" class="btn-primary">📨 Send Message</button>
      </form>
    </div>

    <!-- Animated Illustration -->
    <div class="form-image" data-aos="fade-left">
      <img src="assets/image/contact-illustration.gif" alt="Contact Illustration">
    </div>

  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1000 });
</script>

<?php include('includes/footer.php'); ?>
