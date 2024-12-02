<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/admin-header.php'); ?>

<section>
    <h2>Most Booked Rooms</h2>
    <ul>
        <?php foreach ($roomUsage as $usage): ?>
            <li>Room ID: <?php echo htmlspecialchars($usage['room_id']); ?> - Bookings: <?php echo htmlspecialchars($usage['bookings']); ?></li>
        <?php endforeach; ?>
    </ul>
</section>

<?php require base_path('views/partials/footer.php'); ?>