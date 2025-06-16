<?php
include('../config/db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $from = mysqli_real_escape_string($conn, $_POST['from']);
  $to = mysqli_real_escape_string($conn, $_POST['to']);
  $travel_date = mysqli_real_escape_string($conn, $_POST['travel_date']);
  $class = mysqli_real_escape_string($conn, $_POST['class']);
  $compartment = mysqli_real_escape_string($conn, $_POST['compartment']);
  $selected_seats = intval($_POST['selected_seats']);

  $gender_data = [];
  for ($i = 1; $i <= $selected_seats; $i++) {
    $gender_key = "gender_seat_$i";
    $gender_data[] = $_POST[$gender_key] ?? 'unspecified';
  }
  $passenger_genders = json_encode($gender_data);

  $sql = "INSERT INTO bookings (from_station, to_station, travel_date, class, compartment, seat_count, passenger_genders) 
          VALUES ('$from', '$to', '$travel_date', '$class', '$compartment', '$selected_seats', '$passenger_genders')";

  if (mysqli_query($conn, $sql)) {
    echo "<script>alert('✅ Ticket booked successfully!'); window.location.href='book-ticket.php';</script>";
  } else {
    echo "❌ Error: " . mysqli_error($conn);
  }
} else {
  echo "❌ Invalid request method.";
}
?>
