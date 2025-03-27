<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone - Settings</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background:black;
        }
        .settings-container {
            width: 50%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        .settings-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .settings-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            cursor: pointer;
            transition: background 0.3s;
        }
        .settings-item:hover {
            background: #f7f7f7;
        }
        .logout {
            color: red;
            text-align: center;
            font-weight: bold;
        }
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 10px;
            width: 40%;
            position: relative;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            font-size: 20px;
            cursor: pointer;
        }
        .form-group {
            margin-bottom: 10px;
        }
        label {
            display: block;
            font-weight: bold;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 15px;
            background: blue;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="settings-container">
        <h2>Settings</h2>
        <div class="settings-item" onclick="openModal()">Edit Profile</div>
        <div class="modal" id="editProfileModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h3>Edit Profile</h3>
            <form id="editProfileForm" enctype="multipart/form-data">
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" required>
    </div>
    <div class="form-group">
        <label>Date of Birth</label>
        <input type="date" name="dob" required>
    </div>
    <div class="form-group">
        <label>Gender</label>
        <input type="text" name="gender" required>
    </div>
    
    <div class="form-group">
        <label>Phone</label>
        <input type="text" name="phone">
    </div>
    <div class="form-group">
        <label>Profile Picture</label>
        <input type="file" name="profile_picture">
    </div>
    <div class="form-group">
        <label>Bio</label>
        <textarea name="bio"></textarea>
    </div>
    <div class="form-group">
        <label>Location</label>
        <input type="text" name="location">
    </div>
    <div class="form-group">
        <label>Interest</label>
        <input type="text" name="interest">
    </div>
    <button type="submit">Save Changes</button>
</form>

        </div>
    </div>

   


    <div class="settings-item" onclick="openChangePasswordModal()">Change Password</div>

        <div class="modal" id="changePasswordModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeChangePasswordModal()">&times;</span>
        <h3>Change Password</h3>
        <form id="changePasswordForm">
            <div class="form-group">
                <label>Current Password</label>
                <input type="password" name="current_password" required>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" required>
            </div>
            <div class="form-group">
                <label>Confirm New Password</label>
                <input type="password" name="confirm_password" required>
            </div>
            <button type="submit">Update Password</button>
        </form>
        <p id="passwordMessage"></p>
    </div>
</div>

        <div class="settings-item">Privacy Settings</div>
        <div class="settings-item">Security Settings</div>
        <div class="settings-item">Notification Settings</div>
        <div class="settings-item">Theme Settings</div>
        <div class="settings-item" onclick="openHelpModal()">Help & Support</div>

<div class="modal" id="helpModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeHelpModal()">&times;</span>
        <h3>Help & Support</h3>
        <p>If you have any issues or queries, please contact us:</p>
        <ul>
            <li>Email: support@instagramclone.com</li>
            <li>Phone: +91-9876543210</li>
            <li>FAQ: <a href="#">Visit Help Center</a></li>
        </ul>
        <h4>Submit a Query</h4>
        <form action="help_support.php" method="POST">
            <div class="form-group">
                <label>Your Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Your Issue</label>
                <textarea name="message" required></textarea>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</div>

<script>
    function openHelpModal() {
        document.getElementById('helpModal').style.display = 'flex';
    }
    function closeHelpModal() {
        document.getElementById('helpModal').style.display = 'none';
    }
</script>

        <div class="settings-item logout" onclick="openLogoutModal()">Logout</div>
        <div class="modal" id="logoutModal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeLogoutModal()">&times;</span>
        <h3>Are you sure you want to logout?</h3>
        <button onclick="logoutUser()">Yes, Logout</button>
        <button onclick="closeLogoutModal()">Cancel</button>
    </div>
</div>


    </div>
    <script>
        function openModal() {
            document.getElementById('editProfileModal').style.display = 'flex';
        }
        function closeModal() {
            document.getElementById('editProfileModal').style.display = 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   
    $(document).ready(function() {
        $("#editProfileForm").on("submit", function(e) {
            e.preventDefault(); 
            var formData = new FormData(this);

            $.ajax({
                url: "update_profile.php",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response);
                    closeModal(); 
                },
                error: function() {
                    alert("Something went wrong!");
                }
            });
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function openModal() {
        $("#editProfileModal").css("display", "flex");

        $.ajax({
            url: "fetch_profile.php", // PHP से डेटा लाने का फाइल
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.status == "success") {
                    $("input[name='username']").val(response.username);
                    $("input[name='dob']").val(response.dob);
                    $("input[name='gender']").val(response.gender);
                    $("input[name='phone']").val(response.phone);
                    $("textarea[name='bio']").val(response.bio);
                    $("input[name='location']").val(response.location);
                    $("input[name='interest']").val(response.interest);
                } else {
                    alert("Failed to fetch data.");
                }
            }
        });
    }

    function closeModal() {
        $("#editProfileModal").css("display", "none");
    }
</script>
<script>
    function openChangePasswordModal() {
    document.getElementById('changePasswordModal').style.display = 'flex';
}
function closeChangePasswordModal() {
    document.getElementById('changePasswordModal').style.display = 'none';
}

document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Form Reload को रोकने के लिए

    let formData = new FormData(this);

    fetch('change_password.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('passwordMessage').innerText = data.message;
        if (data.status === 'success') {
            setTimeout(() => closeChangePasswordModal(), 2000); // 2 sec बाद Modal बंद
        }
    })
    .catch(error => console.error('Error:', error));
});

</script>
<script>
    function openLogoutModal() {
        document.getElementById('logoutModal').style.display = 'flex';
    }

    function closeLogoutModal() {
        document.getElementById('logoutModal').style.display = 'none';
    }

    function logoutUser() {
        window.location.href = 'logout.php';
    }
</script>
<script>
    function openHelpModal() {
        document.getElementById('helpModal').style.display = 'flex';
    }
    function closeHelpModal() {
        document.getElementById('helpModal').style.display = 'none';
    }
</script>

</body>
</html>
