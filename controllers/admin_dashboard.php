<?php
session_start();
if (!$_SESSION['admin']) { // Check if the user is an admin
    header('Location: /login'); // Redirect to login if not an admin
    exit();
}

use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

// Query for room usage statistics
$roomUsage = $db->query('SELECT room_id, COUNT(*) as bookings FROM bookings GROUP BY room_id')->fetchAll();

view('admin_dashboard.view.php', [
    'roomUsage' => $roomUsage
]);