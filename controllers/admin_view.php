<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Room Usage Statistics</h1>
    <ul>
        <?php foreach ($roomUsage as $usage): ?>
            <li>Room ID: <?php echo htmlspecialchars($usage['room_id']); ?> - Bookings: <?php echo htmlspecialchars($usage['bookings']); ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>