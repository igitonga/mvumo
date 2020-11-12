<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/password_reset.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Reset Password</title>
</head>
<body>
   <div class="wrapper">
        <!-- image on the left -->
        <div class="image">
            <!-- there is a background image here -->
        </div>

        <!-- form on the right -->
        <div class="right-cont">

        <p class="cre_acc">Don't have an account? <a href="signup.php">Create account</a></p>

            <div class="conf-email">

            <!-- alert pop-up -->
            <?php include("./backend/alert.php") ?>
                <?php
                 if(isset($_SESSION["error"])){
                    echo $_SESSION["error"];
                }
                ?>

                <h2>Forgot password?</h2>

                <p>Enter the email address you used when you joined and we’ll <br>
                send you instructions to reset your password.</p>

                <form action="backend/password_reset.php" method="POST" >

                    <label for="email">Email Address</label><br>
                    <input type="email" id="email" name="email" required><br>

                    <button type="submit" name="passResetBtn" class="passResetBtn">Send Instructions</button>
                    </form>
            </div>
        </div>
   </div>
   
   <!-- js files -->
   <script src="js/jquery-3.5.1.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php session_destroy(); ?>

