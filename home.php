<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Home</title>
</head>
<body>
    <div class="wrapper">
        <div class="top-nav">
            <div class="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="">Explore</a></li>
                    <li><a href="">Notifications</a></li>
                </ul>
                <div class="user-cont" onclick="dropDown()">
                    <div class="user-img">
                        <img src="img/user.svg" alt="user image">
                    </div>
                    <i class="fas fa-chevron-down"></i>
                </div>
            </div>
            <div class="user-options">
                <ul>
                    <li><a href="">Profile</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="backend/logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="find-event">
            <div class="text">
                <h1>Find your next event</h1>
                <p>Get ready to turn up.</p>
            </div>
        </div>
        <div class="search">
            <input type="text" name="searchBar" id="searchBar" placeholder="Search">
            <i class="fas fa-search"></i>
            <p>events around your town</p>
        </div>
    </div>

    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>