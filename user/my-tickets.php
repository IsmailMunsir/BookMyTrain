<?php include('../includes/header.php'); ?>

<!-- ✅ CSS and AOS -->
<link rel="stylesheet" href="../assets/css/user/my-tickets.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

<!-- ✅ My Tickets Section -->
<section class="my-tickets" data-aos="fade-up">
  <div class="container">
    <h1><i class="fas fa-ticket-alt"></i> My Booked Tickets</h1>
    <p class="subtitle">Below is the list of your booked tickets. You can cancel them if needed.</p>

    <div class="ticket-list">

      <!-- ✅ Sample Ticket -->
      <div class="ticket-card" data-aos="zoom-in">
        <div class="ticket-info">
          <p><strong>Train:</strong> Express 101</p>
          <p><strong>Date:</strong> 2025-06-10</p>
          <p><strong>From:</strong> Colombo Fort</p>
          <p><strong>To:</strong> Kandy</p>
          <p><strong>Class:</strong> First Class</p>
          <p><strong>Status:</strong> Confirmed</p>
        </div>
        <div class="ticket-actions">
          <a href="cancel-ticket.php?ticket_id=123" class="btn-cancel">Cancel Ticket</a>
        </div>
      </div>

    </div>
  </div>
</section>

<!-- ✅ JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/user/my-tickets.js"></script>
<script>
  AOS.init();
</script>


<style>
  .my-tickets {
  background: #f9f9ff;
  padding: 70px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.my-tickets .container {
  max-width: 1000px;
  margin: auto;
  text-align: center;
}

.my-tickets h1 {
  font-size: 2.5rem;
  color: #7e3af2;
  margin-bottom: 10px;
}

.my-tickets .subtitle {
  font-size: 1.1rem;
  color: #444;
  margin-bottom: 40px;
}

.my-tickets .ticket-list {
  display: flex;
  flex-direction: column;
  gap: 30px;
}

.my-tickets .ticket-card {
  background: white;
  display: flex;
  justify-content: space-between;
  align-items: flex-start;
  padding: 25px;
  border-radius: 15px;
  box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
  transition: transform 0.3s ease;
}

.my-tickets .ticket-card:hover {
  transform: translateY(-5px);
}

.my-tickets .ticket-info p {
  margin: 6px 0;
  font-size: 1rem;
  color: #333;
  text-align: left;
}

.my-tickets .ticket-actions {
  display: flex;
  align-items: center;
}

.my-tickets .btn-cancel {
  background-color: #e63946;
  color: #fff;
  padding: 10px 20px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.my-tickets .btn-cancel:hover {
  background-color: #c12834;
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const cancelButtons = document.querySelectorAll('.btn-cancel');

  cancelButtons.forEach(button => {
    button.addEventListener('click', (e) => {
      const confirmed = confirm("Are you sure you want to cancel this ticket?");
      if (!confirmed) {
        e.preventDefault();
      }
    });
  });
});

</script>
<?php include('../includes/footer.php'); ?>
