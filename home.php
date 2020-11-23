
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
            <form action="home.php" method="POST">
                <input type="text" name="searchBar" id="searchBar" placeholder="Search">
                <button type="submit" id="searchBtn" name="searchBtn"></button>
            </form>
            <i class="fas fa-search" onclick="searchIcon()"></i>
            <p>events around your town</p>
        </div>

            <?php

                include('backend/db_connection.php');

                // php that displays the cards 
                $event = mysqli_query($connection, "SELECT `image`, `date`, `location`, `description` FROM `event`");

                echo "<div class='card-deck'>";
                echo "<div class='row default-row'>";
                    while ($row = mysqli_fetch_array($event)) {
                    
                        echo "<div class='card'>";
                            echo "<img src='uploaded_posters/".$row['image']."' >";
                            echo "<p class='card_date'>".date("d-m-Y",strtotime($row['date']))."</p>";
                            echo "<p class='card_location'>".$row['location']."</p>";
                            echo "<p class='card_desc'>".$row['description']."</p>";
                        echo "</div>";
                    
                    }
                echo "</div>";    
                echo "</div>";  
                
                // php to display search results
                if(isset($_POST['searchBtn'])){
        
                    $user_search = $_POST['searchBar'];
                    $search = mysqli_real_escape_string($connection, $user_search);

                    $search_query = "SELECT * FROM `event` WHERE `date` LIKE '%$user_search%' OR `location` LIKE '%$user_search%'
                                     OR `description` LIKE '%$user_search%'";
                    $exec = mysqli_query($connection, $search_query);
                    
                    $num_rows = mysqli_num_rows($exec);

                    if($num_rows > 0){
                        echo "<script type='text/javascript'>
                        document.querySelector('.default-row').style.display='none';
                        </script>";
                        echo "<div class='card-deck'>";
                        echo "<h1 class='results_heading' style='margin-top: -2em;'>Search Results</h1>";
                        echo "</br>";
                        echo "<div class='row'>";
                            while ($row = mysqli_fetch_array($exec)) {
                                echo "<div class='card'>";
                                    echo "<img src='uploaded_posters/".$row['image']."' >";
                                    echo "<p class='card_date'>".date("d-m-Y",strtotime($row['date']))."</p>";
                                    echo "<p class='card_location'>".$row['location']."</p>";
                                    echo "<p class='card_desc'>".$row['description']."</p>";
                                echo "</div>";
                            
                            }
                        echo "</div>";    
                        echo "</div>"; 
                    }
                    else{
                        echo "<script type='text/javascript'>
                        document.querySelector('.default-row').style.display='none';
                        </script>";
                        echo "<h1 style='text-align: center;'>No result found</h1>";
                        echo "<img src='img/not_found.svg' style='height: 400px; 
                               margin-left: 30em;'/>";
                    }
                }
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