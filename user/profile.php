<?php
session_start();
include('../config/db.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

$user_id = mysqli_real_escape_string($conn, $_SESSION['user_id']);
$query = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'");
$user = mysqli_fetch_assoc($query);

// Handle Profile Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($conn, $_POST['name']);
    $phone   = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    $update_sql = "UPDATE users SET name='$name', phone='$phone', address='$address'";

    if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
        $target_dir = "uploads/";
        $server_path = __DIR__ . '/uploads/';
        
        if (!is_dir($server_path)) {
            mkdir($server_path, 0777, true);
        }

        $filename = time() . '_' . basename($_FILES["profile"]["name"]);
        $target_file = $server_path . $filename;

        if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
            $update_sql .= ", profile_image='" . mysqli_real_escape_string($conn, $filename) . "'";
        }
    }

    $update_sql .= " WHERE id='$user_id'";
    if (mysqli_query($conn, $update_sql)) {
        header("Location: profile.php?updated=1");
        exit;
    } else {
        $error = "Profile update failed.";
    }
}
?>

<?php include('../includes/header.php'); ?>
<link rel="stylesheet" href="../assets/css/user/profile.css">

<div class="profile-container">
  <h2><i class="fas fa-user-circle"></i> My Profile</h2>

  <?php if (isset($_GET['updated'])): ?>
    <p class="success-msg">✅ Profile updated successfully.</p>
  <?php elseif (!empty($error)): ?>
    <p class="error-msg"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>

  <form action="" method="POST" enctype="multipart/form-data">
    <div class="avatar-wrapper">
      <?php
        $image_relative_path = "uploads/" . $user['profile_image'];
        $full_server_path = __DIR__ . "/uploads/" . $user['profile_image'];
        $imagePath = (!empty($user['profile_image']) && file_exists($full_server_path))
          ? $image_relative_path
          : "../assets/image/default.png";
      ?>
      <img src="<?= htmlspecialchars($imagePath) ?>" alt="Profile Image" class="profile-avatar">
      <input type="file" name="profile" accept="image/*">
    </div>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
    <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required>
    <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required>
    <input type="email" value="<?= htmlspecialchars($user['email']) ?>" disabled>
    <button type="submit">Update Profile</button>
  </form>
</div>

<style>
  /* General Reset */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  font-family: 'Segoe UI', sans-serif;
  background: #f1f4fd;
  min-height: 100vh;
  display: flex;
  flex-direction: column;
}

/* Profile Container */
.profile-container {
  background: #ffffff;
  padding: 40px;
  border-radius: 16px;
  max-width: 500px;
  width: 100%;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
  text-align: center;
  margin: 80px auto;
}

.profile-container h2 {
  margin-bottom: 25px;
  font-size: 26px;
  color: #333;
}

/* Avatar */
.avatar-wrapper {
  margin-bottom: 25px;
}

.profile-avatar {
  width: 120px;
  height: 120px;
  object-fit: cover;
  border-radius: 50%;
  border: 4px solid #2575fc;
  margin-bottom: 10px;
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
}

/* Inputs */
input[type="text"],
input[type="email"],
input[type="file"] {
  width: 100%;
  padding: 14px;
  margin-bottom: 18px;
  border-radius: 10px;
  border: 1px solid #ccc;
  font-size: 15px;
  transition: all 0.3s ease;
}

input:focus {
  outline: none;
  border-color: #2575fc;
  box-shadow: 0 0 6px rgba(37, 117, 252, 0.3);
}

/* Submit Button */
button {
  width: 100%;
  padding: 14px;
  background-color: #2575fc;
  color: white;
  border: none;
  border-radius: 10px;
  font-size: 16px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #1a5fd0;
}

/* Success and Error Messages */
.success-msg {
  color: green;
  margin-bottom: 20px;
  font-weight: 600;
}

.error-msg {
  color: red;
  margin-bottom: 20px;
  font-weight: 600;
}

/* Responsive */
@media (max-width: 600px) {
  .profile-container {
    margin: 40px 20px;
    padding: 30px;
  }

  .profile-container h2 {
    font-size: 22px;
  }

  .profile-avatar {
    width: 100px;
    height: 100px;
  }

  input[type="text"],
  input[type="email"],
  input[type="file"],
  button {
    font-size: 14px;
  }
}

</style>

<?php include('../includes/footer.php'); ?>
