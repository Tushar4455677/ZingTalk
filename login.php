<?php
session_start();
include "db_config.php"; // Database Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic Validation
    if (empty($email) || empty($password)) {
        echo '<div class="alert alert-danger">All fields are required!</div>';
        exit();
    }

    // Fetch User
    $sql = "SELECT * FROM peoples WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];  // ✅ User ID सेट करें
            $_SESSION['user'] = $row['name'];   // ✅ यूज़र नाम भी सेट करें
            echo '<div class="alert alert-success">Login successful! Redirecting...</div>';
            echo "<script>setTimeout(function(){ window.location.href = 'mainPage.php'; }, 2000);</script>";
        } else {
            echo '<div class="alert alert-danger">Invalid password!</div>';
        }
    } else {
        echo '<div class="alert alert-danger">Email not registered!</div>';
    }

    $stmt->close();
    $conn->close();
}
?>
