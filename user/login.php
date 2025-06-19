<?php
include('config/db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email    = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = $_POST["password"];

    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user["password"])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            header("Location: user/dashboard.php");
            exit;
        } else {
            $error = "Invalid password.";
        }
    } else {
        $error = "Email not found.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login - BookMyTrain</title>
  <link rel="stylesheet" href="assets/css/auth.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
  <div class="auth-container">
    <h2><i class="fas fa-sign-in-alt"></i> User Login</h2>

    <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>
    <?php if (isset($_GET['success'])) echo "<p class='success-msg'>🎉 Registration successful. Please login.</p>"; ?>

    <form method="POST" id="login-form">
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register here</a></p>
  </div>

  <script src="assets/js/auth-login.js"></script>
</body>
</html>


<style>
    /* assets/css/auth.css */

body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(135deg, #6a11cb, #2575fc);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.auth-container {
  background: #fff;
  padding: 40px 30px;
  max-width: 480px;
  width: 100%;
  border-radius: 20px;
  box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
  animation: slideFade 0.6s ease-in-out;
}

.auth-container h2 {
  margin-bottom: 25px;
  color: #333;
  text-align: center;
}

.auth-container form {
  display: flex;
  flex-direction: column;
}

.auth-container input {
  padding: 14px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 10px;
  font-size: 15px;
  transition: 0.3s ease;
}

.auth-container input:focus {
  border-color: #2575fc;
  outline: none;
  box-shadow: 0 0 6px rgba(37, 117, 252, 0.3);
}

.auth-container input[type="file"] {
  padding: 12px;
  background: #f9f9f9;
  font-size: 14px;
}

.auth-container button {
  padding: 14px;
  background-color: #2575fc;
  color: #fff;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.auth-container button:hover {
  background-color: #1a5fd0;
}

.auth-container p {
  text-align: center;
  margin-top: 16px;
  font-size: 14px;
}

.auth-container a {
  color: #2575fc;
  text-decoration: none;
}

.auth-container a:hover {
  text-decoration: underline;
}

.error-msg {
  color: red;
  margin-bottom: 15px;
  text-align: center;
}

.success-msg {
  color: green;
  margin-bottom: 15px;
  text-align: center;
}

.password-info {
  font-size: 13px;
  color: #666;
  margin-top: -10px;
  margin-bottom: 16px;
  display: block;
}

@keyframes slideFade {
  from {
    opacity: 0;
    transform: translateY(-40px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>

<script>
    // assets/js/auth-login.js

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("login-form");
  const inputs = form.querySelectorAll("input");

  form.addEventListener("submit", (e) => {
    let valid = true;

    inputs.forEach((input) => {
      if (!input.value.trim()) {
        input.style.borderColor = "red";
        valid = false;
      } else {
        input.style.borderColor = "#ccc";
      }
    });

    if (!valid) {
      e.preventDefault();
      alert("Please fill in all fields.");
    }
  });
});

</script>