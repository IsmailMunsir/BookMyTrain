<?php
session_start();
include('../includes/header.php');
?>

<link rel="stylesheet" href="../assets/css/user/feedback.css">

<section class="feedback-form">
  <div class="container feedback-wrapper" style="text-align:center;">
    <h1>🎉 Thank You!</h1>
    <p>
      <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        } else {
            echo "Your feedback has been received.";
        }
      ?>
    </p>
    <a href="feedback.php" class="btn-submit" style="margin-top: 20px;">Back to Feedback</a>
  </div>
</section>

<?php include('../includes/footer.php'); ?>

