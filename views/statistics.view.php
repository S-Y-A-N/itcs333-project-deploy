<?php require 'partials/head.php'; ?>
<?php require 'partials/protected-header.php'; ?>
<?php require 'partials/search-bar.php'; ?>

<section>
    <a href="/home">Return to home page</a>
</section>

    <title>Admin Dashboard</title>

    <h1>Room Usage Statistics</h1>
    <ul>
        <?php foreach ($roomUsage as $usage): ?>
            <li>Room ID: <?php echo htmlspecialchars($usage['room_id']); ?> - Bookings: <?php echo htmlspecialchars($usage['bookings']); ?></li>
        <?php endforeach; ?>
    </ul>

    <?php require 'partials/footer.php'; ?>