<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/protected-header.php'); ?>

<main>
  <section>
    <p>Room Type: <strong> <?= ucfirst($room['type']) ?> </strong></p>
    <p>Department: <strong> <?= strtoupper($room['dept']) ?> </strong></p>

    <div style="height: 400px;" id="panorama"></div>
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