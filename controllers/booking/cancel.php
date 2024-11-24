<?php

authorize(condition: isset($_SESSION['email']));

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

// $conn = connectDB();
$bookingId = $_GET['id'];
try {
    $stmt = $conn->query("DELETE FROM bookings WHERE id = :id", [
        'id' => $bookingId
    ]);
    
    echo "Booking cancelled successfully.";
    header("Location: /bookings");

} catch (PDOException $e) {
    echo $e->getMessage();
    echo $e->getCode();
}

