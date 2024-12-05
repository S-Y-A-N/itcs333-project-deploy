<?php

authorize(condition: isset($_SESSION['email']) && $_SESSION['admin'] === 0);


use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$stmt = $db->query("SELECT bookings.id, rooms.name, bookings.start_time FROM bookings JOIN rooms ON bookings.room_id = rooms.id WHERE bookings.user_id = :user_id", [
    'user_id' => $_SESSION['email']
]);

$bookings = $stmt->fetchAll();

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
                <?php echo $booking['name']; ?> - <?php echo $booking['start_time']; ?>
                <a href="cancel_booking.php?id=<?php echo $booking; ?>" ></a>
            </li>
        <?php endforeach ?>