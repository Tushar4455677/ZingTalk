<?php
session_start();
include 'db_config.php';

if (!isset($_SESSION['user_id'])) {
    die("Login required");
}

$user_id = $_SESSION['user_id'];  // Comment करने वाला User
$post_id = $_POST['post_id'];
$text = trim($_POST['text']);

if ($text == "") {
    die("Empty comment");
}

// Insert Comment
$query = "INSERT INTO comments (user_id, post_id, text) VALUES (?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("iis", $user_id, $post_id, $text);
$stmt->execute();

// Get Commenter's Username & Profile Pic
$user_query = "SELECT username, profile_picture FROM profiles WHERE id=?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Return Comment Data as JSON
echo json_encode([
    'username' => $user['username'],
    'profile_pic' => $user['profile_pic'],
    'text' => $text
]);
?>
