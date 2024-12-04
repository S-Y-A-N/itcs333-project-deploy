<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect if not logged in
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch user data
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $major = $_POST['major'];
    $profile_picture = ''; // Handle file upload if necessary

    // Handle profile picture upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);
        $profile_picture = $target_file;
    }

    // Update user data in the database
    $stmt = $pdo->prepare("UPDATE users SET username = ?, name = ?, email = ?, major = ?, profile_picture = ? WHERE id = ?");
    $stmt->execute([$username, $name, $email, $major, $profile_picture, $user_id]);

    // Redirect after saving
    header('Location: ../views/profile.view.php?success=1');
    exit;
}
?>