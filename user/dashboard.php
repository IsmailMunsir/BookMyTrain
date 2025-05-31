<?php include('../includes/header.php'); ?>

<!-- ✅ External CSS -->
<link rel="stylesheet" href="../assets/css/user/dashboard.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- ✅ Dashboard Section -->
<section class="user-dashboard" data-aos="fade-up">
  <div class="container dashboard-wrapper">
    <div class="welcome-box" data-aos="fade-down">
      <h1><i class="fas fa-user-circle"></i> Welcome to Your Dashboard</h1>
      <p>Manage your bookings, update your profile, and share your experience with BookMyTrain.</p>
    </div>

    <div class="dashboard-cards">
      <div class="card" data-aos="zoom-in">
        <i class="fas fa-ticket-alt"></i>
        <h3>Book Ticket</h3>
        <p>Quickly book a train ticket for your journey.</p>
        <a href="book-ticket.php" class="btn-dashboard">Book Now</a>
      </div>
      <div class="card" data-aos="zoom-in" data-aos-delay="100">
        <i class="fas fa-file-alt"></i>
        <h3>My Tickets</h3>
        <p>View and manage your previously booked tickets.</p>
        <a href="my-tickets.php" class="btn-dashboard">View Tickets</a>
      </div>
      <div class="card" data-aos="zoom-in" data-aos-delay="200">
        <i class="fas fa-user-edit"></i>
        <h3>Edit Profile</h3>
        <p>Update your personal details and preferences.</p>
        <a href="profile.php" class="btn-dashboard">Edit Info</a>
      </div>
      <div class="card" data-aos="zoom-in" data-aos-delay="300">
        <i class="fas fa-comment-dots"></i>
        <h3>Feedback</h3>
        <p>Tell us about your experience or suggestions.</p>
        <a href="feedback.php" class="btn-dashboard">Send Feedback</a>
      </div>
    </div>
  </div>
</section>

<!-- ✅ Scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/user/dashboard.js"></script>
<script>
  AOS.init();
</script>
<style>
  .user-dashboard {
  background: #f1f4fd;
  padding: 70px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.dashboard-wrapper {
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}

.welcome-box h1 {
  font-size: 2.7rem;
  color: #7e3af2;
  margin-bottom: 10px;
}

.welcome-box p {
  font-size: 1.1rem;
  color: #444;
}

.dashboard-cards {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 30px;
  margin-top: 60px;
}

.card {
  background: #fff;
  padding: 30px;
  border-radius: 15px;
  width: 260px;
  box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.card:hover {
  transform: translateY(-10px);
}

.card i {
  font-size: 40px;
  color: #7e3af2;
  margin-bottom: 15px;
}

.card h3 {
  font-size: 1.5rem;
  color: #333;
  margin-bottom: 10px;
}

.card p {
  font-size: 0.95rem;
  color: #555;
  margin-bottom: 20px;
}

.btn-dashboard {
  background-color: #7e3af2;
  color: #fff;
  padding: 10px 25px;
  border-radius: 25px;
  text-decoration: none;
  font-weight: bold;
  display: inline-block;
  transition: background-color 0.3s ease;
}

.btn-dashboard:hover {
  background-color: #5a28c8;
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const buttons = document.querySelectorAll('.btn-dashboard');
  buttons.forEach(button => {
    button.addEventListener('mouseenter', () => {
      button.style.transform = 'scale(1.05)';
    });
    button.addEventListener('mouseleave', () => {
      button.style.transform = 'scale(1)';
    });
  });
});

</script>
<?php include('../includes/footer.php'); ?>
