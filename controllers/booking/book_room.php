<?php

authorize(condition: isset($_SESSION['email']));

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookingTime = $_POST['booking_time'];

    // Conflict Checking Algorithm
    // TODO Add table to db!
    $stmt = $db->query("SELECT * FROM bookings WHERE room_id = :room_id AND booking_time = :booking_time", [
        'room_id' => $roomId,
        'booking_time' => $bookingTime
    ]);

    $conflict = $stmt->fetch();

    if ($conflict) {
        echo "This timeslot is already booked. Please choose a different time.";
    } else {
        try {
            $stmt = $db->query("INSERT INTO bookings (user_id, room_id, booking_time) VALUES (:user_id, :room_id, :booking_time)", [
                'user_id' => $userId,
                'room_id' => $roomId,
                'booking_time' => $bookingTime
            ]);

            // update room usage
            $usageQuery = $db->query("SELECT usage FROM rooms WHERE room_id = :room_id", [
                'room_id' => $roomId
            ]);

            $usage = $usageQuery->fetch();

            dump($usage);

            echo "Room booked successfully!";
        }
        catch (PDOException $e) {
            echo $e->getMessage();
            echo $e->getCode();
        }
    }
}

view('rooms/show.view.php');
