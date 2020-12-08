<?php

function addProfile($con, $img, $phn, $loc, $cat, $bday, $gen){

   include('./login.php');

   $active_email = $_SESSION['active_email'];
   $active_id = $_SESSION['active_id']; 

   $sql = "UPDATE `users` SET `user_id` = '$active_id', `image` = '$img', `phone` = '$phn', `location` = '$loc',
          `category` = '$cat', `birthday` = '$bday', `gender` = '$gen' WHERE `email` = '$active_email'";
   $exec = mysqli_query($con, $sql);

   if($exec){
   
      header('location: ../profile.php');
   }
   else{
    //  mysqli_error($con);
   }
   
}

// button
if(isset($_POST['saveBtn'])){
      
     
  if(file_exists('db_connection.php')){

   require_once('db_connection.php');

   $image = $_FILES['profilePic'];
   $phone = $_POST['phone'];
   $location = $_POST['location'];
   $category = $_POST['category'];
   $birthday = $_POST['birthday'];
   $gender = $_POST['gender'];

   print_r($_POST);

   addProfile($connection, $image, $phone, $location, $category, $birthday, $gender);
 }  
 else{
    // echo "File is not found";
 }
}
else{
   // echo "Technical difficulty";
}

?>