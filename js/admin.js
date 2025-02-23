function validateUserEditForm(event) {
    event.preventDefault();
    var firstname = document.getElementById('firstname');
    var lastname = document.getElementById('lastname');
    var username = document.getElementById('name');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var admin = document.getElementById('admin');
    var pm = document.getElementById('pm');
    var dev = document.getElementById('dev');
    var client = document.getElementById('client');

    var firstnameError = document.getElementById('firstnameError');
    var lastnameError = document.getElementById('lastnameError');
    var usernameError = document.getElementById('usernameError');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var fileError = document.getElementById('fileError');
    var roleError = document.getElementById('roleError');

    let valid = true;

    if (!firstname.value) {
        firstnameError.innerHTML = 'First name is required.';
        valid = false;
    } else {
        firstnameError.innerHTML = '';
    }

    if (!lastname.value) {
        lastnameError.innerHTML = 'Last name is required.';
        valid = false;
    } else {
        lastnameError.innerHTML = '';
    }

    if (!username.value) {
        usernameError.innerHTML = 'Username is required.';
        valid = false;
    } else {
        usernameError.innerHTML = '';
    }

    if (!email.value) {
        emailError.innerHTML = 'Email is required.';
        valid = false;
    } else if (!validateEmail(email.value)) {
        emailError.innerHTML = 'Invalid email format.';
        valid = false;
    } else {
        emailError.innerHTML = '';
    }

    if (password.value && !validatePassword(password.value)) {
        passwordError.innerHTML = 'Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one special character.';
        valid = false;
    } else {
        passwordError.innerHTML = '';
    }

    if (profile_picture.files.length > 0 && !validateFileType(profile_picture.files[0])) {
        fileError.innerHTML = 'Invalid file type. Only jpeg, jpg, gif, and png are allowed.';
        valid = false;
    } else {
        fileError.innerHTML = '';
    }

    if (!admin.checked && !pm.checked && !dev.checked && !client.checked) {
        roleError.innerHTML = 'Please select a role.';
        valid = false;
    } else {
        roleError.innerHTML = '';
    }

    if (valid) {
        event.target.submit();
    }
}

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePassword(password) {
    return password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[^a-zA-Z0-9]/.test(password);
}

function validateFileType(file) {
    var allowedTypes = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
    var maxSize = 5 * 1024 * 1024; // 5MB in bytes
    if (!allowedTypes.includes(file.type)) {
        return false;
    }
    if (file.size > maxSize) {
        return false;
    }
    return true;
}


function validateProjectForm(event) {
    event.preventDefault();
    var project_name = document.getElementById('project_name');
    var description = document.getElementById('description');
    var start_date = document.getElementById('start_date');
    var deadline = document.getElementById('deadline');
    var pm_id = document.getElementById('pm_id');
    var status = document.getElementById('status');

    var projectNameError = document.getElementById('projectNameError');
    var descriptionError = document.getElementById('descriptionError');
    var startDateError = document.getElementById('startDateError');
    var deadlineError = document.getElementById('deadlineError');
    var pmIdError = document.getElementById('pmIdError');
    var statusError = document.getElementById('statusError');

    let valid = true;

    if (!project_name.value) {
        projectNameError.innerHTML = 'Project name is required.';
        valid = false;
    } else {
        projectNameError.innerHTML = '';
    }

    if (!description.value) {
        descriptionError.innerHTML = 'Description is required.';
        valid = false;
    } else {
        descriptionError.innerHTML = '';
    }

    if (!start_date.value) {
        startDateError.innerHTML = 'Start date is required.';
        valid = false;
    } else {
        startDateError.innerHTML = '';
    }

    if (!deadline.value) {
        deadlineError.innerHTML = 'Deadline is required.';
        valid = false;
    } else {
        deadlineError.innerHTML = '';
    }

    if (!pm_id.value) {
        pmIdError.innerHTML = 'Project Manager is required.';
        valid = false;
    } else {
        pmIdError.innerHTML = '';
    }

    if (!status.value) {
        statusError.innerHTML = 'Status is required.';
        valid = false;
    } else {
        statusError.innerHTML = '';
    }

    if (valid) {
        event.target.submit();
    }
}

