<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Management</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script>
        function validateEmail() {
            const studentId = document.getElementById('student_id').value;
            const emailInput = document.getElementById('email');
            const errorMessage = document.getElementById('error-message');

            if (emailInput.value.trim() !== '' && studentId.length !== 9) {
                errorMessage.style.display = 'block';
                return false; // Prevent form submission
            } else {
                errorMessage.style.display = 'none';
                return true; // Allow form submission
            }
        }

        function previewImage(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(){
                const output = document.getElementById('profile-picture');
                output.src = reader.result; // Update the image source to the uploaded file
            }

            if (file) {
                reader.readAsDataURL(file); // Convert the file to a data URL
            }
        }
    </script>
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">Account Settings</h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change Password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-info">Info</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-social-links">Social Links</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-connections">Connections</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-notifications">Notifications</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <form action="../upload.php" method="POST" enctype="multipart/form-data" onsubmit="return validateEmail()">
                                <div class="card-body media align-items-center">
                                    <?php 
                                    $default_image = 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTx3hmshJjWCjpw1tPYQNciN5YeVjelYf47rNr9arrVu7neQZQH_ELX4v9WvigwMpXjLPI&usqp=CAU';
                                    ?>
                                    <img id="profile-picture" src="<?php echo !empty($user_data['profile_picture']) ? htmlspecialchars($user_data['profile_picture']) : $default_image; ?>" alt="Profile Picture" class="d-block ui-w-80">
                                    <div class="media-body ml-4">
                                        <label class="btn btn-outline-primary">
                                            Upload new photo
                                            <input type="file" class="account-settings-fileinput" accept="image/*" name="profile_picture" id="profile_picture" hidden onchange="previewImage(event)">
                                        </label> &nbsp;
                                        <button type="button" class="btn btn-default md-btn-flat" onclick="document.getElementById('profile_picture').click();">Choose File</button>
                                        <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div>
                                    </div>
                                </div>
                                <hr class="border-light m-0">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control mb-1" name="username" value="<?php echo isset($user_data['username']) ? htmlspecialchars($user_data['username']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="<?php echo isset($user_data['name']) ? htmlspecialchars($user_data['name']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Student ID</label>
                                        <input type="text" class="form-control mb-1" id="student_id" name="student_id" value="<?php echo isset($user_data['student_id']) ? htmlspecialchars($user_data['student_id']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control mb-1" id="email" name="email" placeholder="202107996@stu.uob.edu.bh or sample@gmail.com" value="<?php echo isset($user_data['email']) ? htmlspecialchars($user_data['email']) : ''; ?>" required>
                                        <div id="error-message" class="alert alert-danger mt-3" style="display: none;">Invalid email format: Student ID must be 9 digits long.</div>
                                        <?php if (isset($user_data['email_confirmed']) && !$user_data['email_confirmed']): ?>
                                            <div class="alert alert-warning mt-3">Your email is not confirmed. Please check your inbox.<br><a href="javascript:void(0)">Resend confirmation</a></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Major</label>
                                        <input type="text" class="form-control" name="major" value="<?php echo isset($user_data['major']) ? htmlspecialchars($user_data['major']) : ''; ?>" required>
                                    </div>
                                </div>
                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary">Save changes</button>&nbsp;
                                    <button type="button" class="btn btn-default">Cancel</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body">
                                <form action="../change_password.php" method="POST">
                                    <div class="form-group">
                                        <label class="form-label">Current Password</label>
                                        <input type="password" class="form-control" name="current_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="new_password" required>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Confirm New Password</label>
                                        <input type="password" class="form-control" name="confirm_password" required>
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Change Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-info">
                            <div class="card-body">
                                <h5 class="font-weight-bold">Tell Us About Yourself!</h5>
                                <form action="../save_info.php" method="POST">
                                    <div class="form-group">
                                        <label for="about_me">Write something about yourself:</label>
                                        <textarea class="form-control" id="about_me" name="about_me" rows="5" placeholder="Share your thoughts, interests, and anything you'd like to say..."></textarea>
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Save Info</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-social-links">
                            <div class="card-body">
                                <h5 class="font-weight-bold">Connect Your Social Accounts</h5>
                                <form action="../save_social_links.php" method="POST">
                                    <div class="form-group">
                                        <label for="instagram">Instagram Profile URL</label>
                                        <input type="url" class="form-control" id="instagram" name="instagram" placeholder="https://instagram.com/yourusername">
                                    </div>
                                    <div class="form-group">
                                        <label for="linkedin">LinkedIn Profile URL</label>
                                        <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="https://linkedin.com/in/yourusername">
                                    </div>
                                    <div class="form-group">
                                        <label for="x_account">X (Twitter) Account URL</label>
                                        <input type="url" class="form-control" id="x_account" name="x_account" placeholder="https://x.com/yourusername">
                                    </div>
                                    <div class="text-right mt-3">
                                        <button type="submit" class="btn btn-primary">Save Links</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-connections">
                            <div class="card-body">
                                <h5 class="font-weight-bold">Manage Your Connections</h5>
                                <div class="form-group">
                                    <label for="search_classmate">Search for Classmates</label>
                                    <input type="text" class="form-control" id="search_classmate" placeholder="Search by name or major">
                                    <button class="btn btn-primary mt-2" onclick="searchClassmates()">Search</button>
                                </div>
                                <h6>Your Connections</h6>
                                <ul class="list-group mb-3" id="connections_list">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">John Doe
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </li>
                                </ul>
                                <h6>Pending Connection Requests</h6>
                                <ul class="list-group mb-3" id="pending_requests">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Jane Smith
                                        <div>
                                            <button class="btn btn-success btn-sm">Accept</button>
                                            <button class="btn btn-danger btn-sm">Decline</button>
                                        </div>
                                    </li>
                                </ul>
                                <h6>Recommended Connections</h6>
                                <ul class="list-group" id="recommended_connections">
                                    <li class="list-group-item d-flex justify-content-between align-items-center">Alice Johnson
                                        <button class="btn btn-primary btn-sm">Connect</button>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="account-notifications">
                            <div class="card-body">
                                <h5 class="font-weight-bold">Notifications</h5>
                                <?php if (empty($notifications)): ?>
                                    <div class="text-center">
                                        <img src="https://static.vecteezy.com/system/resources/previews/004/968/451/non_2x/turn-off-no-message-notification-concept-illustration-flat-design-eps10-modern-graphic-element-for-landing-page-empty-state-ui-infographic-vector.jpg" alt="No Notifications" class="img-fluid" style="max-width: 300px;">
                                    </div>
                                <?php else: ?>
                                    <ul class="list-group">
                                        <?php foreach ($notifications as $notification): ?>
                                            <li class="list-group-item">
                                                <?php echo htmlspecialchars($notification['message']); ?>
                                                <small class="text-muted"><?php echo htmlspecialchars($notification['timestamp']); ?></small>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>