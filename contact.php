<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<section class="contact-section">
  <div class="container">
    <h1>Contact Us</h1>
    <form action="send_contact.php" method="post">
      <input type="text" name="name" placeholder="Your Name" required>
      <input type="email" name="email" placeholder="Your Email" required>
      <textarea name="message" placeholder="Your Message" required></textarea>
      <button type="submit" class="btn-primary">Send Message</button>
    </form>
  </div>
</section>
<?php include('includes/footer.php'); ?>