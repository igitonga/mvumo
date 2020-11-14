<?php

//validate that user signs up once
function validateUser($con, $email){

    $valid = false;

    $query = "SELECT `email` FROM `users` WHERE `email` = '$email'";
    $exec = mysqli_query($con, $query);

    if($exec){

        $num_of_rows = mysqli_num_rows($exec);

        if($num_of_rows == 0){
            
            $valid = true;
        }
    }

    return $valid;
}

// insert details  to db
function signupUser($con, $fName, $lName, $uName, $email, $pass){

    session_start();

    if(validateUser($con, $email)){

    // encrypt password
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    // insert to table query
    $sql = "INSERT INTO `users`(`first_name`, `last_name`, `username`, `email`, `password`, `reg_date`)
            VALUES('$fName', '$lName', '$uName', '$email', '$hashed_pass', Now())";
    $execute = mysqli_query($con, $sql);

    if($execute){
        header('location: ../login.php');
    }
    else{
        //echo mysqli_error($con);
    }
    }
    else{
        setcookie("fname", $fName, time()+1, "/");
        setcookie("lname", $lName, time()+1, "/");
        setcookie("username", $uName, time()+1, "/");
        setcookie("email", $email, time()+1, "/");
        header('location: ../signup.php');
        $_SESSION['error'] = "Email already exists";
    }
    
}

//button functionality
if(isset($_POST['signupBtn'])){

    if(file_exists('db_connection.php')){

        require_once('db_connection.php');

        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        signupUser($connection, $firstName,$lastName, $username, $email, $password);
    }
    else{
        
        echo "File not found";
    }

}
else{
  //  echo "Technical issues";
}

?>