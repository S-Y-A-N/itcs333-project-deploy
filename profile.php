<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['user'];

$conn = connectDB();
$stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h2>Profile</h2>
    <form action="profile.php" method="post" enctype="multipart/form-data">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        <label for="profile_picture">Profile Picture:</label>
        <input type="file" id="profile_picture" name="profile_picture">
        <button type="submit" name="update_profile">Update Profile</button>
    </form>

    <?php if (isset($user['profile_picture'])): ?>
        <img src="uploads/<?php echo $user['profile_picture']; ?>" alt="Profile Picture" width="100">
    <?php endif; ?>
    <?php
if (isset($_POST['update_profile'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    if (preg_match("/^[a-zA-Z0-9._%+-]+@uob\.edu\.bh$/", $email)) {
        $profilePicture = $user['profile_picture'];
        if (!empty($_FILES['profile_picture']['name'])) {
            $profilePicture = $username . "_" . basename($_FILES['profile_picture']['name']);
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], "uploads/" . $profilePicture);
        }

        $stmt = $conn->prepare("UPDATE users SET username = :username, email = :email, profile_picture = :profile_picture WHERE id = :id");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':profile_picture', $profilePicture);
        $stmt->bindParam(':id', $user['id']);
        if ($stmt->execute()) {
            $_SESSION['user'] = $username;
            echo "Profile updated successfully!";
        } else {
            echo "Failed to update profile.";
        }
    } else {
        echo "Invalid email format. Only UoB emails are allowed.";
    }
}
?>

</body>
</html>
