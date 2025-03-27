<?php
include "db_config.php"; // Database Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Basic Validation
    if (empty($name) || empty($email) || empty($password)) {
        echo '<div class="alert alert-danger">All fields are required!</div>';
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<div class="alert alert-danger">Invalid email format!</div>';
        exit();
    }
    if (strlen($password) < 6) {
        echo '<div class="alert alert-danger">Password must be at least 6 characters!</div>';
        exit();
    }

    // Check if email already exists
    $sql = "SELECT * FROM peoples WHERE email=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo '<div class="alert alert-warning">Email already registered!</div>';
        exit();
    }

    // Insert into database
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $sql = "INSERT INTO peoples (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashed_password);

    if ($stmt->execute()) {
        echo '<div class="alert alert-success">Signup successful! Redirecting...</div>';
        echo "<script>setTimeout(function(){ location.reload(); }, 2000);</script>";
    } else {
        echo '<div class="alert alert-danger">Signup failed! Try again.</div>';
    }

    $stmt->close();
    $conn->close();
}
?>
