<?php
session_start();
include 'db_config.php'; // Database Connection

$user_id = $_SESSION['user_id']; // यूजर ID जो लॉगिन से आई होगी

$sql = "SELECT username, dob, gender, phone, bio, location, interest FROM profiles WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode(["status" => "success"] + $row);
} else {
    echo json_encode(["status" => "error"]);
}

$stmt->close();
$conn->close();
?>
