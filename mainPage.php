<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Sidebar Clone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: black;
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

        /* Popup Menu Styling */
        .popup-menu {
            display: none;
            position: absolute;
            top: 40px;
            left: 10px;
            background: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            padding: 10px;
            z-index: 100;
        }

        .popup-menu a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: black;
        }

        .popup-menu a:hover {
            background: #f1f1f1;
        }

        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 999;
        }

        /* Popup Box */
        .popup-box {
            background: white;
            padding: 20px;
            width: 90%;
            max-width: 400px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Close Button */
        .close-btn {
            background: red;
            color: white;
            border: none;
            padding: 8px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        /* Input Field */
        input,
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Submit Button */
        .submit-btn {
            background: blue;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .stories-container {
            position: absolute;
            top: 50px;
            left: 800px;
            width: 38%;
            /* ✅ अब container की width 45% होगी */
            display: flex;
            gap: 10px;
            padding: 10px;
            overflow-x: auto;
            /* ✅ ज्यादा स्टोरी होने पर horizontal scroll आएगा */
            white-space: nowrap;
            margin-left: 10px;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .story-icon {
            text-align: center;
            cursor: pointer;
            margin-left: 27px;
        }

        .story-border {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            border: 3px solid blue;
            padding: 2px;
        }

        .story-icon img {
            width: 55px;
            height: 55px;
            border-radius: 50%;
        }

        .story-icon p {
            color: red;
            /* ✅ Username का text blue होगा */
            font-weight: bold;
            /* (Optional) थोड़ा bold दिखाने के लिए */
            font-size: 14px;
            margin-top: 9px;
            /* (Optional) Font size set करने के लिए */
        }

        .story-popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            justify-content: center;
            align-items: center;
        }

        .story-content {
            position: relative;
            background: white;
            padding: 10px;
            border-radius: 10px;
        }

        .story-content img {
            width: 100%;
            max-width: 400px;
        }

        .search-popup {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 450px;
            background: #fff;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            border-radius: 10px;
            padding: 20px;
            display: none;
            text-align: center;
        }

        .search-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 15px;
        }

        .search-box {
            display: flex;
            align-items: center;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: #f9f9f9;
        }

        .search-box i {
            margin-right: 10px;
            font-size: 18px;
            color: #555;
        }

        .search-box input {
            width: 100%;
            border: none;
            background: transparent;
            outline: none;
            font-size: 16px;
        }

        .search-popup .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
        }

        .search-results {
            margin-top: 10px;
            max-height: 300px;
            overflow-y: auto;
        }

        .user-item {
            display: flex;
            align-items: center;
            padding: 10px;
            cursor: pointer;
            border-bottom: 1px solid #ddd;
        }

        .user-item img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .popup {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            width: 350px;
            animation: fadeIn 0.3s ease-in-out;
            position: relative;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        input,
        textarea {
            width: 100%;
            margin: 10px 0;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btnnn {
            background: #0095f6;
            color: white;
            padding: 10px;
            border: none;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }

        .success-message {
            display: none;
            color: green;
            margin-top: 10px;
        }

        .post-container {
            width: 400px;
            background: white;
            margin: 20px auto;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        .post-header {
            display: flex;
            align-items: center;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-image,
        .post-video {
            width: 100%;
            border-radius: 10px;
            margin-top: 10px;
        }

        .like-comment {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .comment-box {
            display: none;
            margin-top: 10px;
        }



        /* ✅ Responsive Design */
        @media (max-width: 768px) {
            .stories-section {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                height: 90px;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow-x: auto;
                white-space: nowrap;
            }

            .stories-container {
                flex-direction: row;
                max-height: none;
                overflow-y: hidden;
            }
        }


        .message {
            margin-top: 10px;
            font-weight: bold;
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


        @media (min-width: 768px) {
            .container {
                margin-left: 350px;
                /* Sidebar के पास Perfect Position */
                max-width: 400px;
            }
        }

        @media (max-width: 767px) {
            .container {
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
        }

        .image-container {
            position: absolute;
            top: 30%;
            /* ऊपर से 30% gap */
            right: 120px;
            /* राइट से थोड़ा gap */
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .image-container img {
            width: 420px;
            /* इमेज को बड़ा किया */
            height: auto;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            cursor: pointer;
        }

        .image-container img:hover {
            transform: scale(1.1);
            box-shadow: 0px 6px 15px rgba(255, 255, 255, 0.3);
        }

        @media (max-width: 768px) {
            .image-container {
                right: 20px;
                top: 25%;
            }

            .image-container img {
                width: 180px;
                /* मोबाइल पर थोड़ा छोटा */
            }
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar for Desktop -->
            <div class="col-4 col-md-3 col-lg-2 sidebar d-none d-md-block">
                <a href="#"><i class="fa-solid fa-house"></i> Home</a>
                <a href="#" id="search-btn"><i class="fa-solid fa-magnifying-glass"></i> Search</a>
                <div class="search-popup" id="search-popup">
                    <span class="close-btn" id="close-btn">&times;</span>
                    <div class="search-title">Search Users</div>
                    <div class="search-box">
                        <i class="fa-solid fa-magnifying-glass"></i>
                        <input type="text" id="search-bar" placeholder="Search users...">
                    </div>
                    <div class="search-results" id="search-results"></div>
                </div>
                <a href="fetch_posts.php"><i class="fa-solid fa-clapperboard"></i> Reels And Posts</a>
                <a href="#"><i class="fa-solid fa-envelope"></i> Messages</a>
                <a href="notification.php"><i class="fa-solid fa-heart"></i> Notifications</a>
                <a href="#" id="openPopup">
                    <i class="fa-solid fa-plus-square"></i> Create Story
                </a>

                <!-- Popup Box -->
                <div class="popup-overlay" id="popup">
                    <div class="popup-box">
                        <h1>Upload Story</h1>
                        <form id="storyForm" enctype="multipart/form-data">
                            <input type="file" name="story_image" id="story_image" accept="image/*" required><br><br>
                            <button type="submit" class="submit-btn">Upload Story</button>
                        </form>
                        <div class="message"></div>
                        <hr>
                        <div class="">
                            <button class="close-btn" onclick="closePopup()">Close</button>
                        </div>
                    </div>
                </div>
                
                <a href="profile.php"><i class="fa-solid fa-user"></i> Profile</a>
                <a href="settings.php"><i class="fa-solid fa-gear"></i> Settings</a>
                <a href="#" id="createBtn"><i class="fa-solid fa-plus-square"></i> Create Post</a>
                <div class="overlay" id="overlay">
                    <div class="popup">
                        <span class="close-btn" id="closeBtn">&times;</span>
                        <h2>Create Post</h2>
                        <form id="postForm" enctype="multipart/form-data">
                            <input type="file" name="file" id="fileInput" accept="image/*,video/*" required>
                            <input type="text" name="location" id="location" placeholder="Location">
                            <textarea name="bio" id="bio" placeholder="Write something..." rows="3"></textarea>
                            <button type="submit" class="btnnn">Post</button>
                            <p class="success-message" id="successMessage">Post uploaded successfully!</p>
                        </form>
                    </div>
                </div>
                <a href="#"><i class="fa-solid fa-triangle-exclamation"></i> Report a Problem</a>
            </div>
        </div>
    </div>

    <div class="container mt-4" style="margin-left: 350px; color: white;">
        <h5 style="margin-top:40px;margin-bottom: 50px;">Recommended Users</h5>
        <div id="recommended-users"></div>
    </div>
    <div class="stories-container">
        <?php
        include 'db_config.php';
        include 'delete_stories.php';

        $query = "SELECT p.id AS user_id, p.username, p.profile_picture, 
    s.story_image, ppl.name
FROM profiles p 
JOIN stories s ON p.id = s.user_id  
JOIN peoples ppl ON p.id = ppl.id
WHERE s.created_at >= NOW() - INTERVAL 1 DAY 
ORDER BY s.created_at DESC";




        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="story-icon" onclick="openStory(\'' . $row['story_image'] . '\', \'' . $row['username'] . '\')">';
            echo '<div class="story-border">';
            echo '<img src="images/' . $row['profile_picture'] . '" alt="' . $row['username'] . '">';
            echo '</div>';
            echo '<p>' . $row['name'] . '</p>';
            echo '</div>';
        }
        ?>
    </div>


    <div class="story-popup" id="storyPopup">
        <div class="story-content">
            <span class="close-btn" onclick="closeStory()">&times;</span>
            <img id="storyImage" src="" alt="Story">
            <p id="storyUsername"></p>
        </div>
    </div>


    <div class="image-container">
        <img src="socio/socio.webp" alt="Image 1">
        <img src="socio/tushar.jpg" alt="Image 2">
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadUsers() {
                $.ajax({
                    url: "fetch_users.php",
                    type: "GET",
                    success: function(response) {
                        $("#recommended-users").html(response);
                    }
                });
            }

            loadUsers();

            $(document).on("click", ".follow-btn", function() {
                var userId = $(this).data("userid");
                var action = $(this).text().trim() === "Follow" ? "follow" : "unfollow";
                var button = $(this);

                $.ajax({
                    url: "follow_user.php",
                    type: "POST",
                    data: {
                        userId: userId,
                        action: action
                    },
                    success: function(response) {
                        if (response == "followed") {
                            button.text("Unfollow").removeClass("btn-primary").addClass("btn-danger");
                        } else if (response == "unfollowed") {
                            button.text("Follow").removeClass("btn-danger").addClass("btn-primary");
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.getElementById("openPopup").addEventListener("click", function(event) {
            event.preventDefault();
            document.getElementById("popup").style.display = "flex";
        });

        document.getElementById("closePopup").addEventListener("click", function() {
            document.getElementById("popup").style.display = "none";
        });


        window.addEventListener("click", function(event) {
            if (event.target.classList.contains("popup-overlay")) {
                document.getElementById("popup").style.display = "none";
            }
        });


        window.addEventListener("keydown", function(event) {
            if (event.key === "Escape") {
                document.getElementById("popup").style.display = "none";
            }
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


    <script>
        $(document).ready(function() {
            // Story Upload AJAX
            $("#storyForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);

                $.ajax({
                    url: "upload_story.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $(".message").html(response);
                        loadStories();
                    }
                });
            });


            function loadStories() {
                $.ajax({
                    url: "fetch_stories.php",
                    type: "GET",
                    success: function(data) {
                        $("#stories-container").html(data);
                    }
                });
            }

            loadStories();
        });


        $("#openPopup").click(function() {
            $("#popup").fadeIn();
        });

        function closePopup() {
            $("#popup").fadeOut();
        }
    </script>

    <script>
        function openStory(image, username) {
            document.getElementById("storyImage").src = "stories/" + image;
            document.getElementById("storyUsername").innerText = username;
            document.getElementById("storyPopup").style.display = "flex";
        }

        function closeStory() {
            document.getElementById("storyPopup").style.display = "none";
        }
    </script>
    <script>
        $(document).ready(function() {
            $("#search-btn").click(function(e) {
                e.preventDefault();
                $("#search-popup").fadeIn();
            });
            $("#close-btn").click(function() {
                $("#search-popup").fadeOut();
            });
            $("#search-bar").on("input", function() {
                let query = $(this).val();
                if (query.length > 1) {
                    $.ajax({
                        url: "search.php",
                        method: "POST",
                        data: {
                            query: query
                        },
                        success: function(data) {
                            $("#search-results").html(data);
                        }
                    });
                } else {
                    $("#search-results").html("");
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#createBtn").click(function() {
                $("#overlay").fadeIn();
            });
            $("#closeBtn").click(function() {
                $("#overlay").fadeOut();
            });

            $("#postForm").submit(function(e) {
                e.preventDefault();
                var formData = new FormData(this);
                $.ajax({
                    url: "upload_post.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.trim() === "success") {
                            $("#successMessage").fadeIn().delay(2000).fadeOut();
                            $("#overlay").fadeOut();
                            $("#postForm")[0].reset();
                            loadPosts();
                        } else {
                            alert("Error uploading post!");
                        }
                    }
                });
            });

            function loadPosts() {
                $.ajax({
                    url: "fetch_posts.php",
                    type: "GET",
                    success: function(data) {
                        $("#postsContainer").html(data);
                    }
                });
            }
            loadPosts();
        });
    </script>

    <script>
        $(document).on("click", ".like-btn", function() {
            var post_id = $(this).data("post-id");
            var button = $(this);

            $.post("like.php", {
                post_id: post_id
            }, function(response) {
                if (response === "liked") {
                    button.text("Unlike");
                } else if (response === "unliked") {
                    button.text("Like");
                }
            });
        });

        $(document).on("submit", ".comment-form", function(e) {
            e.preventDefault();
            var form = $(this);
            var post_id = form.data("post-id");
            var comment = form.find("input[name='comment']").val();

            $.post("comment.php", {
                post_id: post_id,
                comment: comment
            }, function(response) {
                if (response === "comment_added") {
                    form.find("input[name='comment']").val(""); // Clear input field
                    alert("Comment added successfully!");
                } else if (response === "empty_comment") {
                    alert("Comment cannot be empty!");
                } else {
                    alert("Error adding comment!");
                }
            });
        });
    </script>

    <div class="bottom-nav d-md-none">
        <a href="#"><i class="fa-solid fa-house"></i></a>
        <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>
        <a href="#"><i class="fa-solid fa-clapperboard"></i></a>
        <a href="#"><i class="fa-solid fa-envelope"></i></a>
        <a href="#"><i class="fa-solid fa-user"></i></a>
    </div>

</body>

</html>