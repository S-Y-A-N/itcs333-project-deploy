<?php

authorize(isset($_SESSION['email']));

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$room_id = (int) $_GET['id'];

$roomQuery = $db->query('SELECT * FROM s40_rooms WHERE room_id = :id', [
  'id' => $room_id
]);

$room = $roomQuery->fetch();

view("rooms/show.view.php", [
  'h1' => "S40-{$room_id}",
  'p' => "Room Details",
  'room' => $room
]);