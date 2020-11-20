<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/post_event.css">
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Post Event</title>
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
                    <li><i class="fas fa-user"></i><a href="profile.php">Profile</a></li>
                    <li><i class="fas fa-coins"></i><a href="payments.html">Payments Made</a></li>
                    <li><i class="fas fa-sign-out-alt"></i><a href="backend/logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="info-table_cont">
            <div class="info-table">
            <?php  include("backend/alert.php");?>
            <?php 
                    
                if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                }
            ?>
                <form action="backend/post_event.php" method="POST" enctype="multipart/form-data">
                    <div class="poster-cont">
                        <label for="posterImg">Add event poster</label><br>
                        <img src="img/placeholder-image.png " alt="poster_image" id="posterDisplay" onclick="setPoster()">
                        <input type="file" name="posterImg" id="posterImg" onchange="displayPoster(this)">
                    </div>
                    <div class="date-cont">
                        <label for="date">Date of the event</label><br>
                        <input type="date" name="date" class="date" required>
                    </div>
                    <div class="location-cont">
                        <label for="location">Location of the event</label><br>
                        <input type="text" name="location" class="location" required>
                    </div>
                    <div class="description-cont">
                        <label for="description">Give a small description</label><br>
                        <textarea name="description" class="description" cols="30" rows="10" placeholder="Write Something..." required></textarea>
                    </div>
                    <button type="submit" class="postEvtBtn" name="postEvtBtn">Post</button>
                </form>
            </div>
        </div>
    </div>

     <!-- footer -->
     <footer class="footer">
        <p>&copy; <script>document.write(new Date().getFullYear())</script> Mvumo</p>
    </footer>

    <!-- js files -->
    <script src="js/app.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>