<?php

// how to make a database connection:
use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);


// array to store error messages
$errors = [];
$invalid = true;


// here we add all the register logic and validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // if not a uob email
  if (! Validator::uobEmail($_POST['email'])) {
    $errors['email'] = 'Please use your university email';
  }


  // if no errors
  if (empty($errors)) {
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
      'email' => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    $invalid = false;
  }
}

view('register.view.php', [
  'h1' => 'Register',
  'p'=> 'To create a new account',
  'errors' => $errors,
  'invalid' => $invalid
]);