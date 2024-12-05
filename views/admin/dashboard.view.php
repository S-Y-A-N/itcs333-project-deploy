<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/admin-header.php'); ?>

<section>
    <h3>Most Booked Rooms</h3>
    <!-- <ul>
        <?php foreach ($roomUsage as $usage): ?>
            <li>Room ID: <?php echo htmlspecialchars($usage['room_id']); ?> - Bookings: <?php echo htmlspecialchars($usage['bookings']); ?></li>
        <?php endforeach; ?>
    </ul> -->
    <canvas id="mostBookedRooms" style="width:100%; max-width:700px"></canvas>
</section>

<?php print_r($roomUsage) ?>

<script>
    const mostBookedRooms = new Chart("mostBookedRooms", {
        type: "bar",
        data: <?= json_encode($roomUsage) ?>,
        options: {}
    });
</script>

<?php require base_path('views/partials/footer.php'); ?>