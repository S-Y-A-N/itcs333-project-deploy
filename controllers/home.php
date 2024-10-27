<?php

authorize(isset($_SESSION['email']));

view('home.view.php', [
  'h1' => 'Home',
  'p' => "Welcome, {$_SESSION['email']}"
]);