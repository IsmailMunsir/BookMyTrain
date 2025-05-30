<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/user/cancel-ticket.css">

<section class="cancel-ticket">
  <div class="container">
    <h1>Cancel Ticket</h1>
    <form action="process-cancel.php" method="POST">
      <input type="text" name="ticket_id" placeholder="Enter Ticket ID" required>
      <button type="submit" class="btn-danger">Cancel Ticket</button>
    </form>
  </div>
</section>

<?php include('../includes/footer.php'); ?>
