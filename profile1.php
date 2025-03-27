<?php
include 'db_config.php'; // Database connection file

if (isset($_GET['id'])) {
    $user_id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT username, dob, gender, phone, profile_picture, bio, location, interest FROM profiles WHERE id = '$user_id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        die("User not found");
    }
} else {
    die("Invalid request");
}
?>
 <?php

include 'db_config.php'; // Database connection file include karna na bhool
// Assuming user is logged in

// Total Posts Count
$post_count_query = $conn->prepare("SELECT COUNT(*) FROM posts WHERE user_id = ?");
$post_count_query->bind_param("i", $user_id);
$post_count_query->execute();
$post_count_query->bind_result($total_posts);
$post_count_query->fetch();
$post_count_query->close();

// Total Followers Count
$followers_count_query = $conn->prepare("SELECT COUNT(*) FROM followers WHERE following_id = ?");
$followers_count_query->bind_param("i", $user_id);
$followers_count_query->execute();
$followers_count_query->bind_result($total_followers);
$followers_count_query->fetch();
$followers_count_query->close();

// Total Following Count
$following_count_query = $conn->prepare("SELECT COUNT(*) FROM followers WHERE follower_id = ?");
$following_count_query->bind_param("i", $user_id);
$following_count_query->execute();
$following_count_query->bind_result($total_following);
$following_count_query->fetch();
$following_count_query->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Profile Clone</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        .post-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    justify-items: center;
    margin-top: 20px;
}

.post {
    width: 230px;
    height: 200px;
    margin: 5px;
    display: inline-block;
    position: relative;
    overflow: hidden;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    cursor: pointer;
}

.post-img, .post-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.post-location {
    font-size: 12px;
    text-align: center;
    color: gray;
    margin-top: 5px;
}

.post-bio {
    font-size: 12px;
    text-align: center;
    margin-top: 5px;
}

/* Modal Styling */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.8);
}

.modal-content {
    display: block;
    margin: 10% auto;
    width: 50%;
    max-width: 600px;
}

.modal-img, .modal-video {
    width: 100%;
    height: auto;
    border-radius: 5px;
}

.close {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 30px;
    color: white;
    cursor: pointer;
}
.post-date {
    font-size: 12px;
    color: #999;
    margin-left:70px;
}
        .profile-stats {
    display: flex;
    justify-content: space-around;
    margin-top: 10px;
    font-size: 16px;
}
.profile-stats span {
    font-weight: bold;
    color: #333;
}

body {
    background-color:black;
    font-family: Arial, sans-serif;
}

.profile-container {
    max-width: 800px;
    margin: 30px auto;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease-in-out;
    animation: fadeIn 0.5s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 15px;
}

.profile-pic {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    border: 3px solid #ddd;
    object-fit: cover;
    transition: transform 0.3s;
}

.profile-pic:hover {
    transform: scale(1.1);
}

.profile-info h2 {
    margin: 0;
    color: #333;
}

.bio {
    font-size: 14px;
    color: #666;
    margin-top: 5px;
}

.about-section {
    margin-top: 20px;
    padding: 10px;
    border-top: 1px solid #ddd;
    background: #fafafa;
    border-radius: 8px;
}

.about-section p {
    margin: 5px 0;
    font-size: 14px;
    color: #444;
}

.profile-actions {
    display: flex;
    justify-content: space-around;
    margin-top: 20px;
}

.profile-actions button {
    width: 30%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    background: #667eea;
    color: white;
    transition: background 0.3s;
}

.profile-actions button:hover {
    background: #5640c9;
}

