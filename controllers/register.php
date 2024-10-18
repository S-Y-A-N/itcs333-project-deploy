<?php

use Core\Database;
use Core\Validator;

echo 'POST';
dump($_POST);

// create database connection
$config = require base_path('config.php');
$db = new Database($config['database']);


// array for error messages
$errors = [];

// only used inside view.php for aria-invalid attribute
$invalid = true;


// TODO - here we add all the register logic and validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // query to find email in db
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

    // query to insert user data into the db
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
      'email' => $_POST['email'],
      'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ]);

    $invalid = false;
  }
}

$invalid = $invalid ? 'true' : 'false';

// open register.view.php
view('register.view.php', [
  'h1' => 'Register',
  'p'=> 'To create a new account',
  'errors' => $errors,
  'invalid' => $invalid
]);