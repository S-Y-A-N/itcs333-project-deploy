
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

  // query to find email in db
  $emailQuery = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $_POST['email']
  ]);

  // if email does not exist in db
  if ($emailQuery->rowCount() === 0) {

    $errors['message'] = 'You have entered an invalid email or password';

  } else {

    // get password from db
    $password = $emailQuery->fetch()['password'];

    // verify the entered password with hashed password
    if (password_verify($_POST['password'], $password)) {

      // successful login, start session
      $_SESSION['email'] = $_POST['email'];
      header('Location: /home');

    } else {
      $errors['message'] = 'You have entered an invalid email or password';
    }
    
  }
}


// open index.view.php
view('login.view.php', [
  'h1' => 'Login',
  'p'=> 'If you are already registered',
  'errors' => $errors,
  'invalid' => $invalid
]);