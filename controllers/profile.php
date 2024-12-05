<?php

use Core\Validator;

authorize(isset($_SESSION['email']));

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$currentEmail = $_SESSION['email'];
$stmt = $db->query('SELECT * FROM users WHERE email = :currentEmail', [
    'currentEmail' => $currentEmail
]);
$user = $stmt->fetch();

$errors = [];

$profilePicture = $user['profile_picture'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (Validator::uob_email($email)) {
        try {

            if (isset($_FILES['profile_picture']['name'])) {
                unlink(base_path("public/{$_SESSION['pfp']}"));
                unlink(base_path("uploads/{$_SESSION['pfp']}"));
                $profilePicture = $username . "_" . basename($_FILES['profile_picture']['name']);
                $_SESSION['pfp'] = $profilePicture;
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], base_path("uploads/$profilePicture"));
                copy(base_path("uploads/$profilePicture"), base_path("public/$profilePicture"));
            }
    
            $stmt = $db->query("UPDATE users SET username = :username, email = :email, profile_picture = :profile_picture WHERE email = :currentEmail", [
                'username' => $username,
                'email' => $email,
                'profile_picture' => $profilePicture,
                'currentEmail' => $currentEmail
            ]);
    
            
            $_SESSION['email'] = $email;
    
            $errors['message'] = "Profile updated successfully!";
        }

        catch(PDOException $e) {
            echo $e->getMessage();
        }
  
    } else {
        $errors['email'] = "Invalid email format. Only UoB emails are allowed.";
    }
}

view('profile.view.php', [
    'h1' => 'Profile',
    'p' => 'Customize your profile here',
    'user' => $user,
    'errors' => $errors,
    'profilePicture' => $profilePicture
]);