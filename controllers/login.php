
<?php

use Core\Database;
use Core\Validator;

// create database connection
$config = require base_path('config.php');
$db = new Database($config['database']);

// array for error messages
$errors = [];

// only used inside view.php for aria-invalid attribute
$invalid = true;

// TODO - here we add all the login logic and validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (! Validator::uobEmail($email)) {

  }
}


// open index.view.php
view('login.view.php', [
  'h1' => 'Login',
  'p'=> 'If you are already registered',
]);