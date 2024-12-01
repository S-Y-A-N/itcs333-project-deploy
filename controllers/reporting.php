<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: /login');
    exit();
}

use Core\Database;

$config = require base_path('config.php'); 
$db = new Database($config['database']); 

// Fetch data for reports
$mostPopularRooms = $db->query('SELECT room_id, COUNT(*) as booking_count FROM bookings GROUP BY room_id ORDER BY booking_count DESC LIMIT 5')->fetchAll();
$totalBookings = $db->query('SELECT COUNT(*) as total_bookings FROM bookings')->fetchColumn();

view('reporting.view.php', [
    'mostPopularRooms' => $mostPopularRooms,
    'totalBookings' => $totalBookings
]);