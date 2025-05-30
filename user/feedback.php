<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/user/feedback.css">

<section class="feedback-form">
  <div class="container">
    <h1>We’d Love Your Feedback</h1>
    <form action="submit-feedback.php" method="POST">
      <textarea name="feedback" placeholder="Write your message here..." required></textarea>
      <button type="submit" class="btn-primary">Submit Feedback</button>
    </form>
  </div>
</section>

<?php include('../includes/footer.php'); ?>
