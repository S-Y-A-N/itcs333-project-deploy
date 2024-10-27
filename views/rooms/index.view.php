<?php require base_path('views/partials/head.php'); ?>
<?php require base_path('views/partials/protected-header.php'); ?>
<?php require base_path('views/partials/search-bar.php'); ?>

<main>

  <section>
    <a href="/home">Return to home page</a>
  </section>

  <section class="grid">

    <?php foreach ($rooms as $room) : ?>
      <a href="/room?id=<?= $room['room_id'] ?>">
        <article>
          <h4>
            <?= $room['type'] . " " . $room['room_id'] ?>
          </h4>
          <h5>
            <?= $room['dept'] ?>
          </h5>
        </article>
      </a>
    <?php endforeach; ?>

  </section>

</main>

<?php require base_path('views/partials/footer.php'); ?>