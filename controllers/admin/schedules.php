<?php

authorize($_SESSION['admin'] === 1);

use Core\Validator;
use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

if (Validator::post('add_schedule')) {
  $room_id = $_POST['room_id'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];

  $stmt = $db->query("INSERT INTO bookings (room_id, start_time, end_time) VALUES (:room_id, :start_time, :end_time)", [
    'room_id' => $room_id,
    'start_time' => $start_time,
    'end_time' => $end_time
  ]);
}

if (Validator::post('edit_schedule')) {
  $booking_id = $_POST['schedule_id'];
  $room_id = $_POST['room_id'];
  $start_time = $_POST['start_time'];
  $end_time = $_POST['end_time'];

  $stmt = $db->query("UPDATE bookings SET room_id = :room_id, start_time = :start_time, end_time = :end_time WHERE booking_id = :booking_id", [
    'booking_id' => $booking_id,
    'room_id' => $room_id,
    'start_time' => $start_time,
    'end_time' => $end_time
  ]);
}

if (Validator::post('delete_schedule')) {
  $booking_id = $_POST['schedule_id'];

  $stmt = $db->query("DELETE FROM bookings WHERE booking_id = :booking_id", [
    'booking_id' => $booking_id
  ]);
}

$schedules = $db->query("SELECT s.*, r.room_name FROM bookings s JOIN rooms r ON s.room_id = r.room_id")->fetchAll();
$rooms = $db->query("SELECT * FROM rooms")->fetchAll();

view('admin/schedules.view.php', [
  'h1' => 'Manage Schedules',
  'p' => 'Add, edit, or delete room bookings',
  'schedules' => $schedules,
  'rooms' => $rooms
]);