<?php

use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

$email = $_SESSION['email'];

// Query for room usage statistics
$roomUsage = $db->query('SELECT room_id, COUNT(*) as bookings FROM bookings GROUP BY room_id')->fetchAll();

view('statistics.view.php', [
    'h1' => 'statistics',
    'p' => '',
    'roomUsage' => $roomUsage
]);