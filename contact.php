<?php include('includes/header.php'); ?>
<link rel="stylesheet" href="assets/css/contact.css">

<!-- Hero Section -->
<section class="contact-hero">
  <div class="hero-content">
    <h1>Get in Touch with <span class="highlight">BookMyTrain</span></h1>
    <p>We’d love to hear from you. Whether it's feedback, support, or partnership—let’s connect!</p>
  </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
  <div class="container form-wrapper">
    
    <!-- Contact Form -->
    <div class="form-info">
      <h2>Send Us a Message</h2>
      <p>Fill in the form and our team will get back to you shortly.</p>
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
        <button type="submit" class="btn-primary">Send Message</button>
      </form>
    </div>

    <!-- Animated Image -->
    <div class="form-image">
      <img src="assets/image/contact-illustration.gif" alt="Contact Illustration">
    </div>

  </div>
</section>

<?php include('includes/footer.php'); ?>
