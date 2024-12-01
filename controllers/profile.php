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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (Validator::uob_email($email)) {
        try {
            $profilePicture = $user['profile_picture'];

            if (!empty($_FILES['profile_picture']['name'])) {
                $profilePicture = $username . "_" . basename($_FILES['profile_picture']['name']);
                move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/" . $profilePicture);
            }
    
            $stmt = $db->query("UPDATE users SET username = :username, email = :email, profile_picture = :profile_picture WHERE email = :currentEmail", [
                'username' => $username,
                'email' => $email,
                'profile_picture' => $profilePicture,
                'currentEmail' => $currentEmail
            ]);
    
            
            $_SESSION['email'] = $username;
    
            echo "Profile updated successfully!";
        }

        catch(PDOException $e) {
            echo "Failed to update profile.";
        }
  
    } else {
        echo "Invalid email format. Only UoB emails are allowed.";
    }
}

view('profile.view.php', [
    'h1' => 'Profile',
    'p' => 'Customize your profile here',
    'user' => $user
]);