<?php require 'partials/head.php'; ?>
<?php require 'partials/protected-header.php'; ?>
<?php require 'partials/search-bar.php'; ?>

<section>
    <a href="/home">Return to home page</a>
</section>

    <title>Reporting</title>
 
    <h1>Booking Reports</h1>
    <h2>Total Bookings: <?php echo htmlspecialchars($totalBookings); ?></h2>
 
    <h2>Most Popular Rooms</h2>
    <ul>
        <?php foreach ($mostPopularRooms as $room): ?>
            <li>Room ID: <?php echo htmlspecialchars($room['room_id']); ?> - Bookings: <?php echo htmlspecialchars($room['booking_count']); ?></li>
        <?php endforeach; ?>
    </ul>

    <?php require 'partials/footer.php'; ?>