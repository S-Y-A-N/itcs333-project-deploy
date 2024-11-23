<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// $conn = connectDB();
$bookingId = $_GET['id'];

$stmt = $conn->prepare("DELETE FROM bookings WHERE id = :id");
$stmt->bindParam(':id', $bookingId);

if ($stmt->execute()) {
    echo "Booking cancelled successfully.";
    header("Location: my_bookings.php");
} else {
    echo "Failed to cancel the booking.";
}
?>
