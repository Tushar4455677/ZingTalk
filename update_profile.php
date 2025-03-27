<?php
session_start();
include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $username = $_POST['username'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $location = $_POST['location'];
    $interest = $_POST['interest'];

    $profile_picture = "";
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['size'] > 0) {
        $target_dir = "images/";
        $file_name = basename($_FILES["profile_picture"]["name"]);
        $target_file = $target_dir . $file_name;

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $profile_picture = $file_name;
        } else {
            echo "Error uploading file.";
            exit;
        }
    }

    $sql = "UPDATE profiles SET 
                username = ?, dob = ?, gender = ?, phone = ?, bio = ?, location = ?, interest = ?" .
                (!empty($profile_picture) ? ", profile_picture = ?" : "") . 
            " WHERE id = ?";

    $stmt = $conn->prepare($sql);
    
    if (!empty($profile_picture)) {
        $stmt->bind_param("ssssssssi", $username, $dob, $gender, $phone, $bio, $location, $interest, $profile_picture, $user_id);
    } else {
        $stmt->bind_param("sssssssi", $username, $dob, $gender, $phone, $bio, $location, $interest, $user_id);
    }

    if ($stmt->execute()) {
        echo "Profile updated successfully!";
    } else {
        echo "Error updating profile: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
