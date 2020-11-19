<?php

function addProfile($con, $phn, $loc, $cat, $bday, $gen){

   include('./login.php');

   $active_id = $_SESSION['active_id'];

   $sql = "INSERT INTO `profile`(`user_id`, `phone`, `location`, `category`, `birthday`, `gender`)
           VALUES ('$active_id', '$phn','$loc','$cat','$bday','$gen')";
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

   if(file_exists('db_connection.php')){

      require_once('db_connection.php');

      $phone = $_POST['phone'];
      $location = $_POST['location'];
      $category = $_POST['category'];
      $bDay = $_POST['birthday'];
      $gender = $_POST['gender'];
      
      addProfile($connection, $phone, $location, $category, $bDay, $gender);
  }
  else{
      
     // echo "File not found";
  }
    
}
else{
   // echo "Technical difficulty";
}

?>