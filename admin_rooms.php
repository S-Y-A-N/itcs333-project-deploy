<?php
session_start();
include 'config.php';
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

$conn = connectDB();

if (isset($_POST['add_room'])) {
    $room_name = $_POST['room_name'];
    $capacity = $_POST['capacity'];
    $equipment = $_POST['equipment'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO rooms (room_name, capacity, equipment, description) VALUES (:room_name, :capacity, :equipment, :description)");
    $stmt->bindParam(':room_name', $room_name);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':equipment', $equipment);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
}

if (isset($_POST['edit_room'])) {
    $room_id = $_POST['room_id'];
    $room_name = $_POST['room_name'];
    $capacity = $_POST['capacity'];
    $equipment = $_POST['equipment'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE rooms SET room_name = :room_name, capacity = :capacity, equipment = :equipment, description = :description WHERE room_id = :room_id");
    $stmt->bindParam(':room_id', $room_id);
    $stmt->bindParam(':room_name', $room_name);
    $stmt->bindParam(':capacity', $capacity);
    $stmt->bindParam(':equipment', $equipment);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
}

if (isset($_POST['delete_room'])) {
    $room_id = $_POST['room_id'];

    $stmt = $conn->prepare("DELETE FROM rooms WHERE room_id = :room_id");
    $stmt->bindParam(':room_id', $room_id);
    $stmt->execute();
}

$rooms = $conn->query("SELECT * FROM rooms")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Rooms</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css">
</head>
<body>
    <h1>Manage Rooms</h1>
    <form action="admin_rooms.php" method="post">
        <label for="room_name">Room Name:</label>
        <input type="text" id="room_name" name="room_name" required>
        <label for="capacity">Capacity:</label>
        <input type="number" id="capacity" name="capacity" required>
        <label for="equipment">Equipment:</label>
        <textarea id="equipment" name="equipment"></textarea>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <button type="submit" name="add_room">Add Room</button>
    </form>

    <h2>Existing Rooms</h2>
    <table>
        <tr>
            <th>Room Name</th>
            <th>Capacity</th>
            <th>Equipment</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($rooms as $room): ?>
        <tr>
            <form action="admin_rooms.php" method="post">
                <td><input type="text" name="room_name" value="<?php echo $room['room_name']; ?>" required></td>
                <td><input type="number" name="capacity" value="<?php echo $room['capacity']; ?>" required></td>
                <td><textarea name="equipment"><?php echo $room['equipment']; ?></textarea></td>
                <td><textarea name="description"><?php echo $room['description']; ?></textarea></td>
                <td>
                    <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                    <button type="submit" name="edit_room">Edit</button>
                    <button type="submit" name="delete_room">Delete</button>
                </td>
            </form>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
