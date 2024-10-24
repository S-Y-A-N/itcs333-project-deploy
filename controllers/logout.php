<?php

// Unset all session variables
$_SESSION = [];

// Destroy the session
session_destroy();

view('logout.view.php', [
  'h1' => 'You are logged out',
  'p' => ''
]);

exit();