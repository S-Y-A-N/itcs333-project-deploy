<?php

authorize(isset($_SESSION['email']));

if($_SESSION['admin'] === 1) {
  header('Location: /dashboard');
  exit();
}

view('home.view.php', [
  'h1' => 'Home',
  'p' => "Welcome, {$_SESSION['email']}"
]);