<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management - University of Bahrain</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>Profile Management</h2>
    <div class="profile-picture">
        <img src="<?php echo $user_data['profile_picture']; ?>" alt="Profile Picture">
    </div>
    <form action="profile.php" method="post" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" value="<?php echo $user_data['name']; ?>" required>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" value="<?php echo $user_data['email']; ?>" required>

        <label for="major">Major</label>
        <input type="text" name="major" id="major" value="<?php echo $user_data['major']; ?>" required>

        <label for="profile_picture">Profile Picture</label>
        <input type="file" name="profile_picture" id="profile_picture">

        <input type="submit" value="Update Profile">
    </form>
</div>

</body>
</html>