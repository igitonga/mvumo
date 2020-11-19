
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
                <div class="post_event">
                   <p><a href="post_event.php">POST EVENT</a></p>
                </div>
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

    <?php
        include('backend/db_connection.php');

        $event = mysqli_query($connection, "SELECT `image`, `date`, `location`, `description` FROM `event`");

        echo "<div class='card-deck'>";
         echo "<div class='row'>";
            while ($row = mysqli_fetch_array($event)) {
            
                echo "<div class='card'>";
                    echo "<img src='uploaded_posters/".$row['image']."' >";
                    echo "<p>".$row['date']."</p>";
                    echo "<p>".$row['location']."</p>";
                    echo "<p>".$row['description']."</p>";
                echo "</div>";
            
            }
         echo "</div>";    
        echo "</div>";    
  ?>
    </div>

    <!-- footer -->
    <footer class="footer">
        <p>&copy; <script>document.write(new Date().getFullYear())</script> Mvumo</p>
    </footer>

    <!-- js files -->
    <script type="text/javascript" src="js/app.js"></script>
</body>
</html>