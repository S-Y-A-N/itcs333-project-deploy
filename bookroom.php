<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// $conn = connectDB();
// $userId = $_SESSION['user_id']; 
// $roomId = $_GET['id'];

if (isset($_POST['book'])) {
    $bookingTime = $_POST['booking_time'];

    // Conflict Checking Algorithm
    $stmt = $conn->prepare("SELECT * FROM bookings WHERE room_id = :room_id AND booking_time = :booking_time");
    $stmt->bindParam(':room_id', $roomId);
    $stmt->bindParam(':booking_time', $bookingTime);
    $stmt->execute();
    $conflict = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($conflict) {
        echo "This timeslot is already booked. Please choose a different time.";
    } else {
        $stmt = $conn->prepare("INSERT INTO bookings (user_id, room_id, booking_time) VALUES (:user_id, :room_id, :booking_time)");
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':room_id', $roomId);
        $stmt->bindParam(':booking_time', $bookingTime);

        if ($stmt->execute()) {
            echo "Room booked successfully!";
        } else {
            echo "Failed to book the room.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Book Room</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Book Room</h2>
    <form action="book_room.php?id=<?php echo $roomId; ?>" method="post">
        <label for="booking_time">Booking Time:</label>
        <input type="datetime-local" id="booking_time" name="booking_time" required>
        <button type="submit" name="book">Book</button>
    </form>
</body>
</html>
