<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="metrics">
        <div>Rooms: <?php echo $roomCount; ?></div>
        <div>Schedules: <?php echo $scheduleCount; ?></div>
    </div>
    <nav>
        <ul>
            <li><a href="admin_rooms.php">Manage Rooms</a></li>
            <li><a href="admin_schedules.php">Manage Schedules</a></li>
        </ul>
    </nav>
</body>
</html>
