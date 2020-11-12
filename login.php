<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/bb8cdd0579.js" crossorigin="anonymous"></script>
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Login</title>
</head>
<body>
    <div class="wrapper">
        <!-- image on the left -->
        <div class="login-image">
            <!-- there is a background image here -->
        </div>

        <!-- form on the right -->
        <div class="login-form">
            <p>Don't have an account? <a href="signup.php">Create account</a></p>

            <!-- alert pop up -->
            <?php  include("backend/alert.php"); ?>
            <?php 
            
           if(isset($_SESSION["error"])){
               echo $_SESSION["error"];
           }
            ?>
            <h2>Welcome back to Mvumo</h2>
            
            <form action="backend/login.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email" required><br>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <!-- font awesome password icons -->
                <i class="fas fa-eye" onclick="show()"></i>
                <i class="fas fa-eye-slash" onclick="noShow()"></i><br>
                <button type="submit" name="loginBtn" id="loginBtn">Welcome</button><br>

                <a class="forgetPass" href="password_reset.php">Forgot Password</a>
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