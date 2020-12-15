<?php
// php to display user profolio details in input boxes
include('backend/db_connection.php');
include('backend/login.php');

$active_email = $_SESSION['active_email'];
$active_id = $_SESSION['active_id']; 

$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='$active_email'");

$row = mysqli_fetch_assoc($sql);

$firstName = $row['first_name'];
$lastName = $row['last_name'];
$username = $row['username'];
$email = $row['email'];
$phone = $row['phone'];
$location = $row['location'];
$category = $row['category'];
$birthday = $row['birthday'];
$gender = $row['gender'];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/profile.css">
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Profile</title>
</head>
<body>
    <div class="wrapper">
        <!-- top navigation bar -->
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
            <!-- dropdown -->
            <div class="user-options">
                <ul>
                    <li><i class="fas fa-user"></i><a href="profile.php">Profile</a></li>
                    <!-- <li><i class="fas fa-coins"></i><a href="">Payments Made</a></li> -->
                    <!-- <li><i class="fas fa-clipboard-list"></i><a href="">Activities</a></li> -->
                    <li><i class="fas fa-sign-out-alt"></i><a href="backend/logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-cont">
            <div class="profile-cont_2">
            <!-- active username -->
                <div class="username">  
                    <h2><?php echo $username ?></h2>
                </div>
                <?php  include("backend/alert.php");?>
                <?php 
                        
                    if(isset($_SESSION["error"])){
                        echo $_SESSION["error"];
                    }
                ?>
                <div class="profile-info">
                    <form action="backend/profile.php" method="POST" enctype="multipart/form-data">
                        <div class="dp-cont">
                            <img src="img/placeholder-image.png " alt="user_image" id="profileDisplay" onclick="setDp()">
                            <input type="file" name="profilePic" id="profilePic" onchange="displayImage(this)">
                        </div>
                        <div class="names">
                            <div class="n1">
                                <label for="firstName">First Name</label><br>
                                <input type="text" id="firstName" name="firstName" value=<?php echo $firstName; ?> readonly><br>
                            </div>
                            <div class="n2">
                                <label for="lastName">Last Name</label><br>
                                <input type="text" id="lastName" name="lastName" value=<?php echo $lastName; ?> readonly><br>
                            </div>
                        </div>

                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" value=<?php echo $email ; ?> readonly><br>

                        <label for="phone">Phone</label><br>
                        <input type="tel" id="phone" name="phone" value=<?php echo $phone ; ?>><br>

                        <label for="location">Location</label><br>
                        <input type="text" id="location" name="location" value=<?php echo $location ; ?>><br>

                        <label for="category">Event Category</label><br>
                        <select name="category" class="category">
                            <option value="" disabled selected hidden>Choose a category...</option>
                            <option value="tech">Tech</option>
                            <option value="sports and fitness">Sports & Fitness</option>
                            <option value="music">Music</option>
                            <option value="career and business">Career & Business</option>
                            <option value="art">Art</option>
                            <option value="fashion and beauty">Fashion & Beauty</option>
                            <option value="photography">Photography</option>
                            <option value="social">Social</option>
                            <option value="sci-fi and games">SCi-Fi & Games</option>
                            <option value="film">Film</option>
                        </select><br>
                        
                        <label for="birthday">Birthday</label><br>
                        <input type="date" id="birthday" name="birthday" value=<?php echo $birthday ; ?>><br>

                        <label for="gender">Gender</label><br>
                        <select name="gender" class="gender">
                            <option value="" disabled selected hidden>Choose Gender...</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select><br>

                        <button type="submit" class="saveBtn" name="saveBtn">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="footer">
        <p>&copy; <script>document.write(new Date().getFullYear())</script> Mvumo</p>
    </footer>

    <!-- js files -->
    <script src="js/app.js"></script>
    
</body>
</html>