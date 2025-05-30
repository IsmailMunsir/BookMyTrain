<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/user/book-ticket.css">

<section class="book-ticket">
  <div class="container">
    <h1>Book Your Train Ticket</h1>
    <form action="process-booking.php" method="POST">
      <input type="text" name="from" placeholder="From Station" required>
      <input type="text" name="to" placeholder="To Station" required>
      <input type="date" name="travel_date" required>
      <select name="class">
        <option value="first">First Class</option>
        <option value="second">Second Class</option>
        <option value="third">Third Class</option>
      </select>
      <button type="submit" class="btn-primary">Book Ticket</button>
    </form>
  </div>
</section>

<?php include('../includes/footer.php'); ?>
