<?php
session_start();
include 'config.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = connectDB();

if (isset($_POST['add_schedule'])) {
    $room_id = $_POST['room_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $stmt = $conn->prepare("INSERT INTO schedules (room_id, start_time, end_time) VALUES (:room_id, :start_time, :end_time)");
    $stmt->bindParam(':room_id', $room_id);
    $stmt->bindParam(':start_time', $start_time);
    $stmt->bindParam(':end_time', $end_time);
    $stmt->execute();
}

if (isset($_POST['edit_schedule'])) {
    $schedule_id = $_POST['schedule_id'];
    $room_id = $_POST['room_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $stmt = $conn->prepare("UPDATE schedules SET room_id = :room_id, start_time = :start_time, end_time = :end_time WHERE schedule_id = :schedule_id");
    $stmt->bindParam(':schedule_id', $schedule_id);
    $stmt->bindParam(':room_id', $room_id);
    $stmt->bindParam(':start_time', $start_time);
    $stmt->bindParam(':end_time', $end_time);
    $stmt->execute();
}

if (isset($_POST['delete_schedule'])) {
    $schedule_id = $_POST['schedule_id'];

    $stmt = $conn->prepare("DELETE FROM schedules WHERE schedule_id = :schedule_id");
    $stmt->bindParam(':schedule_id', $schedule_id);
    $stmt->execute();
}

$schedules = $conn->query("SELECT s.*, r.room_name FROM schedules s JOIN rooms r ON s.room_id = r.room_id")->fetchAll(PDO::FETCH_ASSOC);
$rooms = $conn->query("SELECT * FROM rooms")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Schedules</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <h1>Manage Schedules</h1>
    <form action="admin_schedules.php" method="post">
        <label for="room_id">Room:</label>
        <select id="room_id" name="room_id" required>
            <?php foreach ($rooms as $room): ?>
                <option value="<?php echo $room['room_id']; ?>"><?php echo $room['room_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="start_time">Start Time:</label>
        <input type="datetime-local" id="start_time" name="start_time" required>
        <label for="end_time">End Time:</label>
        <input type="datetime-local">