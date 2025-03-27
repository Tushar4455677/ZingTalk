<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stylish Navbar</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="style.css">

</head>

<body style="background: #dee8f5;">
    <!-- navbar section -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex me-auto">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><img src="assets/icons8-search-50.png" alt=""
                                    style="height: 20px;"></span>
                        </div>
                        <input class="form-control me-2 mr-5" type="search" placeholder="Search" aria-label="Search">
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-5" href="#" id="demoDropdown" role="button">
                            Demo
                        </a>
                        <div class="dropdown-menu" aria-labelledby="demoDropdown">
                            <a class="dropdown-item" href="#">Home Default</a>
                            <a class="dropdown-item" href="#">Home classic</a>
                            <a class="dropdown-item" href="#">Home Post</a>
                            <a class="dropdown-item" href="#">Home video</a>
                            <a class="dropdown-item" href="#">Home Event</a>
                            <a class="dropdown-item" href="#">Landing Page</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-5" href="#" id="demoDropdown" role="button">
                            Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="demoDropdown">
                            <a class="dropdown-item" href="#">Album</a>
                            <a class="dropdown-item" href="#">celebration</a>
                            <a class="dropdown-item" href="#">Messaging</a>
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Group</a>
                            <a class="dropdown-item" href="#">Group video</a>
                            <a class="dropdown-item" href="#">Post</a>
                            <a class="dropdown-item" href="#">Post Videos and Reels</a>
                            <a class="dropdown-item" href="#">Blog Details</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mr-5" href="#" id="demoDropdown" role="button">
                            Account
                        </a>
                        <div class="dropdown-menu" aria-labelledby="demoDropdown">
                            <a class="dropdown-item" href="#">Create a Page</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">Notifications</a>
                            <a class="dropdown-item" href="#">Help Center</a>
                            <a class="dropdown-item" href="#">Create Account</a>
                            <a class="dropdown-item" href="#">Forgot Password</a>
                            <a class="dropdown-item" href="#">Offline</a>
                            <a class="dropdown-item" href="#">Error 404</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mr-5" href="#" id="demoDropdown" role="button">
                            MyNetwork
                        </a>
                    </li>
                    <div class="navbar-icons">
                        <img src="assets/icons8-message-48.png" alt="Message" class="mr-3 messaging-icon">
                        <div class="messaging-popup">
                            <div class="messaging-header">
                                <h5>Messaging</h5>
                                <button id="close-popup">&times;</button>
                            </div>
                            <div class="messaging-search">
                                <input type="text" placeholder="Search messages...">
                            </div>
                            <div class="message-list">
                                <!-- Example Message -->
                                <div class="message-item">
                                    <img src="assets/dipendar.jpg" alt="Profile" style="border: 3px solid blue;">
                                    <div class="message-details">
                                        <h6>John Doe</h6>
                                        <p>Hey! How are you?</p>
                                    </div>
                                    <span class="message-time">2 min ago</span>
                                </div>
                                <!-- More Messages -->
                                <div class="message-item">
                                    <img src="assets/human1.jpg" alt="Profile">
                                    <div class="message-details">
                                        <h6>Jane Smith</h6>
                                        <p>Can we meet tomorrow?</p>
                                    </div>
                                    <span class="message-time">5 min ago</span>
                                </div>
                                <div class="message-item">
                                    <img src="assets/human2.jpg" alt="Profile" style="border: 3px solid blue;">
                                    <div class="message-details">
                                        <h6>Jane Smith</h6>
                                        <p>Can we meet tomorrow?</p>
                                    </div>
                                    <span class="message-time">5 min ago</span>
                                </div>
                                <div class="message-item">
                                    <img src="assets/human3.jpg" alt="Profile">
                                    <div class="message-details">
                                        <h6>Jane Smith</h6>
                                        <p>Can we meet tomorrow?</p>
                                    </div>
                                    <span class="message-time">5 min ago</span>
                                </div>
                                <div class="message-item">
                                    <img src="assets/human4.jpg" alt="Profile" style="border: 3px solid blue;">
                                    <div class="message-details">
                                        <h6>Jane Smith</h6>
                                        <p>Can we meet tomorrow?</p>
                                    </div>
                                    <span class="message-time">5 min ago</span>
                                </div>
                                <div class="message-item">
                                    <img src="assets/human5.jpg" alt="Profile" style="border: 3px solid blue;">
                                    <div class="message-details">
                                        <h6>Jane Smith</h6>
                                        <p>Can we meet tomorrow?</p>
                                    </div>
                                    <span class="message-time">5 min ago</span>
                                </div>
                            </div>
                        </div>
                        <img src="assets/icons8-notification-50.png" alt="Notification" class=" mr-3 notification-icon">
                        <div class="notification-popup">
                            <div class="header">
                                Notifications
                                <button class="close-btn">&times;</button>
                            </div>
                            <div class="notification-list">
                                <!-- Notification Item -->
                                <div class="notification-item">
                                    <img src="assets/human3.jpg" alt="User Image">
                                    <div class="content">
                                        <h5>John Doe liked your post</h5>
                                        <p>2 hours ago</p>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <img src="assets/human2.jpg" alt="User Image" style="border: 3px solid  blue;">
                                    <div class="content">
                                        <h5>Jane Smith sent you a friend request</h5>
                                        <p>1 day ago</p>
                                        <a class="btn btn-danger" href="#">Confirm</a>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <img src="assets/human1.jpg" alt="User Image">
                                    <div class="content">
                                        <h5>Mike Brown commented on your photo</h5>
                                        <p>3 days ago</p>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <img src="assets/human3.jpg" alt="User Image">
                                    <div class="content">
                                        <h5>Wish Yash Shrivasta a Happy birthday (12 Nov)</h5>
                                        <p>3 days ago</p>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <img src="assets/human1.jpg" alt="User Image">
                                    <div class="content">
                                        <h5>Vishwakarma has 15 likes and 1 New Comment</h5>
                                        <p>3 days ago</p>
                                    </div>
                                </div>
                                <!-- Add more notification items as needed -->
                            </div>
                        </div>
                        <img src="assets/icons8-settings-50.png" alt="Settings" class="mr-3">
                        <img src="assets/icons8-user-100.png" alt="Settings" class="mr-3 user-icon"
                            style="height:40px;width:40px;">
                        <div class="profile-popup">
                            <div class="header">
                                <h5>John Doe</h5>
                                <p class="text-muted">john.doe@example.com</p>-
                            </div>
                            <div class="menu-item">View Profile</div>
                            <div class="menu-item">Settings & Privacy</div>
                            <div class="menu-item" id="redirectDiv">Make your Account & Profile</div>
                            <a href="#" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#signupModal">
    <i class="fa-solid fa-user-plus"></i> Signup
