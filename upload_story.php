<?php
include 'db_config.php';
session_start(); // अगर सेशन पहले से स्टार्ट नहीं किया तो

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!isset($_SESSION['user_id'])) {
        echo "<span style='color: red;'>User not logged in!</span>";
        exit();
    }

    $user_id = $_SESSION['user_id']; // यूजर की ID सेशन से लो
    $image_name = $_FILES['story_image']['name'];
    $image_tmp = $_FILES['story_image']['tmp_name'];
    $upload_dir = "stories/";

    // Move image to stories folder
    if (move_uploaded_file($image_tmp, $upload_dir . $image_name)) {
        $query = "INSERT INTO stories (user_id, story_image) VALUES ('$user_id', '$image_name')";

        if (mysqli_query($conn, $query)) {
            echo "<span style='color: green;'>Story Uploaded Successfully!</span>";
        } else {
            echo "<span style='color: red;'>Database Error: " . mysqli_error($conn) . "</span>";
        }
    } else {
        echo "<span style='color: red;'>Image Upload Failed</span>";
    }
}
?>
