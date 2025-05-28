<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>BookMyTrain</title>

  <!-- ✅ Local CSS -->
  <link rel="stylesheet" href="assets/css/style.css">

  <!-- ✅ AOS Animation Library -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
</head>
<body>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>

<!-- Hero Section -->
<section class="hero">
  <div class="container hero-content">
    <div class="text-content" data-aos="fade-right">
      <h1>Welcome to <span class="highlight">BookMyTrain</span></h1>
      <p>Book train tickets in seconds with real-time schedules and seat availability.</p>
      <a href="user/book-ticket.php" class="btn-primary pulse">🚆 Book Now</a>
    </div>
    <div class="image-content" data-aos="fade-left">
      <img src="assets/image/train-hero.gif" alt="Train Booking" class="hero-img" />
    </div>
  </div>
</section>

<!-- Why Choose Us -->
<section class="features-section">
  <div class="features-bg-animation"></div>

  <div class="container">
    <h2 class="section-title" data-aos="fade-up">Why Choose BookMyTrain?</h2>
    <div class="features-grid">
      <div class="feature-card" data-aos="zoom-in">
        <img src="assets/image/easy.jpg" alt="Easy Booking">
        <h3>Easy Booking</h3>
        <p>Intuitive platform that makes booking fast and hassle-free.</p>
      </div>
      <div class="feature-card" data-aos="zoom-in" data-aos-delay="100">
        <img src="assets/image/live.jpg" alt="Live Info">
        <h3>Live Train Info</h3>
        <p>Access real-time train schedules, delays, and seat availability.</p>
      </div>
      <div class="feature-card" data-aos="zoom-in" data-aos-delay="200">
        <img src="assets/image/support.jpg" alt="Support">
        <h3>24/7 Support</h3>
        <p>We are here for you anytime, anywhere in Sri Lanka.</p>
      </div>
    </div>
  </div>
</section>

<!-- Live Stats -->
<section class="stats-section">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up">BookMyTrain in Numbers</h2>
    <div class="stats-grid">
      <div class="stat-card" data-aos="fade-up">
        <div class="stat-icon">🎟️</div>
        <div class="stat-number"><span class="counter" data-target="20000">0</span>+</div>
        <p class="stat-label">Tickets Booked</p>
      </div>
      <div class="stat-card" data-aos="fade-up" data-aos-delay="100">
        <div class="stat-icon">🛤️</div>
        <div class="stat-number"><span class="counter" data-target="1500">0</span>+</div>
        <p class="stat-label">Routes Covered</p>
      </div>
      <div class="stat-card" data-aos="fade-up" data-aos-delay="200">
        <div class="stat-icon">😊</div>
        <div class="stat-number"><span class="counter" data-target="10000">0</span>+</div>
        <p class="stat-label">Happy Customers</p>
      </div>
    </div>
  </div>
</section>


<!-- Testimonials -->
<section class="testimonials-section">
  <div class="container">
    <h2 class="section-title" data-aos="fade-up">Trusted by Thousands of Travelers</h2>
    <p class="testimonials-subtitle" data-aos="fade-up" data-aos-delay="100">
      See what our happy users say about their experience with BookMyTrain.
    </p>

    <div class="testimonials-wrapper" data-aos="fade-up" data-aos-delay="200">
      <!-- Testimonial Card -->
      <div class="testimonial-card">
        <div class="quote-icon">❝</div>
        <p class="testimonial-text">Booking a train has never been this smooth. It’s quick, clear, and I can see all available seats. Love it!</p>
        <h4 class="testimonial-author">– Nimesh Fernando</h4>
        <span class="testimonial-location">Colombo</span>
      </div>

      <div class="testimonial-card">
        <div class="quote-icon">❝</div>
        <p class="testimonial-text">As someone who commutes weekly, BookMyTrain has become my go-to. No more long queues!</p>
        <h4 class="testimonial-author">– Sanduni Perera</h4>
        <span class="testimonial-location">Kandy</span>
      </div>

      <div class="testimonial-card">
        <div class="quote-icon">❝</div>
        <p class="testimonial-text">The real-time info and email confirmations are just perfect. Truly a professional platform!</p>
        <h4 class="testimonial-author">– Kavindu Rajapaksha</h4>
        <span class="testimonial-location">Galle</span>
      </div>
    </div>
  </div>
</section>




<!-- Newsletter Section - Elegant & Advanced -->
<section class="newsletter-section-modern">
  <div class="newsletter-container">
    <div class="newsletter-glass" data-aos="zoom-in">
      <div class="newsletter-icon">📩</div>
      <h2 class="newsletter-heading">Join Our Train Updates</h2>
      <p class="newsletter-subtext">Be the first to know about exclusive deals, train alerts, and more!</p>
      <form id="newsletter-form" class="newsletter-form-modern">
        <input type="email" id="email" placeholder="Your email address" required>
        <button type="submit">Subscribe</button>
      </form>
    </div>
  </div>
