<?php
include 'config.php';

$conn = connectDB();
$stmt = $conn->prepare("SELECT * FROM rooms");
$stmt->execute();
$rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Room Browsing</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Available Rooms</h2>
    <ul>
        <?php foreach ($rooms as $room): ?>
            <li>
                <a href="room_details.php?id=<?php echo $room['id']; ?>"><?php echo $room['name']; ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
