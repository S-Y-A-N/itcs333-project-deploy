<?php require 'partials/head.php'; ?>
<?php require 'partials/header.php'; ?>

<div class="form">
  <form method="POST">
    <input type="email" placeholder="UOB Email">
    <input type="password" placeholder="Password">
    <button type="submit">Submit</button>
  </form>
</div>
<div>
  <span>Don't have an account?</span>
  <a href="/register">Register now</a>
</div>

<?php require 'partials/footer.php'; ?>