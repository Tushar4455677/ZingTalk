<?php
include "db_config.php"; // Database Connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);

    if (!empty($email) && !empty($message)) {
        $sql = "INSERT INTO help_queries (email, message) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $email, $message);

        if ($stmt->execute()) {
            echo "<script>alert('Query Submitted Successfully!'); window.location.href='settings.php';</script>";
        } else {
            echo "<script>alert('Something went wrong, try again!');</script>";
        }

        $stmt->close();
    }
    $conn->close();
}
?>
