<?php

// Check if the user is logged in and not admin
authorize(isset($_SESSION['email']) && $_SESSION['admin'] === 0);

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$errors = [];

if (Validator::post('book_room')) {
    try {

        $room_id = (int) $_GET['id'];
        $start_time = date('Y-m-d H:i:s', strtotime($_POST['start_time']));
        $end_time = date('Y-m-d H:i:s', strtotime($_POST['end_time']));

        $hour = date('H', strtotime($start_time));
        
        $time_period = (strtotime($end_time) - strtotime($start_time)) / 3600;

        if ($time_period <= 0) {
            $errors['time'] = "End time must be after the start time";
        }

        else if ($time_period > 2) {
            $errors['time'] = "The timeslot cannot exceed 2 hours";
        }

        else if ($hour < 8 || $hour > 18) {
            $errors['time'] = "Start time should be between 8 AM and 6 PM";
        }

        else {

            // Conflict Checking Algorithm
            $conflict = $db->query("SELECT * FROM bookings WHERE (room_id = :room_id) AND (:start_time < end_time AND :end_time > start_time)", [
                'room_id' => $room_id,
                'start_time' => $start_time,
                'end_time' => $end_time
            ]);

            if ($conflict->rowCount() > 0) {
                $errors['conflict'] = "This timeslot is already booked. Please choose a different time.";
            }
            
            else {

                $db->query("INSERT INTO bookings (email, room_id, start_time, end_time) VALUES (:email, :room_id, :start_time, :end_time)", [
                    'email' => $_SESSION['email'],
                    'room_id' => $room_id,
                    'start_time' => $start_time,
                    'end_time' => $end_time
                ]);

                // update room usage
                $usageQuery = $db->query("SELECT * FROM rooms WHERE room_id = :room_id", [
                    'room_id' => $room_id
                ]);

                $usage = (int) $usageQuery->fetch()['usage'];
                $usage += 1;


                $db->query("UPDATE rooms SET `usage` = :usage WHERE room_id = :room_id", [
                    'room_id' => $room_id,
                    'usage' => $usage
                ]);

                $errors['message'] = "Room booked successfully for the timeslot {$start_time} to {$end_time}.";

            }
        }
    }
    
    catch (PDOException $e) {

        echo $e->getMessage();
    }
}

require base_path('controllers/rooms/show.php');
