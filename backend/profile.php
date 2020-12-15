<?php

session_start();

function addProfile($con, $img, $phn, $loc, $cat, $bday, $gen){

   include('./login.php');

   $active_id = $_SESSION['active_id']; 

   $sql = "UPDATE `users` SET  `image` = '$img', `phone` = '$phn', `location` = '$loc',
          `category` = '$cat', `birthday` = '$bday', `gender` = '$gen' WHERE `id` = '$active_id'";
   $exec = mysqli_query($con, $sql);

   if($exec){
      $_SESSION['success'] = "Profile updated";
      header('location: ../profile.php');
   }
   else{
    //  mysqli_error($con);
   }
   
}

// button
  if(file_exists('db_connection.php')){

   require_once('db_connection.php');

   $image = $_FILES['profilePic'];

   $imageName = $_FILES['posterImg']['name'];
   $imageType = $_FILES['posterImg']['type'];
   $imageTmpName = $_FILES['posterImg']['tmp_name'];
   $imageize = $_FILES['posterImg']['size'];
   $imagemageError = $_FILES['posterImg']['error'];

    $imageExt = explode('.', $imageName);
    $imageActExt = strtolower(end($imageExt));
    $imageTypeAllowed = array('jpg', 'jpeg', 'png', 'svg');

    // checking for the correct image type
    if(in_array($imageActExt, $imageTypeAllowed)){
      
      // check if the image has an error
      if($imageError === 0){

         // check the image size => should be below 1mb
         if($imageSize < 1000000){

            // add a unique id as the image name instead of the actual name
            $imageNewName = uniqid('', true).".".$imageActExt;

            //path to image storage 
            $store = "../uploaded_profile_imgs/".$imageNewName;

            // move poster to the uploaded poster folder
           $imagePath =  move_uploaded_file($imageTmpName, $store); 
         }
         else{
            $_SESSION['error'] = "Image is too big.";
            header('location: ../profile.php');
          }
      }
      else{
         $_SESSION['error'] = "Image has an error.";
         header('location: ../profile.php');
       }

    }
    else{
      $_SESSION['error'] = "Cannot upload image of that type.";
      header('location: ../profile.php');
    }

   $phone = $_POST['phone'];
   $location = $_POST['location'];
   $category = $_POST['category'];
   $birthday = $_POST['birthday'];
   $gender = $_POST['gender'];

   addProfile($connection, $imagePath, $phone, $location, $category, $birthday, $gender);
 }  
 else{
    echo "File is not found";
 }


?>