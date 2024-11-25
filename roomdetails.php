<?php
include 'config.php';

$conn = connectDB();
$roomId = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM rooms WHERE id = :id");
$stmt->bindParam(':id', $roomId);
$stmt->execute();
$room = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Details</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2><?php echo $room['name']; ?></h2>
    <p>Capacity: <?php echo $room['capacity']; ?></p>
    <p>Equipment: <?php echo $room['equipment']; ?></p>
    <p>Available Timeslots: <?php echo $room['available_timeslots']; ?></p>
    <a href="book_room.php?id=<?php echo $room['id']; ?>">Book this room</a>
</body>
</html>
