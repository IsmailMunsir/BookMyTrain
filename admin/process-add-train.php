<?php
include('../config/db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $train_name     = mysqli_real_escape_string($conn, $_POST['train_name']);
    $from_station   = mysqli_real_escape_string($conn, $_POST['from_station']);
    $to_station     = mysqli_real_escape_string($conn, $_POST['to_station']);
    $departure_time = $_POST['departure_time'];
    $arrival_time   = $_POST['arrival_time'];
    $train_type     = $_POST['train_type'];

    $sql = "INSERT INTO trains (train_name, from_station, to_station, departure_time, arrival_time, train_type)
            VALUES ('$train_name', '$from_station', '$to_station', '$departure_time', '$arrival_time', '$train_type')";

    if (mysqli_query($conn, $sql)) {
        $_SESSION['message'] = "✅ Train added successfully!";
    } else {
        $_SESSION['message'] = "❌ Failed to add train: " . mysqli_error($conn);
    }

    header("Location: add-train.php");
    exit();
}
?>
