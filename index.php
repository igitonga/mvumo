<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <a href="login.php">Join Mvumo</a>
            </div>
            <div class="intro_section-image">
                <img src="img/event_head.svg" alt="animated image">
            </div>
        </div>
        <!-- search panel for events -->
        <div class="search-section">
            <div class="search-section_2">
                <input type="text" name="eventName" id="eventName" placeholder="Find the event">
                <input type="text" name="eventLocation" id="eventLocation" placeholder="Location">
                <input type="submit" name="btnSearch" id="btnSearch" value="Search">
            </div>
        </div>
    </div>
</body>
</html>