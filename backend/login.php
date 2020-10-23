<?php

// verify details
function loginUser($con, $email, $pass){

    $sql = "SELECT `email`, `password` FROM `users` WHERE `email` = '$email' LIMIT 1";
    $execute = mysqli_query($con, $sql);

    if($execute){

        $num_rows = mysqli_num_rows($execute);

        if($num_rows ==  1){

            $row = mysqli_fetch_assoc($execute);

            $stored_password = $row['password'];

            // verify if password is correct
            // if(password_verify($pass, $stored_password)){

            //     echo "Successful login";
            // }
            // else{

            //     echo "Wrong password";
            // }
        }
        else{
            echo "Login failed";
        }
    }
    else{

        mysqli_error($con);
    }
}

// button functionality
if(isset($_POST['loginBtn'])){
   
  if(file_exists('db_connection.php')){

    require_once('db_connection.php');

    $email = $_POST['email'];
    $password = $_POST['password'];

    loginUser($connection, $email, $password);
  }  
  else{
      echo "File is not found";
  }
}
else{
   // echo "Technical issues";
}

?>