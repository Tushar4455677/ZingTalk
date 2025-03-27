<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include 'db_config.php';
       
        $username = $_POST['username'];
        $dob = $_POST['dob'];
        $gender = $_POST['gender'];
        $phone = $_POST['phone'];
        $bio = $_POST['bio'];
        $location = $_POST['location'];
        $interest = $_POST['interest'];
        $created_at = date('Y-m-d H:i:s');
        
        if ($_FILES['profile_picture']['name']) {
            $target_dir = "images/";
            $image_name = basename($_FILES['profile_picture']['name']);
            $target_file = $target_dir . $image_name;
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
        }
        
        $query = "INSERT INTO profiles ( username, dob, gender, phone, profile_picture, bio, location, interest, created_at) 
                  VALUES ('$username', '$dob', '$gender', '$phone', '$image_name', '$bio', '$location', '$interest', '$created_at')";
        
        if (mysqli_query($conn, $query)) {
            echo '<p class="success">Profile Saved Sucessfully! Please login now to view your profile</p>';
        } else {
            echo '<p class="error">Error: '. mysqli_error($conn) .'</p>';
        }
    }
    ?>