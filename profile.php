<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profile.css">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <div class="top-section">
            <div class="header">
                <img src="[Profile Picture URL]" alt="Profile Picture">
                <h1>Welcome User</h1>
                <div class="counts">   
                    <div class="count">Followers: [Count]</div>
                    <div class="count">Following: [Count]</div>
                </div>
            </div>
        </div>
        <div class="bottom-section">
            <div class="bio">
                <p>About me: </p>
            </div>
            <div class="actions">
                <div class="dropdowns">
                    <div class="dropdown">
                        <button class="dropbtn">Settings</button>
                        <div class="dropdown-content">
                            <a href="#">Change Password</a>
                            <a href="#">Verification</a>
                            <a href="#">Sign Out</a>
                            <a href="#">Delete Account</a>
                        </div>
                    </div>
                </div>
                <div class="dropdowns">
                    <div class="dropdown">
                        <button class="dropbtn">Edit Profile</button>
                        <div class="dropdown-content">
                            <a href="#">Bio</a>
                            <a href="#">Username</a>
                            <a href="#">Profile Picture</a>
                            <a href="#">Privacy</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="posts-tags-container">
        <button id="toggleButton" onclick="togglePosts()">Tagged Posts</button>
    </div>
    <div class="posts-container" id="postsContainer">
        <h2>Your Posts</h2>
        <p>posts</p>
    </div>
    <div class="tagged-posts-container" id="taggedPostsContainer" style="display: none;">
        <h2>Your Tagged Posts</h2>
        <p>tagged posts</p>
    </div>
    <script>
        function togglePosts() {
        var postsContainer = document.getElementById("postsContainer");
        var taggedPostsContainer = document.getElementById("taggedPostsContainer");
        var toggleButton = document.getElementById("toggleButton");
        if (postsContainer.style.display === "none") {
            postsContainer.style.display = "block";
            taggedPostsContainer.style.display = "none";
            toggleButton.textContent = "Tagged Posts";
        } else {
            postsContainer.style.display = "none";
            taggedPostsContainer.style.display = "block";
            toggleButton.textContent = "Posts";
        }
        
        
    }
    </script>
</body>
</html>
