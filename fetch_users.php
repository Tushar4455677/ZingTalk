<?php
session_start();
include "db_config.php"; // Database connection
$loggedInUserId = $_SESSION['user_id'];

// Fetch users who are not followed by the logged-in user
$query = "SELECT p.id, p.username, p.profile_picture 
          FROM profiles p 
          WHERE p.id NOT IN (
              SELECT following_id FROM followers WHERE follower_id = ?
          ) AND p.id != ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $loggedInUserId, $loggedInUserId);
$stmt->execute();
$result = $stmt->get_result();

$output = "";
while ($row = $result->fetch_assoc()) {
    $output .= '
        <div class="d-flex align-items-center mb-3">
            <img src="images/'.$row['profile_picture'].'" width="65" height="60" class="rounded-circle me-2">
            <span class="me-2">'.$row['username'].'</span>
            <button class="btn btn-primary follow-btn" data-userid="'.$row['id'].'">Follow</button>
        </div>';
}
echo $output;
?>
