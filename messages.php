<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <link rel="stylesheet" href="./messages.css">
    <script defer src="./messages.js"></script>
</head>
<body>
    <header>
         <!-- Navigation bar -->
        <nav>
            <div class="logo">VisualVibe</div>
            <div class="search-bar">
                <input type="text" placeholder="Search">
            </div>
            <!-- Other navigation links -->
            <ul class="nav-links">
		<li><a href="./explore.html">Home</a></li>
		<li><a href="./settings.html">Settings</a></li>	
		<li><a href="./post.html">New Post</a></li>		
                <li><a href="./messages.html">Messages</a></li>
                <li><a href="./profile.html">Profile</a></li>
            </ul>
    </header>
    <div class="container">
        <aside class="sidebar">
            <!-- User List -->
            <ul class="user-list">
                <li class="user">Karla</li>
                <li class="user">Brookside Boyz</li>
                <li class="user">Michael</li>
                <li class="user">Edith</li>
                <li class="user">Jacub Bill</li>
                <li class="user">Lucas Martinez</li>
                <li class="user">Gangy</li>
                <li class="user">Titus</li>
                <li class="user">jj</li>
            </ul>
        </aside>
        <section class="chat-area">
            <!-- Chat display -->
            <div class="chat-display" id="chatDisplay"></div>
            <!-- Message input -->
            <div class="message-input">
                <input type="text" id="messageInput" placeholder="Send a message" onkeypress="handleEnterPress(event)">
                <button type="button">Send</button>
            </div>
        </section>
    </div>
</body>
</html>

