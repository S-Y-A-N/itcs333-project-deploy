<?php

authorize($_SESSION['admin'] === 1);

use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

// Query for room usage statistics
$roomUsage = $db->query('SELECT room_id, COUNT(*) AS count FROM bookings')->fetch()['count'];

// $scheduleCount = $conn->query("SELECT COUNT(*) AS count FROM schedules")->fetch()['count'];


view('admin/dashboard.view.php', [
    'h1' => 'Dashboard',
    'p' => 'Adminstrator',
    'roomUsage' => $roomUsage
]);