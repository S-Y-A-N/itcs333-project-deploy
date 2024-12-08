<?php

authorize($_SESSION['admin'] === 1);

use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

if (isset($_POST['add_room'])) {
  $room_name = $_POST['room_name'];
  $capacity = $_POST['capacity'];
  $equipment = $_POST['equipment'];

  $stmt = $db->query("INSERT INTO rooms (room_name, capacity, equipment) VALUES (:room_name, :capacity, :equipment)", [
    'room_name' => $room_name,
    'capacity' => $capacity,
    'equipment' => $equipment,
  ]);
}

if (isset($_POST['edit_room'])) {
  $room_id = $_POST['room_id'];
  $room_name = $_POST['room_name'];
  $capacity = $_POST['capacity'];
  $equipment = $_POST['equipment'];
  $description = $_POST['description'];

  $stmt = $db->query("UPDATE rooms SET room_name = :room_name, capacity = :capacity, equipment = :equipment WHERE room_id = :room_id", [
    'room_id' => $room_id,
    'room_name' => $room_name,
    'capacity' => $capacity,
    'equipment' => $equipment,
  ]);
}

if (isset($_POST['delete_room'])) {
  $room_id = $_POST['room_id'];

  $stmt = $db->query("DELETE FROM rooms WHERE room_id = :room_id", [
    'room_id' => $room_id
  ]);
}

$rooms = $db->query("SELECT * FROM rooms")->fetchAll();


view('admin/rooms.view.php', [
  'h1' => 'Manage Rooms',
  'p' => 'Add, edit, and delete rooms in s40',
  'rooms' => $rooms
]);

