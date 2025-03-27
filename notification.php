<?php
session_start();
include "db_config.php"; // Database connection
$loggedInUserId = $_SESSION['user_id'];

// Fetch Notifications for the Logged-in User
$query = "SELECT message, created_at FROM notifications WHERE receiver_id = ? ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $loggedInUserId);
$stmt->execute();
$result = $stmt->get_result();

function timeAgo($datetime) {
    $timestamp = strtotime($datetime);
    $difference = time() - $timestamp;
    if ($difference < 60) return "Just now";
    if ($difference < 3600) return floor($difference / 60) . " minutes ago";
    if ($difference < 86400) return floor($difference / 3600) . " hours ago";
    if ($difference < 172800) return "Yesterday";
    return date("F j, Y, g:i a", $timestamp);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: black;
            color: white;
            font-family: Arial, sans-serif;
        }
        .notification-container {
            max-width: 500px;
            margin: 20px auto;
            background: #1e1e1e;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }
        .notification {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            border-radius: 10px;
            background: #2a2a2a;
            margin-bottom: 10px;
            transition: transform 0.3s, background 0.3s;
        }
        .notification:hover {
            background: #444;
            transform: scale(1.02);
        }
        .notification i {
            color: lightskyblue;
            font-size: 24px;
        }
        .notification small {
            color: #bbb;
            font-size: 12px;
        }
        .sidebar {
            height: 100vh;
            background: white;
            border-right: 1px solid #dbdbdb;
            padding: 20px;
            position: fixed;
        }
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 22px;
            font-size: 18px;
            color: #333;
            text-decoration: none;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .sidebar a:hover {
            background: lightskyblue;
        }
        .sidebar a i {
            font-size: 22px;
        }
        .bottom-nav {
            display: none;
            background: white;
            position: fixed;
            bottom: 0;
            width: 100%;
            border-top: 1px solid #dbdbdb;
            padding: 10px 0;
        }
        .bottom-nav a {
            flex: 1;
            text-align: center;
        }
        @media (max-width: 768px) {
            .sidebar {
                display: none;
            }
            .bottom-nav {
                display: flex;
                justify-content: space-around;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar for Desktop -->
        <div class="col-4 col-md-3 col-lg-2 sidebar d-none d-md-block">
            <a href="mainPage.php"><i class="fa-solid fa-house"></i> Home</a>
            <a href="#"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
            <a href="fetch_posts.php"><i class="fa-solid fa-clapperboard"></i> Reels And Posts</a>
            <a href="#"><i class="fa-solid fa-envelope"></i> Messages</a>
            <a href="notification.php"><i class="fa-solid fa-heart"></i> Notifications</a>
            <a href="#"><i class="fa-solid fa-plus-square"></i> Create</a>
            <a href="profile.php"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
            <a href="#"><i class="fa-solid fa-bookmark"></i> Saved</a>
            <a href="#"><i class="fa-solid fa-triangle-exclamation"></i> Report a Problem</a>
        </div>
    </div>
</div>
    <div class="notification-container">
        <h3 class="text-center">Notifications</h3>
        
        <?php if ($result->num_rows > 0) { ?>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                    <div>
                        <p><?php echo $row['message']; ?></p>
                        <small><?php echo timeAgo($row['created_at']); ?></small>
                    </div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p class="text-center">No Notifications Yet!</p>
        <?php } ?>
    </div>
</body>
</html>