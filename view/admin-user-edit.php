<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - TeamSync</title>
    <link rel="stylesheet" href="../css/main.css">
    <script src="../js/admin.js" defer></script>
</head>
<body>

<?php include 'admin-navbar.php'; ?>

<div class="project-container">
    <h1>Edit User</h1>

    <form action="../controller/admin-user-controller.php?action=update_user" method="post" enctype="multipart/form-data" class="user-form" onsubmit="return validateUserEditForm(event)">
        <input type="hidden" name="userid" value="<?php echo $user['userid']; ?>">

        <!-- Display current profile picture if available -->
        <?php if ($user['profile_picture']) { ?>
            <div class="form-group">
                <label for="current-profile-pic">Current Profile Picture:</label><br>
                <img id="current-profile-pic" src="data:image/jpeg;base64,<?php echo base64_encode($user['profile_picture']); ?>" alt="Profile Picture" width="150"><br><br>
            </div>
        <?php } ?>

        <div class="form-buttons">
            <button type="button" onclick="showFileInput()" class="button-primary">Change Profile Picture</button>
            <button type="button" onclick="deleteProfilePicture()" class="button-danger">Delete Profile Picture</button><br><br>
        </div>

        <!-- File input and new profile picture preview -->
        <div class="form-group">
            <input type="file" id="profile_picture" name="profile_picture" style="display:none;" onchange="previewImage(event)"><br>
            <img id="preview-profile-pic" src="#" alt="New Profile Picture Preview" style="display: none;" width="150"><br><br>
            <p class="error-message" id="fileError">
                <?php
                if (isset($_SESSION['error']) && $_SESSION['error'] === "Invalid file type or file too large. Please upload a JPEG, PNG, or GIF image under 5MB.") {
                    echo $_SESSION['error'];
                }
                ?>
            </p>
        </div>

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="<?php echo $user['firstname']; ?>">
            <p class="error-message" id="firstnameError">
                <?php
                if (isset($_SESSION['errorMessages']) && in_array("Please enter a First name.", $_SESSION['errorMessages'])) {
                    echo "Please enter a First name.";
                }
                ?>
            </p>
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" id="lastname" name="lastname" value="<?php echo $user['lastname']; ?>">
            <p class="error-message" id="lastnameError">
                <?php
                if (isset($_SESSION['errorMessages']) && in_array("Please enter a Last name.", $_SESSION['errorMessages'])) {
                    echo "Please enter a Last name.";
                }
                ?>
            </p>
        </div>

        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>">
            <p class="error-message" id="usernameError">
                <?php
                if (isset($_SESSION['errorMessages']) && in_array("Please enter a Username.", $_SESSION['errorMessages'])) {
                    echo "Please enter a Username.";
                }
                ?>
            </p>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">
            <p class="error-message" id="emailError">
                <?php
                if (isset($_SESSION['errorMessages'])) {
                    if (in_array("Email is required.", $_SESSION['errorMessages'])) {
                        echo "Email is required.";
                    } elseif (in_array("Invalid email format.", $_SESSION['errorMessages'])) {
                        echo "Invalid email format.";
                    } elseif (in_array("Email already exists. Please enter a different email.", $_SESSION['errorMessages'])) {
                        echo "Email already exists. Please enter a different email.";
                    }
                }
                ?>
            </p>
        </div>

        <div class="form-group">
            <label for="password">Password (Leave blank to keep current password):</label>
            <input type="password" id="password" name="password">
            <p class="error-message" id="passwordError">
                <?php
                if (isset($_SESSION['errorMessages']) && in_array("Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one special character.", $_SESSION['errorMessages'])) {
                    echo "Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one special character.";
                }
                ?>
            </p>
        </div>

        <label for="role">Role:</label>

        <div class="radio-group">
            <input type="radio" id="admin" name="role" value="1" <?php echo ($user['roleid'] == '1') ? 'checked' : ''; ?>>
            <label for="admin">Admin</label>

            <input type="radio" id="pm" name="role" value="2" <?php echo ($user['roleid'] == '2') ? 'checked' : ''; ?>>
            <label for="pm">Project Manager</label>
            
            <input type="radio" id="dev" name="role" value="3" <?php echo ($user['roleid'] == '3') ? 'checked' : ''; ?>>
            <label for="dev">Developer</label>

            <input type="radio" id="client" name="role" value="4" <?php echo ($user['roleid'] == '4') ? 'checked' : ''; ?>>
            <label for="client">Client</label>
        </div>
        <p class="error-message" id="roleError">
            <?php
            if (isset($_SESSION['errorMessages']) && in_array("Please select a role.", $_SESSION['errorMessages'])) {
                echo "Please select a role.";
            }
            ?>
        </p>

        <div class="form-buttons">
            <button type="submit" class="button-primary">Update User</button>
        </div>
    </form>

    <!-- Additional form to handle profile picture deletion -->
    <form id="delete-profile-picture-form" action="../controller/admin-user-controller.php?action=delete_profile_picture" method="post">
        <input type="hidden" name="userid" value="<?php echo $user['userid']; ?>">
    </form>

</div>

<?php
// Clear error messages after displaying them
unset($_SESSION['errorMessages']);
unset($_SESSION['error']);
?>

</body>
</html>
