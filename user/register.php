<?php
include('config/db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already registered.";
    } else {
        $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $query)) {
            header("Location: login.php?success=1");
            exit;
        } else {
            $error = "Something went wrong!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
</head>
<body>
  <h2>User Register</h2>
  <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
  <form method="POST">
    <input type="text" name="name" placeholder="Full Name" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit">Register</button>
  </form>
  <p>Already have an account? <a href="login.php">Login</a></p>
</body>
</html>


<style>
    /* auth.css */

body {
  margin: 0;
  padding: 0;
  font-family: 'Segoe UI', sans-serif;
  background: linear-gradient(to right, #6a11cb, #2575fc);
  height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
}

.auth-container {
  background: #fff;
  padding: 40px;
  width: 100%;
  max-width: 400px;
  border-radius: 16px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
  animation: slideFade 0.8s ease-in-out;
}

.auth-container h2 {
  margin-bottom: 20px;
  color: #333;
  text-align: center;
}

.auth-container form {
  display: flex;
  flex-direction: column;
}

.auth-container input {
  padding: 12px 16px;
  margin-bottom: 16px;
  border: 1px solid #ccc;
  border-radius: 8px;
  transition: 0.3s ease;
}

.auth-container input:focus {
  border-color: #2575fc;
  outline: none;
  box-shadow: 0 0 0 3px rgba(37, 117, 252, 0.2);
}

.auth-container button {
  padding: 12px;
  background-color: #2575fc;
  color: #fff;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  font-weight: bold;
  transition: 0.3s;
}

.auth-container button:hover {
  background-color: #1a5fd0;
}

.auth-container p {
  text-align: center;
  margin-top: 10px;
}

.auth-container a {
  color: #2575fc;
  text-decoration: none;
}

.auth-container a:hover {
  text-decoration: underline;
}

@keyframes slideFade {
  from {
    opacity: 0;
    transform: translateY(-30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

</style>

<script>
    // auth.js

document.addEventListener("DOMContentLoaded", () => {
  const form = document.querySelector("form");

  form.addEventListener("submit", (e) => {
    const inputs = form.querySelectorAll("input");
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