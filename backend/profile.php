<?php

function addProfile($con, $img, $phn, $loc, $cat, $bday, $gen){

   include('./login.php');

   $active_id = $_SESSION['active_id'];

   $sql = "INSERT INTO `profile`(`user_id`, `image`, `phone`, `location`, `category`, `birthday`, `gender`)
           VALUES ('$active_id', '$img', '$phn','$loc','$cat','$bday','$gen')";
   $exec = mysqli_query($con, $sql);

   if($exec){
      
      header('location: ../profile.php');
   }
   else{
      //mysqli_error($con);
   }
   
}

// button
if(isset($_POST['saveBtn'])){

   // profile picture verification
   $file = $_FILES['profilePic'];

   print_r($file);

    // $fileName = $_FILES['profilePic']['name'];
    // $fileType = $_FILES['profilePic']['type'];
    // $fileTmpName = $_FILES['profilePic']['tmp_name'];
    // $fileSize = $_FILES['profilePic']['size'];
    // $fileError = $_FILES['profilePic']['error'];

    // $fileExt = explode('.', $fileName);
    // $fileActExt = strtolower(end($fileExt));
    // $fileTypeAllowed = array('jpg', 'jpeg', 'png', 'svg');

    // // checking for the correct image type
    // if(in_array($fileActExt, $fileTypeAllowed)){

    //     // check if the image has an error
    //     if($fileError === 0){

    //         // check the image size => should be below 1mb
    //         if($fileSize < 1000000){

    //             // add a unique id as the image name instead of the actual name
    //             $fileNewName = uniqid('', true).".".$fileActExt; 
                
    //             if(file_exists('db_connection.php')){

    //                 require_once('db_connection.php');
                    
    //                 $profImg = $fileNewName;
    //                 $phone = $_POST['phone'];
    //                 $location = $_POST['location'];
    //                 $category = $_POST['category'];
    //                 $bDay = $_POST['birthday'];
    //                 $gender = $_POST['gender'];
      
    //                 addProfile($connection, $profImg, $phone, $location, $category, $bDay, $gender);

    //                 //path to image storage 
    //                 $store = "../uploaded_profile_imgs/".$fileNewName;

    //                 move_uploaded_file($fileTmpName, $store);
                    
    //             }  
    //             else{
    //                 echo "File is not found";
    //             }
    //         }
    //         else{
    //             echo "The image size is too big";
    //         }
    //     }
    //     else{
    //         echo "An error occurred when uploading your image";
    //     }
    // }
    // else{
    //     echo "Cannot upload image of that type.";
    // }

    
}
else{
   // echo "Technical difficulty";
}

?>