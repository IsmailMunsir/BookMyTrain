<?php
$host = "localhost";        // or 127.0.0.1
$user = "root";             // default XAMPP user
$password = "";             // default XAMPP password (leave empty)
$database = "bookmytrain";  // your database name

$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
