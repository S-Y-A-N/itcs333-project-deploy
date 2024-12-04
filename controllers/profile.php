<?php

view('profile.view.php', [
  'h1' => 'Profile',
  'p' => "It's you!"
]);

session_start();
// Assuming user is logged in and user data is stored in session
$user_id = $_SESSION['user_id'];

// Fetch user data from database (this is a placeholder)
$user_data = [
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'major' => 'Computer Science',
    'profile_picture' => 'default.jpg'
];

// Handle form submission for updating profile
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Process form data and update profile in database
    // Example: updateUserProfile($user_id, $_POST);
    
    // Redirect to the profile view
    header("Location: profile.view.php");
    exit();
}

// Include the profile view
include 'profile.view.php';