</section>





<?php include('includes/footer.php'); ?>

<!-- ✅ Scripts -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ duration: 1200, once: true });

  // Animated Counter
  document.querySelectorAll('.counter').forEach(counter => {
    const update = () => {
      const target = +counter.dataset.target;
      const current = +counter.innerText;
      const increment = target / 200;
      if (current < target) {
        counter.innerText = Math.ceil(current + increment);
        setTimeout(update, 10);
      } else {
        counter.innerText = target;
      }
    };
    update();
  });

  // Newsletter Email Validation
  document.getElementById('newsletter-form').addEventListener('submit', function(e) {
    e.preventDefault();
    const email = document.getElementById('email').value;
    const re = /\S+@\S+\.\S+/;
    if (re.test(email)) {
      alert('Thank you for subscribing!');
    } else {
      alert('Please enter a valid email address.');
    }
  });
</script>

<script src="assets/js/script.js"></script>

<style>
 /* === General === */
body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #fff;
  color: #222;
  line-height: 1.6;
}

.container {
  width: 90%;
  max-width: 1200px;
  margin: auto;
}

/* === Hero Section === */
.hero {
  padding: 80px 0;
  background: #f9f9f9;
}

.hero-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 40px;
}

.text-content {
  flex: 1 1 50%;
  max-width: 600px;
}

.text-content h1 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

.text-content .highlight {
  color: #7e3af2;
}

.text-content p {
  font-size: 1.2rem;
  margin-bottom: 20px;
  color: #333;
}

.btn-primary {
  background-color: #7e3af2;
  color: white;
  padding: 12px 24px;
  text-decoration: none;
  border-radius: 6px;
  font-weight: bold;
  transition: background 0.3s;
}

.btn-primary:hover {
  background-color: #692bd6;
}

.image-content {
  flex: 1 1 45%;
  text-align: center;
}

.hero-img {
  width: 100%;
  max-width: 450px;
  height: auto;
}

/* === Why Choose Us Section === */
.features-section {
  position: relative;
  padding: 100px 0;
  overflow: hidden;
  background: #f5f7fa;
  z-index: 1;
}

.features-bg-animation {
  position: absolute;
  top: -50%;
  left: -50%;
  width: 200%;
  height: 200%;
  background: radial-gradient(circle at 20% 20%, #7e3af2 0%, transparent 40%),
              radial-gradient(circle at 80% 30%, #34d399 0%, transparent 30%),
              radial-gradient(circle at 50% 80%, #3b82f6 0%, transparent 25%);
  animation: moveBg 20s linear infinite;
  z-index: 0;
  opacity: 0.07;
}

@keyframes moveBg {
  0% { transform: rotate(0deg) scale(1); }
  50% { transform: rotate(180deg) scale(1.2); }
  100% { transform: rotate(360deg) scale(1); }
}

.section-title {
  text-align: center;
  font-size: 2.5rem;
  margin-bottom: 50px;
  color: #222;
  z-index: 1;
  position: relative;
}

.features-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 30px;
  position: relative;
  z-index: 1;
}

.feature-card {
  background: white;
  padding: 30px 20px;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
  text-align: center;
  transition: all 0.4s ease;
  border-top: 5px solid transparent;
  position: relative;
  z-index: 2;
}

.feature-card:hover {
  transform: translateY(-10px);
  border-top: 5px solid #7e3af2;
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.1);
}

.feature-card img {
  width: 80px;
  height: 80px;
  margin-bottom: 20px;
  transition: transform 0.3s;
}

.feature-card:hover img {
  transform: scale(1.1);
}

.feature-card h3 {
  font-size: 1.4rem;
  margin-bottom: 12px;
  color: #333;
}

.feature-card p {
  font-size: 1rem;
  color: #555;
}

/* === Live Stats Section === */
.stats-section {
  background: #f4f6fa;
  padding: 100px 0;
  text-align: center;
}

.stats-grid {
  display: flex;
  justify-content: center;
  gap: 40px;
  flex-wrap: wrap;
  margin-top: 40px;
}

.stat-card {
  background: white;
  padding: 30px 20px;
  border-radius: 16px;
  box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
  width: 250px;
  transition: transform 0.3s ease;
}

.stat-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.08);
}

.stat-icon {
  font-size: 40px;
  margin-bottom: 20px;
  color: #7e3af2;
}

