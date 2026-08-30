<?php
// System time settings
date_default_timezone_set('Asia/Karachi'); // Set to your local timezone

// System date & time
$current_date = date('Y-m-d');
$current_day = date('l');
$current_time = date('H:i:s');

// Get data from URL
$username = $_GET['name'] ?? 'Unknown';
$seat_numbers = $_GET['seat'] ?? '';
$total_price = $_GET['total'] ?? 0;

// DB Connection
$conn = new mysqli('localhost', 'root', '', 'movie_booking');

if ($conn->connect_error) {
  die("Database connection failed: " . $conn->connect_error);
}

// Insert data
$sql = "INSERT INTO tickets (username, seat_numbers, total_price, booking_date, booking_day, booking_time) 
        VALUES ('$username', '$seat_numbers', $total_price, '$current_date', '$current_day', '$current_time')";

if ($conn->query($sql) === TRUE) {
  echo "<h2 style='color:green;'>Booking Successful!</h2>";
  echo "<p>Name: $username</p>";
  echo "<p>Seats: $seat_numbers</p>";
  echo "<p>Total Price: $total_price</p>";
  echo "<p>Date: $current_date</p>";
  echo "<p>Day: $current_day</p>";
  echo "<p>Time: $current_time</p>";
} else {
  echo "Error: " . $conn->error;
}

$conn->close();
?>
