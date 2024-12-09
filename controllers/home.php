<?php

// Check if the user is logged in
authorize(isset($_SESSION['email']));

if($_SESSION['admin'] === 1) {
  header('Location: /admin-dashboard');
  exit();
}

view('home.view.php', [
  'h1' => 'Home',
  'p' => "Welcome, {$_SESSION['username']}"
]);