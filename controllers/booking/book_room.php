<?php

authorize(isset($_SESSION['email']));

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_time = $_POST['booking_time'];
    $room_id = (int) $_GET['id'];

    // Conflict Checking Algorithm
    // TODO Add table to db!
    $stmt = $db->query("SELECT * FROM bookings WHERE room_id = :room_id AND booking_time = :booking_time", [
        'room_id' => $room_id,
        'booking_time' => $booking_time
    ]);

    $conflict = $stmt->fetch();

    if ($conflict) {
        echo "This timeslot is already booked. Please choose a different time.";
    } else {
        try {
            $stmt = $db->query("INSERT INTO bookings (room_id, booking_time, email) VALUES (:room_id, :booking_time, :email)", [
                'room_id' => $room_id,
                'booking_time' => $booking_time,
                'email' => $_SESSION['email']
            ]);

            echo "Room booked successfully!";
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

require base_path('controllers/rooms/show.php');
