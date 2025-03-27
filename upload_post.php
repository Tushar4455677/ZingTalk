<?php
session_start();
include 'db_config.php'; // Database connection file

if (!isset($_SESSION['user_id'])) {
    echo "not_logged_in";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];  
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $bio = mysqli_real_escape_string($conn, $_POST['bio']);
    $created_at = date("Y-m-d H:i:s");

    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $upload_dir = "uploads/";
        $new_file_name = uniqid() . "." . $file_ext;
        $file_path = $upload_dir . $new_file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $post_image = in_array($file_ext, ["jpg", "png", "jpeg"]) ? $file_path : null;
            $post_video = in_array($file_ext, ["mp4", "mov", "avi"]) ? $file_path : null;

            $sql = "INSERT INTO posts (user_id, post_image, post_video, bio, location, created_at) 
                    VALUES ('$user_id', ?, ?, '$bio', '$location', '$created_at')";
            
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "ss", $post_image, $post_video);
            
            if (mysqli_stmt_execute($stmt)) {
                echo "success";
            } else {
                echo "error";
            }
            mysqli_stmt_close($stmt);
        } else {
            echo "file_upload_error";
        }
    } else {
        echo "no_file";
    }
}
?>
