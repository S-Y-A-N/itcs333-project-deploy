<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<div class="form">
  <form action="" enctype="multipart/form-data" method="POST">
    <input type="email" id="email" name="email" placeholder="UOB Email" aria-invalid="<?= $invalid ?>" required>
    <?php if (isset($errors['email'])) : ?>
      <p><?= $errors['email'] ?></p>
    <?php endif ?>
    <input type="password" id="password" name="password" placeholder="Password">
    <button type="submit">Submit</button>
  </form>
</div>

<div>
  <span>Already have an account?</span>
  <a href="/login">Login</a>
</div>

<?php require 'partials/footer.php'; ?>