</a>

<a href="#" class="btn btn-outline-success ms-2" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa-solid fa-sign-in-alt"></i> Login</a>

                            <div class="menu-item">Edit Profile</div>
                            <div class="menu-item text-danger">Sign Out</div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>
    <div class="modal fade" id="signupModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Signup</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="signupMsg"></div> <!-- Error/Success Messages Will Appear Here -->
                <input type="text" id="name" class="form-control mb-3" placeholder="Name">
                <input type="email" id="email" class="form-control mb-3" placeholder="Email">
                <input type="password" id="password" class="form-control mb-3" placeholder="Password">
            </div>
            <div class="modal-footer">
                <button id="signupBtn" class="btn btn-primary">Signup</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="loginModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="loginMsg"></div> <!-- Error/Success Messages Will Appear Here -->
                <input type="email" id="loginEmail" class="form-control mb-3" placeholder="Email">
                <input type="password" id="loginPassword" class="form-control mb-3" placeholder="Password">
            </div>
            <div class="modal-footer">
                <button id="loginBtn" class="btn btn-success">Login</button>
            </div>
        </div>
    </div>
</div>
    
    <!-- navbar section end -->

    <!-- profile section -->
    <div class="section" style="height: 900px;">
        <div class="container-fluid mt-4">
            <div class="row">
                <div class="col-md-3 col-sm-12">
                    <div class="card profile-card">
                        <div class="cover-photo"></div>
                        <div class="profile-info">
                            <img src="assets/dipendar.jpg" alt="Profile" class="profile-photo"
                                style="border: 3px solid  blue;">
                            <h5>Dipendra Chaturvedi</h5>
                            <h6 class="mt-3">Web developer</h6>
                            <p class="mt-3 ml-3 mr-3">I'd love to change the world, but they won’t give me the source
                                code.</p>
                        </div>
                        <div class="stats">
                            <div>
                                <h6>Posts</h6>
                                <p>89</p>
                            </div>

                            <div>
                                <h6>Following</h6>
                                <p>567</p>
                            </div>
                            <div>
                                <h6>Followers</h6>
                                <p>1,234</p>
                            </div>
                        </div>

                        <ul class="menu">
                            <li> <i class="bi bi-house-door" style="color: blueviolet;margin-right: 30px;"></i><a
                                    href="#">Feed</a></li>
                            <li><i class="bi bi-people" style="color: aqua;"></i><a href="#"> Connections</a></li>
                            <li><i class="bi bi-globe" style="color: green;"></i><a href="#"> Latest News</a></li>
                            <li><i class="bi bi-calendar" style="color: red;"></i><a href="#">Events</a></li>
                            <li><i class="bi bi-people" style="color: red;"> </i> <a href="#"> Groups</a></li>
                            <li><i class="bi bi-bell" style="color:yellowgreen"></i><a href="#"> Notifications</a></li>
                            <li><i class="bi bi-gear" style="color: purple;"></i><a href="#"> Settings</a></li>
                            <li><a href="#" class="text-primary fw-bold ml-5">View Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="stories-container">
                        <!-- Post a Story -->
                        <div class="story">
                            <div class="add-icon"><i class="bi bi-plus-circle-fill"></i></div>
                            <div class="title">Post a Story</div>
                        </div>

                        <!-- Other Stories -->
                        <div class="story">
                            <img src="assets/human1.jpg" alt="Story 1" style="border: 3px solid  blue;">
                            <div class="title">John's Story</div>
                        </div>

                        <div class="story">
                            <img src="assets/human2.jpg" alt="Story 2" style="border: 3px solid  blue;">
                            <div class="title">Sarah's Story</div>
                        </div>

                        <div class="story">
                            <img src="assets/human3.jpg" alt="Story 3" style="border: 3px solid  blue;">
                            <div class="title">Mike's Story</div>
                        </div>

                        <div class="story">
                            <img src="assets/human4.jpg" alt="Story 4" style="border: 3px solid  blue;">
                            <div class="title">Emma's Story</div>
                        </div>
                        <div class="story">
                            <img src="assets/human5.jpg" alt="Story 4" style="border: 3px solid  blue;">
                            <div class="title">Emma's Story</div>
                        </div>
                    </div><br>

                    <div class="share-thoughts-container mt-4">
                        <!-- Header: Profile Picture and Input -->
                        <div class="share-header">
                            <img src="assets/dipendar.jpg" alt="Profile Picture" class="profile-pic"
                                style="border: 3px solid  blue;">
                            <div class="share-input">
                                <input type="text" placeholder="Share your thoughts...">
                            </div>
                        </div>

                        <!-- Buttons: Photo, Video, Event, Feeling -->
                        <div class="share-buttons">
                            <div class="share-button">
                                <i class="bi bi-image" style="color: aqua;"></i>
                                <span>Photo</span>
                            </div>
                            <div class="share-button">
                                <i class="bi bi-camera-video" style="color: blue;"></i>
                                <span>Video</span>
                            </div>
                            <div class="share-button">
                                <i class="bi bi-calendar-event" style="color: red;"></i>
                                <span>Event</span>
                            </div>
                            <div class="share-button">
                                <i class="bi bi-emoji-smile" style="color: yellowgreen;"></i>
                                <span>Feeling</span>
                            </div>
                        </div>
                    </div>
                    <div class="post-container">
                        <!-- Post Header: Profile Picture and User Info -->
                        <div class="post-header">
                            <img src="assets/dipendar.jpg" alt="Profile Picture" class="profile-pic"
                                style="border: 3px solid  blue;">
                            <div class="user-details">
                                <div class="user-name">Dipendar Chaturvedi</div>
                                <div class="place-name">New York, USA</div>
                            </div>
                        </div>

                        <!-- Post Image -->
                        <div class="post-image">
                            <img src="assets/profile.jpg" alt="Post Image" style="border: 1px solid  blue;">
                        </div>

                        <!-- Post Caption -->
                        <div class="post-caption">
                            <p>Had a great time at the park! #goodvibes #nature</p>
                        </div>

                        <!-- Comments Section -->
                        <div class="comments-section">
                            <!-- Comment 1 -->
                            <div class="comment">
                                <img src="assets/human2.jpg" alt="Commenter Profile" class="comment-profile-pic"
                                    style="border: 3px solid  blue;">
                                <div class="comment-text">
                                    <span class="comment-author">Sarah</span>Great picture! Looks like a fun day out.
                                </div>
                            </div>

                            <!-- Comment 2 -->
                            <div class="comment">
                                <img src="assets/human3.jpg" alt="Commenter Profile" class="comment-profile-pic"
                                    style="border: 3px solid  blue;">
                                <div class="comment-text">
                                    <span class="comment-author">Mike</span>Wow, this is beautiful! Nature at its best.
                                </div>
                            </div>

                            <!-- Comment 3 -->
                            <div class="comment">
                                <img src="assets/human5.jpg" alt="Commenter Profile" class="comment-profile-pic"
                                    style="border: 3px solid  blue;">
                                <div class="comment-text">
                                    <span class="comment-author">Emily</span>Looks like an amazing day!
                                </div>
                            </div>
                        </div>

                        <!-- Like and Comment Buttons -->
                        <div class="comment-actions">
                            <div class="like-comment-btn">
                                <i class="bi bi-heart" style="color: red;"></i> Like
                                <i class="bi bi-chat-dots"></i> Comment
                            </div>
                        </div>
                    </div>
                    <div class="main">
                        <!-- People You May Know Header -->
                        <div class="section-header">
                            <h2>People You May Know</h2>
                            <a href="#" class="see-all-btn ">See All</a>
                        </div>

                        <!-- People You May Know Cards -->
                        <div class="people-list">
                            <!-- Person 1 -->
                            <div class="person-card">
                                <img src="assets/human1.jpg" alt="Profile Picture" style="border: 3px solid  blue;">
                                <div class="person-name">John Doe</div>
                                <button class="follow-btn">Follow</button>
                            </div>

                            <!-- Person 2 -->
                            <div class="person-card">
                                <img src="assets/human2.jpg" alt="Profile Picture" style="border: 3px solid  blue;">
                                <div class="person-name">Sarah Smith</div>
                                <button class="follow-btn">Follow</button>
                            </div>

                            <!-- Person 3 -->
                            <div class="person-card">
                                <img src="assets/human3.jpg" alt="Profile Picture" style="border: 3px solid  blue;">
                                <div class="person-name">Emily Davis</div>
                                <button class="follow-btn">Follow</button>
                            </div>

                            <!-- Person 4 -->
                            <div class="person-card">
                                <img src="assets/human3.jpg" alt="Profile Picture" style="border: 3px solid  blue;">
                                <div class="person-name">Mike Johnson</div>
                                <button class="follow-btn">Follow</button>
                            </div>

                            <!-- Person 5 -->
                            <div class="person-card">
                                <img src="assets/human4.jpg" alt="Profile Picture" style="border: 4px solid  blue;">
                                <div class="person-name">Anna White</div>
                                <button class="follow-btn">Follow</button>
                            </div>

                            <!-- Person 6 -->
                            <div class="person-card">
                                <img src="assets/human5.jpg" alt="Profile Picture" style="border: 3px solid  blue;">
                                <div class="person-name">Tom Hardy</div>
                                <button class="follow-btn">Follow</button>
                            </div>
                        </div>
                    </div>
                    <div class="quiz-container">
                        <!-- Header Section -->
                        <div class="quiz-header">
                            <img src="assets/dipendar.jpg" alt="User Profile" style="border: 3px solid  blue;">
                            <div class="user-info">
                                <div class="name">Dipendar Chaturvedi</div>
                                <div class="details">Mumbai · 2 hours ago</div>
                            </div>
                        </div>

                        <!-- Question Section -->
                        <div class="quiz-question">
                            How do you protect your business against cyber crime?
                        </div>

                        <!-- Options Section -->
                        <div class="quiz-options">
                            <button>1. Install antivirus software</button>
                            <button>2. Train employees on cybersecurity</button>
                            <button>3. Use strong passwords</button>
                            <button>4. Regularly update systems</button>
                        </div>

                        <!-- Footer Section -->
                        <div class="quiz-footer">
                            <div>💖 120 Likes</div>
                            <div class="actions">
                                <i class="bi bi-share"> Share</i>
                                <i class="bi bi-send"> Send</i>
                            </div>
                        </div>

                        <!-- Comments Section -->
                        <div class="quiz-comments">
                            <div class="comment">
                                <img src="assets/human1.jpg" alt="User Comment" style="border: 3px solid  blue;">
                                <div class="comment-body">
                                    <div class="name">Alice</div>
                                    I think training employees is the most important.
                                </div>
                            </div>

                            <div class="comment">
                                <img src="assets/human2.jpg" alt="User Comment" style="border: 3px solid  blue;">
                                <div class="comment-body">
                                    <div class="name">Bob</div>
                                    Strong passwords are essential for every business!
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="news-container">
                        <!-- Header Section -->
                        <div class="news-header">
                            Latest Top News: Global Economy on the Rise
                            <span>Source: BBC News · 3 hours ago</span>
                        </div>

                        <!-- Image Section -->
                        <div class="news-image" style="background-image: url('assets/news.jpg');">
                        </div>

                        <!-- Description Section -->
                        <div class="news-description">
                            <p>The global economy has shown significant signs of recovery, with many countries reporting
                                improved GDP growth. Experts suggest that the rise in consumer demand and increased
                                international trade are key factors driving this growth.</p>
                            <p>However, inflation concerns still linger as central banks balance economic stimulation
                                with price stability.</p>
                        </div>

                        <!-- Footer Section -->
                        <div class="news-footer">
                            <div class="actions">
                                <button><i class="bi bi-bookmark"></i> Bookmark</button>
                                <button><i class="bi bi-share"></i> Share</button>
                                <button><i class="bi bi-box-arrow-up-right"></i> Read More</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="who-to-follow">
                        <h3>Who to Follow</h3>
                        <div class="profile-list">

                            <!-- Profile 1 -->
                            <div class="profile-card1">
                                <img src="assets/human1.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="profile-info">
                                    <h4>John Doe</h4>
                                    <p>@johndoe</p>
                                </div>
                                <button class="follow-btn">Add Friend</button>
                            </div>

                            <!-- Profile 2 -->
                            <div class="profile-card1">
                                <img src="assets/human2.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="profile-info">
                                    <h4>Jane Smith</h4>
                                    <p>@janesmith</p>
                                </div>
                                <button class="follow-btn">Add Friend</button>
                            </div>

                            <!-- Profile 3 -->
                            <div class="profile-card1">
                                <img src="assets/human3.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="profile-info">
                                    <h4>Mike Brown</h4>
                                    <p>@mikebrown</p>
                                </div>
                                <button class="follow-btn">Add Friend</button>
                            </div>

                            <!-- Profile 4 -->
                            <div class="profile-card1">
                                <img src="assets/human4.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="profile-info">
                                    <h4>Sara Lee</h4>
                                    <p>@saralee</p>
                                </div>
                                <button class="follow-btn">Add Friend</button>
                            </div>

                        </div>

                        <!-- View More Button -->
                        <div class="view-more">
                            <button>View More</button>
                        </div>
                    </div>
                    <div class="follow-requests">
                        <h3>Follow Requests</h3>
                        <div class="request-list">

                            <!-- Request 1 -->
                            <div class="request-card">
                                <img src="assets/human1.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="request-info">
                                    <h4>John Doe</h4>
                                    <p>@johndoe</p>
                                </div>
                                <div class="action-buttons">
                                    <button class="confirm-btn">Confirm</button>
                                    <button class="delete-btn">Delete</button>
                                </div>
                            </div>

                            <!-- Request 2 -->
                            <div class="request-card">
                                <img src="assets/human2.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="request-info">
                                    <h4>Jane Smith</h4>
                                    <p>@janesmith</p>
                                </div>
                                <div class="action-buttons">
                                    <button class="confirm-btn">Confirm</button>
                                    <button class="delete-btn">Delete</button>
                                </div>
                            </div>

                            <!-- Request 3 -->
                            <div class="request-card">
                                <img src="assets/human3.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="request-info">
                                    <h4>Mike Brown</h4>
                                    <p>@mikebrown</p>
                                </div>
                                <div class="action-buttons">
                                    <button class="confirm-btn">Confirm</button>
                                    <button class="delete-btn">Delete</button>
                                </div>
                            </div>
                            <div class="request-card">
                                <img src="assets/human5.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="request-info">
                                    <h4>Mike Brown</h4>
                                    <p>@mikebrown</p>
                                </div>
                                <div class="action-buttons">
                                    <button class="confirm-btn">Confirm</button>
                                    <button class="delete-btn">Delete</button>
                                </div>
                            </div>
                            <div class="request-card">
                                <img src="assets/human4.jpg" alt="User Photo" style="border: 3px solid  blue;">
                                <div class="request-info">
                                    <h4>Mike Brown</h4>
                                    <p>@mikebrown</p>
                                </div>
                                <div class="action-buttons">
                                    <button class="confirm-btn">Confirm</button>
                                    <button class="delete-btn">Delete</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- profile section end -->
    <!-- footer start  -->
    <footer class="footer container-fluid" style="margin-top: 2000px;">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <!-- Left Column: Links -->
                <div
                    class="col-12 col-md-8 d-flex flex-wrap justify-content-center justify-content-md-start mb-3 mb-md-0">
                    <a href="#">About</a>
                    <a href="#">Settings</a>
                    <a href="#">Support</a>
                    <a href="#">Docs</a>
                    <a href="#">Help</a>
                    <a href="#">Privacy & Terms</a>
                </div>
                <!-- Right Column: Copyright -->
                <div class="col-12 col-md-4 text-center text-md-end">
                    <p>© Social Media 2025 | All rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    

    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $("#signupBtn").click(function () {
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
            url: "signup.php",
            type: "POST",
            data: { name: name, email: email, password: password },
            success: function (response) {
                $("#signupMsg").html(response);  // Show message inside modal
                setTimeout(function () { $(".alert").fadeOut(); }, 3000);
                if (response.includes("success")) {
                    setTimeout(function () { window.location.href = "profileComplete.html"; }, 2000); // Redirect
                } // Hide message after 3 sec
            }
        });
    });
});
</script>
<script>
$(document).ready(function () {
    $("#loginBtn").click(function () {
        var email = $("#loginEmail").val();
        var password = $("#loginPassword").val();

        $.ajax({
            url: "login.php",
            type: "POST",
            data: { email: email, password: password },
            success: function (response) {
                $("#loginMsg").html(response);  // Show message inside modal
                setTimeout(function () { $(".alert").fadeOut(); }, 3000); // Hide message after 3 sec

                if (response.includes("success")) {
                    setTimeout(function () { window.location.href = "mainPage.php"; }, 2000); // Redirect
                }
            }
        });
    });
});
</script>
</body>

</html>