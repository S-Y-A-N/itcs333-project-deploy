<?php

authorize(isset($_SESSION['email']));


use Core\Database;
$config = require base_path('config.php');
$db = new Database($config['database']);

// code


view('home.view.php', [
  'h1' => 'Home',
  'p' => "Welcome, {$_SESSION['email']}"
]);