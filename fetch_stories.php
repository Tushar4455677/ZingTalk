<?php
include 'db_config.php';

$query = "SELECT s.story_text, s.story_image, s.created_at, 
                 p.username, p.profile_picture 
          FROM stories s 
          JOIN profiles p ON s.user_id = p.id 
          ORDER BY s.created_at DESC";

$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div style="background: white; padding: 10px; margin-bottom: 10px; border-radius: 10px;">';

        // Profile Picture & Username
        echo '<div style="display: flex; align-items: center; margin-bottom: 5px;">';
        echo '<img src="images/' . $row['profile_picture'] . '" style="width: 40px; height: 40px; border-radius: 50%; margin-right: 10px;">';
        echo '<p style="font-weight: bold; margin: 0;">' . $row['username'] . '</p>';
        echo '</div>';

        // Story Text
        echo '<p style="font-weight: bold;">' . $row['story_text'] . '</p>';

        // Story Image
        echo '<img src="stories/' . $row['story_image'] . '" style="width: 100%; height: auto; border-radius: 5px;">';

        // Created Time
        echo '<p style="font-size: 12px; color: gray;">' . $row['created_at'] . '</p>';
        
        echo '</div>';
    }
} else {
    echo "<p style='color: white;'>No stories available.</p>";
}
?>
