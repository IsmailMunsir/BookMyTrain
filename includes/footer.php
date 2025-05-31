<!-- ✅ Footer CSS -->
<link rel="stylesheet" href="assets/css/footer.css">

<!-- ✅ Footer HTML -->
<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-top">
      
      <!-- Logo & Brand -->
      <div class="footer-brand">
        <img src="assets/image/logo.png" alt="BookMyTrain Logo" class="footer-logo" />
        <h2 class="brand-name">Book<span>My</span>Train</h2>
        <p>Your trusted train booking partner in Sri Lanka.</p>
      </div>
      
      <!-- Quick Links -->
      <div class="footer-links">
        <h3>Quick Links</h3>
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="contact.php">Contact</a></li>
          <li><a href="terms.php">Terms & Conditions</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div class="footer-contact">
        <h3>Contact Us</h3>
        <p><i class="fas fa-envelope"></i> support@bookmytrain.lk</p>
        <p><i class="fas fa-phone"></i> +94 11 123 4567</p>
        <p><i class="fas fa-map-marker-alt"></i> Colombo, Sri Lanka</p>
      </div>
    </div>

    <!-- Copyright -->
    <div class="footer-bottom">
      <p>&copy; <?php echo date("Y"); ?> BookMyTrain. All rights reserved.</p>
    </div>
  </div>
</footer>

<style>
  .site-footer {
  background: linear-gradient(to right, #3b0764, #7e3af2);
  color: white;
  padding: 40px 20px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.footer-container {
  max-width: 1200px;
  margin: 0 auto;
}

.footer-top {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  gap: 30px;
  border-bottom: 1px solid rgba(255, 255, 255, 0.2);
  padding-bottom: 20px;
}

.footer-brand {
  flex: 1 1 300px;
}

.footer-brand .footer-logo {
  width: 190px;
  margin-bottom: -14px;
}

.footer-brand .brand-name {
  font-size: 24px;
  color: #fff;
}

.footer-brand .brand-name span {
  color: #facc15;
}

.footer-links,
.footer-contact {
  flex: 1 1 200px;
}

.footer-links h3,
.footer-contact h3 {
  font-size: 18px;
  margin-bottom: 10px;
  color: #facc15;
}

.footer-links ul {
  list-style: none;
  padding: 0;
}

.footer-links li {
  margin-bottom: 8px;
}

.footer-links a {
  color: #ddd;
  text-decoration: none;
  transition: color 0.3s;
}

.footer-links a:hover {
  color: #fff;
}

.footer-contact p {
  margin: 5px 0;
}

.footer-contact i {
  margin-right: 8px;
  color: #facc15;
}

.footer-bottom {
  text-align: center;
  margin-top: 20px;
  font-size: 14px;
}

</style>
