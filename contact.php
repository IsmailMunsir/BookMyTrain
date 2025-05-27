<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<div class="container">
  <h1>Contact Us</h1>
  <form action="send_contact.php" method="post">
    <label>Name:</label><br>
    <input type="text" name="name" required><br><br>
    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>
    <label>Message:</label><br>
    <textarea name="message" required></textarea><br><br>
    <button type="submit">Send Message</button>
  </form>
</div>

<?php include('includes/footer.php'); ?>
