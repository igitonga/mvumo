<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
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
            <h2>Welcome back to Mvumo</h2>
            <form action="backend/login.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Email" required><br>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                <button type="submit" name="loginBtn" id="loginBtn">Welcome</button>
            </form>
        </div>
    </div>
</body>
</html>