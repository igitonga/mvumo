<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Sign Up</title>
</head>
<body>
    <div class="wrapper">
        <!-- image on the left -->
        <div class="signup-image">
            <!-- there is a background image here -->
        </div>
        <!-- form on the right -->
        <div class="signup-form">
            <p>Already have an account? <a href="login.php">Login</a></p>
            <!-- alert pop up -->
            <?php  include('backend/alert.php'); ?>
            <?php
            if(isset($_SESSION['error'])){
                echo $_SESSION['error'];
            }
            ?>
            <h2>Creating an account</h2>
            <form action="backend/signup.php" method="POST">
                <input type="text" name="fullname" id="fullname" placeholder="Fullname" required><br>
                <input type="text" name="username" id="username" placeholder="Username" required><br>
                <input type="email" name="email" id="email" placeholder="Email" required><br>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <!-- font awesome password icons -->
                <i class="fas fa-eye" onclick="show()"></i>
                <i class="fas fa-eye-slash" onclick="noShow()"></i><br>
                <button type="submit" name="signupBtn" id="signupBtn">Create</button>
            </form>
        </div>
    </div>

    <!-- js files -->
    <script src="js/app.js"></script>
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
</body>
</html>
<?php session_destroy(); ?>