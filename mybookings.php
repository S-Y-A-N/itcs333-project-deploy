<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$conn = connectDB();
$userId = $_SESSION['user_id'];

$stmt = $conn->prepare("SELECT bookings.id, rooms.name, bookings.booking_time FROM bookings JOIN rooms ON bookings.room_id = rooms.id WHERE bookings.user_id = :user_id");
$stmt->bindParam(':user_id', $userId);
$stmt->execute();
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>My Bookings</h2>
    <ul>
        <?php foreach ($bookings as $booking): ?>
            <li>
                <?php echo $booking['name']; ?> - <?php echo $booking['booking_time']; ?>
                <a href="cancel_booking.php?id=<?php echo $booking