function validateUserCreateForm(event) {
    event.preventDefault();
    var firstname = document.getElementById('firstname');
    var lastname = document.getElementById('lastname');
    var username = document.getElementById('username');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var confirm_password = document.getElementById('confirm_password');
    var admin = document.getElementById('admin');
    var pm = document.getElementById('pm');
    var dev = document.getElementById('dev');
    var client = document.getElementById('client');

    var firstnameError = document.getElementById('firstnameError');
    var lastnameError = document.getElementById('lastnameError');
    var usernameError = document.getElementById('usernameError');
    var emailError = document.getElementById('emailError');
    var passwordError = document.getElementById('passwordError');
    var confirmPasswordError = document.getElementById('confirmPasswordError');
    var roleError = document.getElementById('roleError');

    let valid = true;

    if (!firstname.value) {
        firstnameError.innerHTML = 'First name is required.';
        valid = false;
    } else {
        firstnameError.innerHTML = '';
    }

    if (!lastname.value) {
        lastnameError.innerHTML = 'Last name is required.';
        valid = false;
    } else {
        lastnameError.innerHTML = '';
    }

    if (!username.value) {
        usernameError.innerHTML = 'Username is required.';
        valid = false;
    } else {
        usernameError.innerHTML = '';
    }

    if (!email.value) {
        emailError.innerHTML = 'Email is required.';
        valid = false;
    } else if (!validateEmail(email.value)) {
        emailError.innerHTML = 'Invalid email format.';
        valid = false;
    } else {
        emailError.innerHTML = '';
    }

    if (!password.value) {
        passwordError.innerHTML = 'Password is required.';
        valid = false;
    } else if (!validatePassword(password.value)) {
        passwordError.innerHTML = 'Password must be at least 8 characters long, with at least one uppercase letter, one lowercase letter, and one special character.';
        valid = false;
    } else {
        passwordError.innerHTML = '';
    }

    if (password.value !== confirm_password.value) {
        confirmPasswordError.innerHTML = 'Passwords do not match.';
        valid = false;
    } else {
        confirmPasswordError.innerHTML = '';
    }

    if (!admin.checked && !pm.checked && !dev.checked && !client.checked) {
        roleError.innerHTML = 'Please select a role.';
        valid = false;
    } else {
        roleError.innerHTML = '';
    }

    if (valid) {
        event.target.submit();
    }
}

function validateEmail(email) {
    var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function validatePassword(password) {
    return password.length >= 8 && /[A-Z]/.test(password) && /[a-z]/.test(password) && /[^a-zA-Z0-9]/.test(password);
}

function showFileInput() {
    document.getElementById('profile_picture').style.display = 'block';
}

function previewImage(event) {
    var preview = document.getElementById('current-profile-pic');
    var file = event.target.files[0];

    if (file) {
        var reader = new FileReader();
        reader.onload = function () {
            preview.src = reader.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    } else {
        preview.src = '';
        preview.style.display = 'none';
    }
}

function deleteProfilePicture() {
    if (confirm('Are you sure you want to delete your profile picture?')) {
        document.getElementById('delete-profile-picture-form').submit();
    }
}

function setupSearch() {
    function loadDoc() {
        var xhr = new XMLHttpRequest();
        var searchQuery = document.getElementById("searchQuery").value;
        var searchFilter = document.getElementById("searchFilter").value;
        var userid = document.getElementById("userid").value;

        console.log("Making request to server with query:", searchQuery, "filter:", searchFilter, "userid:", userid); // Debugging statement

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                console.log("Response received from server:", xhr.responseText); // Debugging statement
                try {
                    var results = JSON.parse(xhr.responseText);

                    // Limit the results to the first 5 items
                    var limitedResults = results.slice(0, 5);

                    var limitedResultsHTML = '<ul>';
                    limitedResults.forEach(result => {
                        var link = "";
                        switch (result.type) {
                            case 'project':
                                link = "../controller/admin-project-controller.php?action=view_project&project_id=" + result.id;
                                break;
                            case 'task':
                                link = "../controller/admin-task-controller.php?action=view&task_id=" + result.id;
                                break;
                            case 'user':
                                link = "../controller/admin-user-controller.php?action=view_user&userid=" + result.id;
                                break;
                            case 'proposal':
                                link = "../controller/admin-project-controller.php?action=view_proposal&project_id=" + result.id;
                                break;
                        }
                        limitedResultsHTML += `<li><a href="${link}">${result.formatted_name}</a></li>`;
                    });
                    limitedResultsHTML += '</ul>';

                    document.getElementById("searchResults").innerHTML = limitedResultsHTML;
                } catch (e) {
                    document.getElementById("searchResults").innerHTML = "<p>No results found.</p>";
                }
            }
        };

        xhr.open('GET', `../controller/admin-search-controller.php?query=${encodeURIComponent(searchQuery)}&filter=${searchFilter}&userid=${userid}`, true);
        xhr.send();
    }

    document.getElementById('searchQuery').addEventListener('input', loadDoc);
    document.getElementById('searchFilter').addEventListener('change', loadDoc);
}

document.addEventListener('DOMContentLoaded', function() {
    setupSearch();
});
