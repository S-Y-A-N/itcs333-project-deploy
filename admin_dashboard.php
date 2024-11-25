<?php
session_start();
include 'config.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = connectDB();
$roomCount = $conn->query("SELECT COUNT(*) AS count FROM rooms")->fetch(PDO::FETCH_ASSOC)['count'];
$scheduleCount = $conn->query("SELECT COUNT(*) AS count FROM schedules")->fetch(PDO::FETCH_ASSOC)['count'];

?>

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
