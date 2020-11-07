<?php

include('backend/db_connection.php');

if(!isset($_GET["code"])){
    exit("Can't find page"); 
}

$code = $_GET["code"];

$getEmailQuery = mysqli_query($connection, "SELECT `email` FROM `resetpassword` WHERE code='$code'");

if(mysqli_num_rows($getEmailQuery) == 0){
    exit("Can't find page");
}

//button
if(isset($_POST['updatePassBtn'])){

    $pass = $_POST['password'];
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

    $row = mysqli_fetch_assoc($getEmailQuery);
    $email = $row['email'];

    $sql = mysqli_query($connection, "UPDATE `users` SET `password`='$hash_pass' WHERE `email`='$email'");

    if($sql){
        $query = mysqli_query($connection, "DELETE FROM `resetpassword` WHERE `code`='$code'");
        exit("Password Updated");
    }
    else{
        exit("Something went wrong");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/resetPassword_b.css">
    <link rel="icon" href="img/app-icon.png">
    <title>Mvumo | Reset password</title>
</head>
<body>
    <div class="wrapper">
        <div class="top-bar">
            <div class="logo">
                <img src="img/logo.png" alt="logo">
            </div>
        </div>
    </div>
</body>
</html>