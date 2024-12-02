
<?php require base_path('views/partials/head.php'); ?>
<?php
if($_SESSION['admin'] === 0) require base_path('views/partials/user-header.php');
else require base_path('views/partials/admin-header.php');
?>

<section>
    <a href="/home">Return to home page</a>
</section>

<form method="post" enctype="multipart/form-data">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required>
    <label for="profile_picture">Profile Picture:</label>
    <input type="file" id="profile_picture" name="profile_picture">
    <button type="submit" name="update_profile">Update Profile</button>
</form>

<?php if (isset($user['profile_picture'])): ?>
    <img src="<?php echo base_path('uploads') . "/{$user['profile_picture']}"; ?>" alt="Profile Picture" width="100">
<?php endif; ?>