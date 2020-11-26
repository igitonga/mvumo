<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo - Time to turn up</title>
</head>
<body>
    <!-- body container -->
    <div class="wrapper">
        <div class="top-navbar">
            <!-- application logo -->
            <div class="logo">
                <img src="img/logo.png" alt="logo">
            </div>
            <!-- top nav links -->
            <div class="nav-links">
               <ul>
                   <li><a href="login.php">Login</a></li>
                   <li><a href="signup.php">Sign Up</a></li>
               </ul>
            </div>
        </div>
        <div class="intro_section">
            <div class="intro_section-words">
                <p>Get to know about your favourite event.</p>
                <a class="join" href="login.php">Join Mvumo</a>
            </div>
            <div class="intro_section-image">
                <img src="img/event_head.svg" alt="animated image">
            </div>
        </div>
        <!-- search panel for events -->
        <div class="search-section">
            <form action="index.php" method="POST">
                <div class="search-section_2">
                    <input type="text" name="eventName" id="eventName" placeholder="Search by event name / location">
                    <input type="submit" name="btnSearch" id="btnSearch" value="Search" >
                </div>
            </form>    
        </div>

        <!-- php to display events searched -->
        <?php 
        
        if(isset($_POST['btnSearch'])){
            
            include('backend/db_connection.php');

            // when the user is using 'find event' field
            $user_search_1 = $_POST['eventName'];

            // pop up if the field is empty
            if($user_search_1 == ''){
                echo "<script type=text/javascript>alert('Search fields are empty');</script>";
            }
            else{
            $search_1 = mysqli_real_escape_string($connection, $user_search_1);

            $search_query_1 = "SELECT * FROM `event` WHERE `category` LIKE '%$user_search_1%' OR `description` LIKE '%$$user_search_1%'
                               OR `location` LIKE '%$user_search_1%'";
            $exec_1 = mysqli_query($connection, $search_query_1);
            
            $num_rows_1 = mysqli_num_rows($exec_1);

            if($num_rows_1 > 0){
                echo "<div class='card-deck' id='card-deck'>";
                echo "<h2 class='results_heading' style='margin-top: -1em;'>Search Results</h2>";
                echo "</br>";
                echo "<div class='row'>";
                    while ($row_1 = mysqli_fetch_array($exec_1)) {
                        echo "<div class='card'>";
                            echo "<img src='uploaded_posters/".$row_1['image']."' >";
                            echo "<p class='card_date'>".date("d-m-Y",strtotime($row_1['date']))."</p>";
                            echo "<p class='card_location'>".$row_1['location']."</p>";
                            echo "<p class='card_desc'>".$row_1['description']."</p>";
                        echo "</div>";
                    
                    }
                echo "</div>";    
                echo "</div>"; 
            }
            else{
                echo "<div class='card-deck'>";
                echo "<h2 style='margin-top: -1em;'>No result found</h2>";
                echo "<img src='img/not_found.svg' style='height: 400px; 
                       margin-left: 15em;'/>";
                echo "</div>";        
            }
        }
        }

        ?>

        <!-- display some event categories -->
        <div class="event-category">
            <h2>Event categories</h2>
            <div class="category-row">
                <div class="card1">
                    <img src="img/tech.jpg" alt="">
                    <p>Tech</p>
                </div>
                <div class="card1">
                    <img src="img/fitness.jpg" alt="">
                    <p>Sports & Fitness</p>
                </div>
                <div class="card1">
                    <img src="img/music.jpg" alt="">
                    <p>Music</p>
                </div>
                <div class="card1">
                    <img src="img/career.jpg" alt="">
                    <p>Career & Business</p>
                </div>
                <div class="card1">
                    <img src="img/art.jpg" alt="">
                    <p>Art</p>
                </div>
                <div class="card1">
                    <img src="img/fashion.jpg" alt="">
                    <p>Fashion & Beauty</p>
                </div>
                <div class="card1">
                    <img src="img/photography.jpg" alt="">
                    <p>Photography</p>
                </div>
                <div class="card1">
                    <img src="img/social.jpg" alt="">
                    <p>Social</p>
                </div>
                <div class="card1">
                    <img src="img/games.jpg" alt="">
                    <p>SCi-Fi & Games</p>
                </div>
                <div class="card1">
                    <img src="img/film.jpg" alt="">
                    <p>Film</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="copyright">
            <p>&copy; <script>document.write(new Date().getFullYear())</script> Mvumo</p>
        </div>
    </footer>
</body>
</html>