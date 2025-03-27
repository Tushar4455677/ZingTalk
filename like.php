<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    die("Login required");
}

$user_id = $_SESSION['user_id'];
$post_id = $_POST['post_id'];

// Check if the user has already liked the post
$check_like = "SELECT * FROM likes WHERE user_id='$user_id' AND post_id='$post_id'";
$result = mysqli_query($conn, $check_like);

if (mysqli_num_rows($result) > 0) {
    // Unlike the post (Remove like)
    $query = "DELETE FROM likes WHERE user_id='$user_id' AND post_id='$post_id'";
} else {
    // Like the post
    $query = "INSERT INTO likes (user_id, post_id) VALUES ('$user_id', '$post_id')";
}

if (mysqli_query($conn, $query)) {
    // Get updated like count
    $like_count_query = "SELECT COUNT(*) as total_likes FROM likes WHERE post_id='$post_id'";
    $like_count_result = mysqli_query($conn, $like_count_query);
    $like_count = mysqli_fetch_assoc($like_count_result)['total_likes'];
    echo $like_count;
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
