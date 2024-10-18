<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<div class="form">
  <form method="POST">
    <input type="email" placeholder="UOB Email" aria-invalid="<?= $invalid ?>">
    <?php if (isset($errors['email'])) : ?>
      <p><?= $errors['email'] ?></p>
    <?php endif ?>
    <input type="password" placeholder="Password">
    <button type="submit">Submit</button>
  </form>
</div>

<div>
  <span>Already have an account?</span>
  <a href="/login">Login</a>
</div>

<?php require 'partials/footer.php'; ?>