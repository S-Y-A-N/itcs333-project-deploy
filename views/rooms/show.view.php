<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/breadcrumb-nav.php'); ?>
<?php require base_path('views/partials/protected-header.php'); ?>

<main>
  <section class="room">
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
          <td> <?= '...' ?> </td>
        </tr>
        <tr>
          <td>Timeslots</td>
          <td>
            <select name="date" id="date">
              <option value="0" disabled selected>Date</option>
              <option value="1">Monday &mdash; 30 Oct 2024</option>
            </select>

            <select disabled name="time" id="time">
              <option value="0" disabled selected>Time</option>
              <option value="1">10 AM</option>
              <option value="2">12 PM</option>
            </select>
          </td>
        </tr>
      </table>
    </div>

    <button disabled type="submit">Book Room</button>
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