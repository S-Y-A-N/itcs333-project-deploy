<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

// Check if the user is logged in and not admin
authorize(isset($_SESSION['email']) && $_SESSION['admin'] === 0);

$currentEmail = $_SESSION['email'];
$stmt = $db->query('SELECT * FROM users WHERE email = :currentEmail', [
    'currentEmail' => $currentEmail
]);
$user = $stmt->fetch();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profile_picture = $user['profile_picture']; // Keep existing picture by default

    if (Validator::uob_email($email)) {
        try {
            // Handle profile picture upload
            if (!empty($_FILES['profile_picture']['name'])) {
                $profile_picture = $username . "_" . basename($_FILES['profile_picture']['name']);
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/" . $profile_picture);
            }
    
            $stmt = $db->query("UPDATE users SET username = :username, email = :email, profile_picture = :profile_picture WHERE email = :currentEmail", [
                'username' => $username,
                'email' => $email,
                'profile_picture' => $profile_picture,
                'currentEmail' => $currentEmail
            ]);
    
            $_SESSION['email'] = $email; // Update session email

            header('Location: ../views/profile.view.php?success=1'); // Redirect after saving
            exit;
        } catch(PDOException $e) {
            $errors['message'] = "Failed to update profile.";
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
    'profilePicture' => $_SESSION['pfp']
]);