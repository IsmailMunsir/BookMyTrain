<?php
$host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "bookmytrain";

// Create connection
$conn = mysqli_connect($host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