.stat-number {
  font-size: 2.2rem;
  font-weight: bold;
  color: #222;
}

.stat-label {
  font-size: 1.1rem;
  color: #666;
  margin-top: 10px;
}

/* === Testimonials Section (Final Pro Style) === */
.testimonials-section {
  padding: 100px 0;
  background: linear-gradient(to right, #f7faff, #eef2ff);
  position: relative;
}

.testimonials-subtitle {
  text-align: center;
  color: #666;
  font-size: 1.1rem;
  max-width: 600px;
  margin: 0 auto 50px;
  line-height: 1.6;
}

.testimonials-wrapper {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
  gap: 40px;
  position: relative;
  z-index: 2;
}

.testimonial-card {
  background: #fff;
  border-radius: 20px;
  padding: 40px 30px;
  position: relative;
  box-shadow: 0 12px 28px rgba(0, 0, 0, 0.06);
  transition: all 0.3s ease;
}

.testimonial-card:hover {
  transform: translateY(-6px);
  box-shadow: 0 18px 36px rgba(0, 0, 0, 0.08);
}

.quote-icon {
  font-size: 40px;
  color: #7e3af2;
  position: absolute;
  top: 25px;
  left: 30px;
  opacity: 0.15;
}

.testimonial-text {
  font-size: 1.1rem;
  color: #333;
  margin-bottom: 20px;
  line-height: 1.7;
  padding-top: 20px;
}

.testimonial-author {
  font-weight: 600;
  color: #222;
  font-size: 1rem;
  margin-bottom: 5px;
}

.testimonial-location {
  font-size: 0.9rem;
  color: #888;
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .testimonials-wrapper {
    display: flex;
    overflow-x: auto;
    scroll-snap-type: x mandatory;
    gap: 20px;
    padding-bottom: 10px;
  }

  .testimonial-card {
    flex: 0 0 85%;
    scroll-snap-align: start;
    min-width: 280px;
  }

  .testimonials-wrapper::-webkit-scrollbar {
    display: none;
  }
}


/* === Modern Newsletter Section === */
.newsletter-section-modern {
  position: relative;
  background: linear-gradient(135deg, #7e3af2 0%, #a78bfa 100%);
  padding: 120px 20px;
  display: flex;
  justify-content: center;
  align-items: center;
  overflow: hidden;
}

.newsletter-container {
  max-width: 720px;
  width: 100%;
  padding: 20px;
  position: relative;
  z-index: 1;
}

.newsletter-glass {
  background: rgba(255, 255, 255, 0.07);
  border: 1.5px solid rgba(255, 255, 255, 0.15);
  border-radius: 20px;
  padding: 60px 40px;
  text-align: center;
  backdrop-filter: blur(18px);
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
  position: relative;
}

.newsletter-glass::before {
  content: "";
  position: absolute;
  inset: -2px;
  z-index: -1;
  border-radius: 22px;
  background: linear-gradient(120deg, #34d399, #3b82f6, #7e3af2);
  background-size: 200% 200%;
  animation: borderGlow 8s ease infinite;
  mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  mask-composite: exclude;
  -webkit-mask-composite: destination-out;
}

.newsletter-icon {
  font-size: 48px;
  margin-bottom: 10px;
  animation: pulse 2s infinite;
}

.newsletter-heading {
  color: white;
  font-size: 2rem;
  font-weight: 700;
  margin-bottom: 15px;
}

.newsletter-subtext {
  color: #e5e7eb;
  font-size: 1rem;
  margin-bottom: 30px;
}

.newsletter-form-modern {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content: center;
}

.newsletter-form-modern input[type="email"] {
  padding: 14px;
  width: 100%;
  max-width: 320px;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  background: #fff;
  color: #333;
  box-shadow: 0 0 0 3px transparent;
  transition: box-shadow 0.3s ease;
}

.newsletter-form-modern input[type="email"]:focus {
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.4);
  outline: none;
}

.newsletter-form-modern button {
  background-color: #34d399;
  border: none;
  padding: 14px 28px;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  color: #fff;
  cursor: pointer;
  transition: background 0.3s ease;
}

.newsletter-form-modern button:hover {
  background-color: #059669;
}

/* === Animations === */
@keyframes borderGlow {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

@keyframes pulse {
  0%, 100% { transform: scale(1); opacity: 1; }
  50% { transform: scale(1.1); opacity: 0.85; }
}

/* Responsive */
@media (max-width: 768px) {
  .newsletter-glass {
    padding: 40px 20px;
  }

  .newsletter-form-modern {
    flex-direction: column;
  }

  .newsletter-form-modern input,
  .newsletter-form-modern button {
    width: 100%;
  }
}


</style>
</body>
</html>
