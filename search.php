<?php
    include 'db_config.php'; // Database connection file

    if (isset($_POST['query'])) {
        $query = mysqli_real_escape_string($conn, $_POST['query']);
        $sql = "SELECT id, username, profile_picture FROM profiles WHERE username LIKE '%$query%' LIMIT 10";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Database Query Failed: " . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='user-item' onclick=\"window.location.href='profile1.php?id=" . $row['id'] . "'\">";
            echo "<img src='images/" . $row['profile_picture'] . "' alt='profile'>";
            echo "<span>" . $row['username'] . "</span>";
            echo "</div>";
        }
    }
    ?>
