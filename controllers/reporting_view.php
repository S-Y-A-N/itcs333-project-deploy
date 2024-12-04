<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reporting</title>
</head>
<body>
    <h1>Booking Reports</h1>
    <h2>Total Bookings: <?php echo htmlspecialchars($totalBookings); ?></h2>

    <h2>Most Popular Rooms</h2>
    <ul>
        <?php foreach ($mostPopularRooms as $room): ?>
            <li>Room ID: <?php echo htmlspecialchars($room['room_id']); ?> - Bookings: <?php echo htmlspecialchars($room['booking_count']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>