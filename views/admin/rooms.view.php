<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/admin-header.php'); ?>

<form action="admin_rooms.php" method="post">
  <label for="room_name">Room Name:</label>
  <input type="text" id="room_name" name="room_name" required>
  <label for="capacity">Capacity:</label>
  <input type="number" id="capacity" name="capacity" required>
  <label for="equipment">Equipment:</label>
  <textarea id="equipment" name="equipment"></textarea>
  <button type="submit" name="add_room">Add Room</button>
</form>

<h2>Existing Rooms</h2>
<table>
  <tr>
      <th>Room ID</th>
      <th>Room Name</th>
      <th>Capacity</th>
      <th>Equipment</th>
      <th>Action</th>
  </tr>
  <?php foreach ($rooms as $room): ?>
  <tr>
      <form action="admin_rooms.php" method="post">
          <td><?= $room['room_id'] ?></td>
          <td><input type="text" name="room_name" value="<?php echo $room['room_name']; ?>" required></td>
          <td><input type="number" name="capacity" value="<?php echo $room['capacity']; ?>" required></td>
          <td><textarea name="equipment"><?= preg_replace('/,/', ', ',$room['equip']) ?></textarea></td>
          <td>
              <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
              <button type="submit" name="edit_room">Edit</button>
              <button type="submit" name="delete_room">Delete</button>
          </td>
      </form>
  </tr>
  <?php endforeach; ?>
</table>

<?php require base_path('views/partials/footer.php'); ?>