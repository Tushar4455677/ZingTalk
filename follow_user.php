<?php
session_start();
include "db_config.php"; // Database connection
$loggedInUserId = $_SESSION['user_id'];
$userId = $_POST['userId'];
$action = $_POST['action'];

// Get logged-in user username
$userQuery = $conn->prepare("SELECT username FROM profiles WHERE id = ?");
$userQuery->bind_param("i", $loggedInUserId);
$userQuery->execute();
$userResult = $userQuery->get_result();
$loggedInUsername = $userResult->fetch_assoc()['username'];

// Get followed user's username
$userQuery = $conn->prepare("SELECT username FROM profiles WHERE id = ?");
$userQuery->bind_param("i", $userId);
$userQuery->execute();
$userResult = $userQuery->get_result();
$followedUsername = $userResult->fetch_assoc()['username'];

if ($action == "follow") {
    $stmt = $conn->prepare("INSERT INTO followers (follower_id, following_id) VALUES (?, ?)");
    $stmt->bind_param("ii", $loggedInUserId, $userId);
    $stmt->execute();

    // Insert Notification for Logged-in User
    $message1 = "you Have Followed @$followedUsername  Now You are Friends";
    $stmt = $conn->prepare("INSERT INTO notifications (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $loggedInUserId, $loggedInUserId, $message1);
    $stmt->execute();

    // Insert Notification for Followed User
    $message2 = "@$loggedInUsername  has followed you. Now you are Friends.";
    $stmt = $conn->prepare("INSERT INTO notifications (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $loggedInUserId, $userId, $message2);
    $stmt->execute();

    echo "followed";
} elseif ($action == "unfollow") {
    $stmt = $conn->prepare("DELETE FROM followers WHERE follower_id = ? AND following_id = ?");
    $stmt->bind_param("ii", $loggedInUserId, $userId);
    $stmt->execute();

    // Delete Notifications Related to This Follow
    $stmt = $conn->prepare("DELETE FROM notifications WHERE sender_id = ? AND receiver_id = ? AND message LIKE ?");
    $msg1 = "%@$followedUsername%";
    $stmt->bind_param("iis", $loggedInUserId, $loggedInUserId, $msg1);
    $stmt->execute();

    $msg2 = "%@$loggedInUsername%";
    $stmt = $conn->prepare("DELETE FROM notifications WHERE sender_id = ? AND receiver_id = ? AND message LIKE ?");
    $stmt->bind_param("iis", $loggedInUserId, $userId, $msg2);
    $stmt->execute();

    echo "unfollowed";
}
?>
