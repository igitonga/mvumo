<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require './db_connection.php';
require './alert.php';

if(isset($_POST['passResetBtn'])){

    $user_email = $_POST['email'];

    // verify if email exists
    $email_sql = mysqli_query($connection, "SELECT `email` FROM `users` WHERE `email`='$user_email'");

    if(mysqli_num_rows($email_sql) == 0){
        session_start();
        $_SESSION['error'] = "User with this email doesn't exist. Create account.";
        header('location: ../password_reset.php');
    }
    else{
    
    $genCode = uniqid(true);                      // generating a unique code to allow user to reset password
    $query = mysqli_query($connection, "INSERT INTO `resetpassword`(`code`,`email`)VALUES('$genCode','$user_email')");

 // Instantiation and passing `true` enables exceptions
 $mail = new PHPMailer(true);

 try {
     //Server settings
     //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
     $mail->isSMTP();                                            // Send using SMTP
     $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
     $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
     $mail->Username   = '************';                     // SMTP username
     $mail->Password   = '**********';                               // SMTP password
     $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
     $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
     //Recipients
     $mail->setFrom('hello@mvumo.com', 'Mvumo');
     $mail->addAddress($user_email);     // Add a recipient
     $mail->addReplyTo('no-reply@mvumo.com', 'No-reply');
   
     // Content
     //$url = "http://" .$_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]) ."/resetPassword_b.php?code=$genCode";   //redirect page
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Reset Password Notification';
     $mail->Body    = '
                       <html>
                       <head>
                       <style>
                       .wrapper{
                            background: #e6e6e6;
                            padding: 4em 0;
                       }
                       .wrapper .logo{
                           margin-left: 13.5em;
                           padding-top: -3em;
                           padding-bottom: 2em;
                       }
                       .wrapper .logo img{
                           width: 200px
                       }
                       .wrapper .inner_wrapper{ 
                           background: #fff;
                           width: 60%;
                           margin-right: auto;
                           margin-left: auto;
                           padding: 3em;
                       }
                       .wrapper .inner_wrapper .text{
                           font-size: 1.2em;
                           color: #000000;
                           opacity: 0.7;
                       }
                       .wrapper .inner_wrapper .btn{
                            background: #0032ff;
                            color: #fff5ff;
                            font-weight: bold;
                            font-size: 1.2em;
                            padding: 1em 2em;
                            border-radius: 5px;
                            text-decoration: none;
                            margin-top: 2em;
                       }
                       .wrapper .footer{
                           background: #0032ff;
                           width: 60%;
                           margin-right: auto;
                           margin-left: auto;
                           padding: 3em;
                       }
                       .wrapper .footer p{
                        color: #fff5ff;
                       }
                       </style>
                       </head>
                       <body>
                        <div class="wrapper">
                            <div class="logo">
                                <img src="cid:logo" alt="logo"/>
                            </div>
                            <div class="inner_wrapper">
                                <h1>Hello,</h1>
                                <p class="text">Please click the button below to reset your Mvumo account password. </p><br>
                                <a href="$url" class="btn">Reset Password</a><br>
                                <p class="text" style="margin-top: 2em;">This link will expire 24 hours from now and your current password will remain the same. Please ignore this email if you have not requested a password reset.</p><br>
                            </div>
                            <div class="footer">
                                <p class="text">Sincerely,</p>
                                <p class="text">The Mvumo.com team</p>
                            </div>
                        </div>
                       </body></html>';
     $mail->AltBody = 'Follow the link below to reset your password:<br>
                       Click <a href="$url">Here</a> to reset password. ';
     $mail->AddEmbeddedImage('../img/logo.png', 'logo');     //embbed the logo image on the email            
 
     $mail->send();
     echo 'Reset password email has been sent.';
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }

header('location: ../password_message.php?successful');

exit();
    }
}

?>