<?php

authorize(isset($_SESSION['email']) && $_SESSION['admin'] === 0);

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $start_time = $_POST['start_time'];
    $room_id = (int) $_GET['id'];

    // Conflict Checking Algorithm
    $stmt = $db->query("SELECT * FROM bookings WHERE room_id = :room_id AND start_time = :start_time", [
        'room_id' => $room_id,
        'start_time' => $start_time
    ]);

    $conflict = $stmt->fetch();

    if ($conflict) {
        echo "This timeslot is already booked. Please choose a different time.";
    } else {
        try {
            $stmt = $db->query("INSERT INTO bookings (room_id, start_time, email) VALUES (:room_id, :start_time, :email)", [
                'room_id' => $room_id,
                'start_time' => $start_time,
                'email' => $_SESSION['email']
            ]);

            // update room usage
            $usageQuery = $db->query("SELECT * FROM rooms WHERE room_id = :room_id", [
                'room_id' => $room_id
            ]);

            $usage = $usageQuery->fetch()['usage'];

            dump($usage);

            echo "Room booked successfully!";
        }
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}

require base_path('controllers/rooms/show.php');
