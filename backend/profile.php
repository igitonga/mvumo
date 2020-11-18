<?php

function addProfile($con, $phn, $loc, $lang, $bday, $gen){

   $sql = "INSERT INTO `profile` VALUES ('$phn','$loc','$lang','$bday','$gen')";
   $exec = mysqli_query($con, $sql);

   if($exec){
      echo "Nice";
   }
   
}

// button
if(isset($_POST['saveBtn'])){

   if(file_exists('db_connection.php')){

      require_once('db_connection.php');

      $phone = $_POST['phone'];
      $location = $_POST['location'];
      $language = $_POST['language'];
      $bDay = $_POST['birthday'];
      $gender = $_POST['gender'];
      
      addProfile($connection, $phone, $location, $language, $bDay, $gender);
  }
  else{
      
      echo "File not found";
  }
    
}
else{
   // echo "Technical difficulty";
}

?>