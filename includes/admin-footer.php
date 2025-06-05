<footer class="admin-footer">
  <p>&copy; <?php echo date("Y"); ?> BookMyTrain Admin Panel. All rights reserved.</p>
</footer>

<style>
    /* Sidebar */
.sidebar {
  width: 260px;
  background: #7e3af2;
  color: #fff;
  padding: 30px 20px;
  position: fixed;
  top: 0;
  left: 0;
  height: 100vh;
  overflow-y: auto;
}

.sidebar-header {
  text-align: center;
  font-size: 1.5rem;
  margin-bottom: 30px;
}

.sidebar ul {
  list-style: none;
  padding: 0;
}

.sidebar ul li {
  margin: 18px 0;
}

.sidebar ul li a {
  display: flex;
  align-items: center;
  gap: 12px;
  color: white;
  padding: 10px 15px;
  text-decoration: none;
  border-radius: 8px;
  transition: 0.3s;
}

.sidebar ul li a:hover,
.sidebar ul li a.active {
  background: rgba(255, 255, 255, 0.15);
}

/* Footer */
.admin-footer {
  position: fixed;
  bottom: 0;
  left: 260px;
  width: calc(100% - 260px);
  background: #222;
  color: white;
  text-align: center;
  padding: 15px;
  font-size: 0.9rem;
  z-index: 1000;
}

</style>

<script>
    // Example interaction: show alert when sidebar links are clicked
document.addEventListener("DOMContentLoaded", () => {
  const navLinks = document.querySelectorAll(".sidebar ul li a");

  navLinks.forEach(link => {
    link.addEventListener("click", () => {
      console.log(`Navigating to ${link.textContent.trim()}`);
    });
  });
});

</script>