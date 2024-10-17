
<?php

// how to make a database connection:
use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);

// here we add all the login logic and validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (! Validator::uobEmail($email)) {
    $errors = [];
  }
}