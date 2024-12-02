<?php

authorize(condition: isset($_SESSION['email']) && $_SESSION['admin'] === 0);

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

// $conn = connectDB();
$booking_id = $_GET['id'];
try {
    $stmt = $conn->query("DELETE FROM bookings WHERE id = :id", [
        'id' => $booking_id
    ]);
    
    echo "Booking cancelled successfully.";
    header("Location: /bookings");

} catch (PDOException $e) {
    echo $e->getMessage();
}

