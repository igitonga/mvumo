<?php

function signupUser($con, $fName, $uName, $email, $pass){

    // encrypt password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // insert to table query
    $sql = "INSERT INTO `users`(`fullname`, `username`, `email`, `password`, `reg_date`)
            VALUES('$fName', '$uName', '$email', '$hashed_pass', Now())";
    $execute = mysqli_query($con, $sql);

    if($execute){
        header('location: ../index.php');
    }
    else{
        //echo mysqli_error($con);
    }
}

//button functionality
if(isset($_POST['loginBtn'])){

    if(file_exists('db_connection.php')){

        require_once('db_connection.php');

        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        signupUser($connection, $fullname, $username, $email, $password);
    }
    else{
        echo "File not found";
    }

}
else{
  //  echo "Technical issues";
}

?>