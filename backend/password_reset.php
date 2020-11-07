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

if(isset($_POST['passResetBtn'])){

    $user_email = $_POST['email'];

    
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
     $mail->Username   = 'iangitonga47@gmail.com';                     // SMTP username
     $mail->Password   = 'chelsea11';                               // SMTP password
     $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
     $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
 
     //Recipients
     $mail->setFrom('hello@mvumo.com', 'Mvumo');
     $mail->addAddress($user_email);     // Add a recipient
     $mail->addReplyTo('no-reply@mvumo.com', 'No-reply');
   
     // Content
     //$url = "http://" .$_SERVER["HTTP_HOST"] .dirname($_SERVER["PHP_SELF"]) ."/resetPassword_b.php?code=$genCode";   //redirect page
     $url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"."/resetPassword_b.php?code=$genCode";
     $mail->isHTML(true);                                  // Set email format to HTML
     $mail->Subject = 'Password Reset';
     $mail->Body    = 'Follow the link below to reset your password:<br>
                       Click <a href="$url">Here</a> to reset password. ';
     $mail->AltBody = 'Follow the link below to reset your password:<br>
                       Click <a href="$url">Here</a> to reset password. ';
 
     $mail->send();
     echo 'Reset password email has been sent.';
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }

header('location: ../login.php');

exit();
}

?>