.no-posts {
    text-align: center;
    margin-top: 20px;
    color: #888;
    font-size: 16px;
}
</style>
</head>
<body>
<div class="profile-container fade-in">
        <div class="profile-header">
        <img src="images/<?php echo $user['profile_picture']; ?>" alt="Profile Picture" class="profile-pic">

            <div class="profile-info">
                <h2 id="username"><?php echo htmlspecialchars($user['username']); ?></h2>
                <p class="bio" id="userbio"><i class="fa-solid fa-pen" style="margin-right:8px;"></i><?php echo htmlspecialchars($user['bio']); ?></p>
            </div>
        </div>
        <div class="about-section">
            <p><i class="fa-solid fa-location-dot" style="margin-right:8px;"></i><strong>Location:</strong> <span id="location"><?php echo htmlspecialchars($user['location']); ?></span></p>
            <p><i class="fa-solid fa-venus-mars" style="margin-right:8px;"></i> <strong>Gender:</strong> <span id="gender"><?php echo htmlspecialchars($user['gender']); ?></span></p>
            <p><i class="fa-solid fa-heart" style="margin-right:8px;"></i><strong>Interests:</strong> <span id="interests"><?php echo htmlspecialchars($user['interest']); ?></span></p>
            <p><i class="fa-solid fa-calendar" style="margin-right:8px;"></i><strong>Birth Date:</strong> <span id="birthdate"><?php echo htmlspecialchars($user['dob']); ?></span></p>
            <p><i class="fa-solid fa-phone" style="margin-right:8px;"></i><strong>Phone:</strong> <span id="birthdate"><?php echo htmlspecialchars($user['phone']); ?></span></p>
        </div>
        <div class="profile-stats">
    <span><strong><?php echo $total_posts; ?></strong> Posts</span>
    <span><strong><?php echo $total_followers; ?></strong> Followers</span>
    <span><strong><?php echo $total_following; ?></strong> Following</span>
</div>

        <div class="profile-actions">
            <button id="posts-btn">Posts</button>
            <button id="reels-btn">Reels</button>
            <button >Edit Profile</button>
        </div>
        <?php
include 'db_config.php'; // Database connection

/* // Validate user_id from GET request
if (!isset($_GET['user_id']) || empty($_GET['user_id']) || !is_numeric($_GET['user_id'])) {
    echo "<div class='error'>Invalid User ID</div>";
    exit;
}

$user_id = intval($_GET['user_id']); // Convert to integer */

// Fetch user's posts
$sql = "SELECT id, post_image, post_video, bio , created_at, location FROM posts WHERE user_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo '<div class="post-grid">'; // Start grid container
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="post" onclick="openModal('<?php echo $row['id']; ?>')">
            <!-- Post Location -->
            <?php if (!empty($row['location'])) { ?>
                <p class="post-location">📍<?php echo htmlspecialchars($row['location']); ?></p>
                <span class="post-date"><?php echo date("d M Y", strtotime($row['created_at'])); ?></span>
            <?php } ?>

            <!-- Post Image or Video -->
            <?php if (!empty($row['post_image'])) { ?>
                <img src="<?php echo htmlspecialchars($row['post_image']); ?>" class="post-img">
            <?php } elseif (!empty($row['post_video'])) { ?>
                <video controls class="post-video">
                    <source src="<?php echo htmlspecialchars($row['post_video']); ?>" type="video/mp4">
                </video>
            <?php } ?>

            <!-- Post Bio -->
            <?php if (!empty($row['bio'])) { ?>
                <p class="post-bio"><?php echo htmlspecialchars($row['bio']); ?></p>
            <?php } ?>
        </div>

        <!-- Modal for Full Post View -->
        <div id="modal-<?php echo $row['id']; ?>" class="modal">
            <span class="close" onclick="closeModal('<?php echo $row['id']; ?>')">&times;</span>
            <div class="modal-content">
                <?php if (!empty($row['post_image'])) { ?>
                    <img src="<?php echo htmlspecialchars($row['post_image']); ?>" class="modal-img">
                <?php } elseif (!empty($row['post_video'])) { ?>
                    <video controls class="modal-video">
                        <source src="<?php echo htmlspecialchars($row['post_video']); ?>" type="video/mp4">
                    </video>
                <?php } ?>
            </div>
        </div>
        <?php
    }
    echo '</div>'; // Close grid container
} else {
    echo '<div class="no-posts"><p>No posts yet</p></div>';
}
?>

    </div>
    <!-- Modal -->
     <script>
        function openModal(postId) {
    document.getElementById('modal-' + postId).style.display = 'block';
}

function closeModal(postId) {
    document.getElementById('modal-' + postId).style.display = 'none';
}

     </script>
    </div>
    </body
