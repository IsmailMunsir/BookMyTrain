<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
  echo "<script>alert('Unauthorized access.'); window.location.href = '../auth/login.php';</script>";
  exit;
}

$user_id = $_SESSION['user_id'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$password = $_POST['password'];

// Check if email exists for another user
$email_check = mysqli_query($conn, "SELECT id FROM users WHERE email = '$email' AND id != $user_id");
if (mysqli_num_rows($email_check) > 0) {
  echo "<script>alert('This email is already in use.'); window.history.back();</script>";
  exit;
}

// Build query
if (!empty($password)) {
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);
  $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone', password = '$hashed_password' WHERE id = $user_id";
} else {
  $sql = "UPDATE users SET name = '$name', email = '$email', phone = '$phone' WHERE id = $user_id";
}

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Profile updated successfully.'); window.location.href = 'profile.php';</script>";
} else {
  echo "<script>alert('Update failed.'); window.history.back();</script>";
}
?>


<style>
    .user-profile {
  background: #f9f9ff;
  padding: 70px 20px;
  font-family: 'Segoe UI', sans-serif;
}

.profile-wrapper {
  max-width: 700px;
  margin: auto;
  background: white;
  padding: 40px;
  border-radius: 20px;
  box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
}

.profile-header {
  text-align: center;
  margin-bottom: 30px;
}

.profile-header h1 {
  font-size: 2.2rem;
  color: #7e3af2;
}

.profile-header p {
  font-size: 1rem;
  color: #555;
  margin-top: 10px;
}

.avatar {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  margin-bottom: 15px;
  border: 4px solid #7e3af2;
}

.edit-info-card {
  background-color: #eef1ff;
  border-left: 5px solid #7e3af2;
  padding: 20px;
  border-radius: 12px;
  margin-bottom: 30px;
}

.edit-info-card h2 {
  margin: 0;
  font-size: 1.3rem;
  color: #333;
}

.edit-info-card p {
  margin-top: 8px;
  color: #555;
  font-size: 0.95rem;
}

.profile-form .input-group {
  display: flex;
  flex-direction: column;
  margin-bottom: 20px;
}

.profile-form label {
  font-weight: bold;
  margin-bottom: 6px;
  color: #333;
}

.profile-form input {
  padding: 12px 15px;
  border-radius: 8px;
  border: 1px solid #ccc;
  font-size: 1rem;
}

.btn-submit {
  display: block;
  margin: 30px auto 0;
  background-color: #7e3af2;
  color: white;
  padding: 12px 30px;
  font-size: 1rem;
  font-weight: bold;
  border: none;
  border-radius: 25px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-submit:hover {
  background-color: #5a28c8;
}

</style>