<?php
session_start();
include('../config/db.php'); // ✅ Full DB connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, trim($_POST['name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $feedback = mysqli_real_escape_string($conn, trim($_POST['feedback']));

    if (!empty($name) && !empty($email) && !empty($feedback)) {
        $sql = "INSERT INTO feedback (name, email, feedback, submitted_at) VALUES ('$name', '$email', '$feedback', NOW())";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success'] = "Thank you! Your feedback has been submitted.";
        } else {
            $_SESSION['error'] = "Oops! Something went wrong. Please try again.";
        }
    } else {
        $_SESSION['error'] = "Please fill in all the required fields.";
    }

    header("Location: feedback-success.php");
    exit();
} else {
    header("Location: feedback.php");
    exit();
}
?>
