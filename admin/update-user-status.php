<?php
session_start();
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
  $action = $_POST['action'];

  if ($user_id && in_array($action, ['ban', 'unban'])) {
    $status = $action === 'ban' ? 'banned' : 'active';
    $query = "UPDATE users SET status='$status' WHERE id='$user_id'";
    mysqli_query($conn, $query);
  }
}
header("Location: manage-users.php");
exit;
?>
