<?php
include('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = mysqli_real_escape_string($conn, $_POST["name"]);
    $email    = mysqli_real_escape_string($conn, $_POST["email"]);
    $phone    = mysqli_real_escape_string($conn, $_POST["phone"]);
    $address  = mysqli_real_escape_string($conn, $_POST["address"]);
    $password = $_POST["password"];
    $confirm  = $_POST["confirm_password"];

    if ($password !== $confirm) {
        $error = "Passwords do not match.";
    } elseif (strlen($password) < 6) {
        $error = "Password must be at least 6 characters.";
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Profile image upload
        $profile_img = '';
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] == 0) {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            $filename = time() . '_' . basename($_FILES["profile"]["name"]);
            $target_file = $target_dir . $filename;
            move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file);
            $profile_img = $filename;
        }

        $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
        if (mysqli_num_rows($check) > 0) {
            $error = "Email already registered.";
        } else {
            $query = "INSERT INTO users (name, email, phone, address, password, profile_image) 
                      VALUES ('$name', '$email', '$phone', '$address', '$hashedPassword', '$profile_img')";
            if (mysqli_query($conn, $query)) {
                header("Location: login.php?success=1");
                exit;
            } else {
                $error = "Something went wrong!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Register - BookMyTrain</title>
  <link rel="stylesheet" href="assets/css/auth.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>
<body>
  <div class="auth-container">
    <h2><i class="fas fa-user-plus"></i> Create an Account</h2>

    <?php if (!empty($error)) echo "<p class='error-msg'>$error</p>"; ?>

    <form method="POST" id="register-form" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email Address" required>
      <input type="text" name="phone" placeholder="Phone Number" required>
      <input type="text" name="address" placeholder="Address" required>

      <input type="password" name="password" id="password" placeholder="Password (min 6 characters)" required>
      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
      <small class="password-info">🔐 Password must be at least 6 characters long.</small>

      <input type="file" name="profile" accept="image/*" required>

      <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login here</a></p>
  </div>

  <script src="assets/js/auth.js"></script>
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

.auth-container input[type="file"] {
  padding: 12px;
  background: #f9f9f9;
  font-size: 14px;
}

.auth-container input:focus {
  border-color: #2575fc;
  outline: none;
  box-shadow: 0 0 6px rgba(37, 117, 252, 0.3);
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
    // assets/js/auth.js

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("register-form");
  const inputs = form.querySelectorAll("input");
  const password = document.getElementById("password");
  const confirmPassword = document.getElementById("confirm_password");

  form.addEventListener("submit", (e) => {
    let valid = true;

    inputs.forEach((input) => {
      if (!input.value.trim() && input.type !== "file") {
        input.style.borderColor = "red";
        valid = false;
      } else {
        input.style.borderColor = "#ccc";
      }
    });

    if (password.value.length < 6) {
      password.style.borderColor = "red";
      alert("Password must be at least 6 characters.");
      valid = false;
    }

    if (password.value !== confirmPassword.value) {
      password.style.borderColor = "red";
      confirmPassword.style.borderColor = "red";
      alert("Passwords do not match.");
      valid = false;
    }

    if (!valid) {
      e.preventDefault();
    }
  });
});

</script>