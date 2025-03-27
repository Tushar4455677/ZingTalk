<?php
session_start();
include 'db_config.php'; // Database Connection

$user_id = $_SESSION['user_id']; // जो User Logged In है

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if new passwords match
    if ($new_password !== $confirm_password) {
        echo json_encode(["status" => "error", "message" => "New passwords do not match!"]);
        exit;
    }

    // Fetch user's current password from database
    $sql = "SELECT password FROM peoples WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        // Verify current password
        if (!password_verify($current_password, $hashed_password)) {
            echo json_encode(["status" => "error", "message" => "Current password is incorrect!"]);
            exit;
        }

        // Hash new password before storing
        $new_hashed_password = password_hash($new_password, PASSWORD_BCRYPT);

        // Update password in database
        $update_sql = "UPDATE peoples SET password = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("si", $new_hashed_password, $user_id);
        
        if ($update_stmt->execute()) {
            echo json_encode(["status" => "success", "message" => "Password updated successfully!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update password!"]);
        }

        $update_stmt->close();
    } else {
        echo json_encode(["status" => "error", "message" => "User not found!"]);
    }

    $stmt->close();
    $conn->close();
}
?>
