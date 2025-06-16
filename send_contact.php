<?php
// Database connection settings
$host = "localhost";
$username = "root";       // Change if your DB user is different
$password = "";           // Change if you use a password
$database = "bookmytrain";

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check the DB connection
if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// Check if form is submitted via POST
if ($_SERVER["REQUEST_METHOD"] === "POST") {

  // Sanitize user input
  $name = trim(htmlspecialchars($_POST['name']));
  $email = trim(htmlspecialchars($_POST['email']));
  $message = trim(htmlspecialchars($_POST['message']));

  // Prepare the SQL insert statement
  $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");

  if ($stmt) {
    $stmt->bind_param("sss", $name, $email, $message);

    // Execute and handle result
    if ($stmt->execute()) {
      echo "<script>alert('✅ Your message was sent successfully!'); window.location.href='contact.php';</script>";
    } else {
      echo "<script>alert('❌ Error sending your message. Try again later.'); window.location.href='contact.php';</script>";
    }

    $stmt->close();
  } else {
    echo "<script>alert('❌ Failed to prepare database query.'); window.location.href='contact.php';</script>";
  }

} else {
  // Redirect if accessed without POST
  header("Location: contact.php");
  exit();
}

// Close DB connection
$conn->close();
?>
