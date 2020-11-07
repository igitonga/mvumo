<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/resetPassword.css">
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

            <div class="conf-email">

                <h2>Forgot password?</h2>

                <p>Enter the email address you used when you joined and we’ll <br>
                send you instructions to reset your password.</p>

                <form action="backend/password_reset.php" method="POST" >
                    <label for="email">Email Address</label><br>
                    <input type="email" id="email" name="email" required><br>

                    <button type="submit" name="passResetBtn" class="passResetBtn">Send Reset Instructions</button>
                    </form>
            </div>
        </div>
   </div> 
</body>
</html>