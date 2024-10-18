<?php

// how to make a database connection:
use Core\Database;
use Core\Validator;

echo 'POST';
dump($_POST);

$config = require base_path('config.php');
$db = new Database($config['database']);


// array to store error messages
$errors = [];
$invalid = true;


// here we add all the register logic and validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $emailQuery = $db->query('SELECT email FROM users WHERE email = :email', [
    'email' => $_POST['email']
  ]);

  // if email exists in db
  if ($emailQuery->rowCount() > 0) {
    $errors['message'] = 'You already have an account, please login instead';
    $invalid = false;
  } else {
    // if not a uob email
    if (! Validator::uobEmail($_POST['email'])) {
      $errors['email'] = 'Please use your university email';
    }

    // if weak password
    if (! Validator::strongPassword($_POST['password'])) {
      $errors['password'] = 'Your password must be at least 8 characters long, and include at least one uppercase letter, one lowercase letter, one number, and one special character';
    }
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

$invalid = $invalid ? 'true' : 'false';

// echo '<script> alert("'.implode("\\n", $errors).'"); </script>';

view('register.view.php', [
  'h1' => 'Register',
  'p'=> 'To create a new account',
  'errors' => $errors,
  'invalid' => $invalid
]);