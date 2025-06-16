<?php
// Database configuration
$host = "localhost";        // Usually localhost
$db_user = "root";          // Database username (e.g., root on localhost)
$db_pass = "";              // Database password
$db_name = "bookmytrain";   // Your database name

// Create connection
$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
