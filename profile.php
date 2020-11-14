<?php

include('backend/db_connection.php');
include('backend/login.php');

$active_email = $_SESSION['active_email'];

$sql = mysqli_query($connection, "SELECT * FROM `users` WHERE `email`='$active_email'");

$row = mysqli_fetch_assoc($sql);

$firstName = $row['first_name'];
$lastName = $row['last_name'];
$username = $row['username'];
$email = $row['email'];

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
                    <li><a href="profile.html">Profile</a></li>
                    <li><a href="">Settings</a></li>
                    <li><a href="backend/logout.php">Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="profile-cont">
            <div class="profile-cont_2">
                <div class="username">  
                    <h2><?php echo $username ?></h2>
                </div>
                <div class="dp-cont">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <img src="img/placeholder-image.png " alt="user_image" id="profileDisplay" onclick="setDp()">
                        <input type="file" name="profilePic" id="profilePic" onchange="displayImage(this)">
                    </form>
                </div>
                <div class="profile-info">
                    <form action="backend/profile.php" method="POST">
                        <div class="names">
                            <div class="n1">
                                <label for="firstName">First Name</label><br>
                                <input type="text" id="firstName" name="firstName" value=<?php echo $firstName; ?>><br>
                            </div>
                            <div class="n2">
                                <label for="lastName">Last Name</label><br>
                                <input type="text" id="lastName" name="lastName" value=<?php echo $lastName; ?>><br>
                            </div>
                        </div>

                        <label for="email">Email</label><br>
                        <input type="email" id="email" name="email" value=<?php echo $email ; ?>><br>

                        <label for="phone">Phone</label><br>
                        <input type="tel" id="phone" name="phone"><br>

                        <label for="location">Location</label><br>
                        <input type="text" id="location" name="location"><br>

                        <label for="language">Language</label><br>
                        <input type="text" id="language" name="lanuage"><br>
                        
                        <label for="birthday">Birthday</label><br>
                        <input type="date" id="birthday" name="birthday"><br>

                        <label for="gender">Gender</label><br>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">Male</label><br>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female">Female</label><br>

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