<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/breadcrumb-nav.php'); ?>
<?php
if($_SESSION['admin'] === 0) require base_path('views/partials/user-header.php');
else require base_path('views/partials/admin-header.php');
?>

<main>
  <section class="room">
  <form method="post">
    <div style="height: 400px;" id="panorama"></div>

    <div class="info">
      <table>
        <tr>
          <td>Room Type</td>
          <td> <?= ucfirst($room['type']) ?> </td>
        </tr>
        <tr>
          <td>Department</td>
          <td> <?= strtoupper($room['dept']) ?> </td>
        </tr>
        <tr>
          <td>Capacity</td>
          <td> <?= $room['capacity'] ?> People </td>
        </tr>
        <tr>
          <td>Equipment</td>
          <td> <?= preg_replace('/,/', ', ',$room['equip']) ?> </td>
        </tr>
        <tr>
          <td>Book Room</td>
          <td>
            <label for="start_time">Start Time</label>
            <input type="datetime-local" id="start_time" name="start_time" required>
            <label for="end_time">End Time</label>
            <input type="datetime-local" id="end_time" name="end_time" required>
          </td>
        </tr>
      </table>
    </div>

    <button type="submit">Book Room</button>
  </form>

  </section>
</main>

<script>
pannellum.viewer('panorama', {
    "type": "equirectangular",
    "panorama": "classroom-360.jpg",
    "preview": "classroom-360.jpg",
    "autoRotate": -2,
    "vaov": 70,
    "vOffset": 0,
    "minPitch": 0,
    "maxPitch": 0,
    "pitch": 0,
    "showZoomCtrl": false,
    "keyboardZoom": false,
    "mouseZoom": false,
    "minHfov":100,
    "maxHfov":100,
});
</script>

<?php require base_path('views/partials/footer.php'); ?>