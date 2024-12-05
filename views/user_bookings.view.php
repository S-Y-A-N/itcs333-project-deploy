<?php require 'partials/head.php'; ?>
<?php require 'partials/user-header.php'; ?>
<?php require 'partials/search-bar.php'; ?>

<section>
    <a href="/home">Return to home page</a>
</section>

<h2>Upcoming Bookings</h2>
<ul>
    <?php foreach ($upcoming as $booking): ?>
        <li><?php echo htmlspecialchars($booking['room_id']); ?> at <?php echo htmlspecialchars($booking['start_time']); ?></li>
    <?php endforeach; ?>
</ul>

<h2>Past Bookings</h2>
<ul>
    <?php foreach ($past as $booking): ?>
        <li><?php echo htmlspecialchars($booking['room_id']); ?> at <?php echo htmlspecialchars($booking['start_time']); ?></li>
    <?php endforeach; ?>
</ul>

<?php require 'partials/footer.php'; ?>