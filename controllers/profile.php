<?php

use Core\Validator;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

// Check if the user is logged in and not admin
authorize(isset($_SESSION['email']) && $_SESSION['admin'] === 0);

$current_email = $_SESSION['email'];
$stmt = $db->query('SELECT * FROM users WHERE email = :current_email', [
    'current_email' => $current_email
]);
$user = $stmt->fetch();

$errors = [];

if (Validator::post('update_profile')) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $profile_picture = $user['profile_picture']; // Keep existing picture by default

    if (Validator::uob_email($email)) {
        try {
            $file = $_FILES['profile_picture']['tmp_name'];

            // Handle profile picture upload
            if ( !empty($file) ) {

                $mime = mime_content_type($file);

                // Check file size and type
                if (filesize($file) <= 5242880 && ($mime === 'image/png' || $mime === 'image/jpeg') ) {

                    // remove old pfp from public and uploads folder
                    unlink(base_path("public/{$_SESSION['pfp']}"));
                    unlink(base_path("uploads/{$_SESSION['pfp']}"));

                    // create file name: email.ext
                    $ogfile = $_FILES['profile_picture']['name'];
                    $ext = pathinfo($ogfile)['extension'];
                    $profile_picture = "{$email}.{$ext}";

                    // move file to uploads, copy to public
                    move_uploaded_file($file, base_path("uploads/$profile_picture"));
                    copy(base_path("uploads/$profile_picture"), base_path("public/$profile_picture"));

                }

                else {
                    $errors['file'] = (filesize($file) > 5242880) ? "File size cannot exceed 5 MB" : "Failed to upload file";
                }
                
            }
    
            $stmt = $db->query("UPDATE users SET username = :username, email = :email, profile_picture = :profile_picture WHERE email = :current_email", [
                'username' => $username,
                'email' => $email,
                'profile_picture' => $profile_picture,
                'current_email' => $current_email
            ]);
    
            // Update session info
            $_SESSION['email'] = $email;
            $_SESSION['pfp'] = $profile_picture;
            
        }
        
        catch(PDOException $e) {
            $errors['message'] = "Failed to update profile.";
        }

    }
    
    else {
        $errors['email'] = "Invalid email format. Only UoB emails are allowed.";
    }
}

view('profile.view.php', [
    'h1' => 'Profile',
    'p' => 'Customize your profile here',
    'user' => $user,
    'errors' => $errors,
    'profile_picture' => $_SESSION['pfp']
]);