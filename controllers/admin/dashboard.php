<?php

authorize($_SESSION['admin'] === 1);

use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

// Query for room usage statistics
$roomUsage = $db->query('SELECT room_id, COUNT(*) as bookings FROM bookings GROUP BY room_id')->fetchAll();

view('admin/dashboard.view.php', [
    'h1' => 'Dashboard',
    'p' => 'Adminstrator',
    'roomUsage' => $roomUsage
]);