<?php include('../includes/header.php'); ?>

<!-- ✅ Styles & Fonts -->
<link rel="stylesheet" href="../assets/css/user/feedback.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<!-- ✅ Feedback Section -->
<section class="feedback-form" data-aos="fade-up">
  <div class="container feedback-wrapper">
    <div class="feedback-text" data-aos="fade-right">
      <h1><i class="fas fa-comments"></i> We’d Love Your Feedback</h1>
      <p>Your opinion helps us improve our services and serve you better.</p>
    </div>

    <form action="submit-feedback.php" method="POST" class="form-area" data-aos="fade-left">
      <div class="input-group">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
      </div>
      <textarea name="feedback" placeholder="Write your message here..." rows="6" required></textarea>
      <button type="submit" class="btn-submit">Submit Feedback</button>
    </form>
  </div>
</section>

<!-- ✅ Scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script src="../assets/js/user/feedback.js"></script>
<script>
  AOS.init();
</script>

<style>
  .feedback-form {
  background: #f1f4fd;
  padding: 70px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.feedback-wrapper {
  max-width: 800px;
  margin: 0 auto;
  background: white;
  padding: 40px;
  border-radius: 15px;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
}

.feedback-text {
  text-align: center;
  margin-bottom: 30px;
}

.feedback-text h1 {
  font-size: 2.5rem;
  color: #7e3af2;
  margin-bottom: 10px;
}

.feedback-text p {
  font-size: 1.1rem;
  color: #555;
}

.form-area {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.input-group {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}

.input-group input {
  flex: 1;
  padding: 12px 15px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 1rem;
}

textarea {
  width: 100%;
  padding: 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  font-size: 1rem;
  resize: vertical;
}

.btn-submit {
  background-color: #7e3af2;
  color: white;
  padding: 12px 30px;
  font-size: 1rem;
  font-weight: bold;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  align-self: center;
}

.btn-submit:hover {
  background-color: #5a28c8;
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', () => {
  const btn = document.querySelector('.btn-submit');

  btn.addEventListener('click', () => {
    btn.innerText = "Sending...";
    setTimeout(() => {
      btn.innerText = "Submit Feedback";
    }, 1500);
  });
});

</script>
<?php include('../includes/footer.php'); ?>
