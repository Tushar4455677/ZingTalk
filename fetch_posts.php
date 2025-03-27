<?php
session_start();
include 'db_config.php'; // Database connection

// Fetch posts
$query = "SELECT p.*, pr.username, pr.profile_picture FROM posts p JOIN profiles pr ON p.user_id = pr.id ORDER BY p.id DESC";
$result = mysqli_query($conn, $query);

// Error handling
if (!$result) {
    die("Query Failed: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Clone</title>
    <style>
        body { font-family: Arial, sans-serif; background:black; text-align: center; }
        .container { width: 50%; margin: auto; }
        .post { background: white; padding: 15px; margin: 20px 0; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .post-header { display: flex; align-items: center; padding: 10px; }
        .profile-pic, .comment-pic { width: 40px; height: 40px; border-radius: 50%; margin-right: 10px; }
        .username { font-weight: bold; }
        .post-content img, video { width: 100%; border-radius: 10px; }
        .post-actions { display: flex; justify-content: space-between; padding: 10px; }
        .comment-section { display: none; padding: 10px; background: #f9f9f9; border-radius: 5px; }
        .comment-list { max-height: 200px; overflow-y: auto; text-align: left; }
        .comment { display: flex; align-items: center; margin-top: 5px; }
        .bio { font-size: 14px; color: #444; margin-top: 5px; }
    </style>
</head>
<body>
    <div class="container">
        <?php while ($row = mysqli_fetch_assoc($result)) { 
            $post_id = $row['id'];
            $location = $row['location'];
            $username = $row['username'];
            $bio = $row['bio'];
            $profile_picture = 'images/' . $row['profile_picture'];
            $post_image = !empty($row['post_image']) ? $row['post_image'] : '';
            $post_video = !empty($row['post_video']) ? $row['post_video'] : '';
            
            // Fetch likes
            $like_query = "SELECT COUNT(*) as like_count FROM likes WHERE post_id='$post_id'";
            $like_result = mysqli_query($conn, $like_query);
            $like_count = ($like_result) ? mysqli_fetch_assoc($like_result)['like_count'] : 0;

            // Fetch comments
            $comment_query = "SELECT c.*, pr.username, pr.profile_picture FROM comments c JOIN profiles pr ON c.user_id = pr.id WHERE c.post_id='$post_id' ORDER BY c.id DESC";
            $comments = mysqli_query($conn, $comment_query);
        ?>

        <div class='post'>
            <div class='post-header'>
                <img src='<?php echo $profile_picture; ?>' class='profile-pic'>
                <span class='username'><?php echo $username; ?></span><br>
                <span class='location'>📍 <?php echo $location; ?></span>
            </div>
            <div class='post-content'>
    <?php if (!empty($post_video)) { ?>
        <video src='<?php echo $post_video; ?>' controls></video>
    <?php } elseif (!empty($post_image)) { ?>
        <img src='<?php echo $post_image; ?>'>
    <?php } ?>
</div>


            <div class='bio'><?php echo $bio; ?></div>
            <div class='post-actions'>
            <button class='like-btn' onclick='likePost(<?php echo $post_id; ?>)'>
    ❤️ <span id="like-count-<?php echo $post_id; ?>"><?php echo $like_count; ?></span>
</button>

                <button class='comment-btn' onclick='toggleComments(<?php echo $post_id; ?>)'>💬</button>
            </div>
            <div class='comment-section' id='comments-<?php echo $post_id; ?>'>
                <div class='comment-list'>
                    <?php while ($comment = mysqli_fetch_assoc($comments)) { ?>
                        <div class='comment'>
                            <img src='images/<?php echo $comment['profile_picture']; ?>' class='comment-pic'>
                            <b><?php echo $comment['username']; ?></b>: <?php echo $comment['text']; ?>
                        </div>
                    <?php } ?>
                </div>
                <input type='text' id='comment-input-<?php echo $post_id; ?>' placeholder='Add a comment...'>
                <button onclick='postComment(<?php echo $post_id; ?>)'>Post</button>
            </div>
        </div>

        <?php } ?>
    </div>

    <script>
     function likePost(postId) {
    fetch('like.php', {
        method: 'POST',
        headers: {'Content-Type': 'application/x-www-form-urlencoded'},
        body: 'post_id=' + postId
    })
    .then(response => response.text())
    .then(updatedLikes => {
        document.getElementById('like-count-' + postId).innerText = updatedLikes;
    });
}


        function toggleComments(postId) {
            let commentSection = document.getElementById('comments-' + postId);
            commentSection.style.display = (commentSection.style.display === 'block') ? 'none' : 'block';
        }

        function postComment(postId) {
            let commentText = document.getElementById('comment-input-' + postId).value;
            fetch('comment.php', {
                method: 'POST',
                headers: {'Content-Type': 'application/x-www-form-urlencoded'},
                body: 'post_id=' + postId + '&text=' + encodeURIComponent(commentText)
            }).then(() => location.reload());
        }
    </script>
    
</body>
</html>
