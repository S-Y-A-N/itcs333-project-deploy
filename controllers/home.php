<?php

if (! isset($_SESSION['email'])) {
  header('Location: /logout');
}

view('home.view.php', [
  'h1' => 'Home',
  'p' => "Welcome, {$_SESSION['email']}"
]);