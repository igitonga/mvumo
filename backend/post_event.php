<?php

include('./login.php');
include('./alert.php');

$active_id =  $_SESSION['active_id'];

if(isset($_POST['postEvtBtn'])){

    // active user

    $file = $_FILES['posterImg'];

    $fileName = $_FILES['posterImg']['name'];
    $fileType = $_FILES['posterImg']['type'];
    $fileTmpName = $_FILES['posterImg']['tmp_name'];
    $fileSize = $_FILES['posterImg']['size'];
    $fileError = $_FILES['posterImg']['error'];

    $fileExt = explode('.', $fileName);
    $fileActExt = strtolower(end($fileExt));
    $fileTypeAllowed = array('jpg', 'jpeg', 'png', 'svg');

    // checking for the correct image type
    if(in_array($fileActExt, $fileTypeAllowed)){

        // check if the image has an error
        if($fileError === 0){

            // check the image size => should be below 1mb
            if($fileSize < 1000000){

                // add a unique id as the image name instead of the actual name
                $fileNewName = uniqid('', true).".".$fileActExt;

                //path to image storage 
                $store = "../uploaded_posters/".$fileNewName;
                
                if(file_exists('db_connection.php')){

                    require_once('db_connection.php');
                    
                    $poster = $fileNewName;
                    $date = $_POST['date'];
                    $loc = $_POST['location'];
                    $desc = $_POST['description'];

                    $sql = "INSERT INTO `event` (`user_id`, `image`, `date`, `location`, `description`) 
                            VALUES ('$active_id', '$poster', '$date', '$loc', '$desc')";
                    $exec = mysqli_query($connection, $sql);

                    if($exec){
                         // move poster to the uploaded poster folder
                         move_uploaded_file($fileTmpName, $store); 
                         
                         header('location: ../home.php');
                    }
                    else{
                       // echo mysqli_error($connection);
                    }
                    
                }  
                else{
                   echo "File is not found";
                }
            }
            else{
                $_SESSION['error'] = "The image size is too big";
                header('location: ../post_event.php');
            }
        }
        else{
            $_SESSION['error'] = "An error occurred when uploading your image";
            header('location: ../post_event.php');
        }
    }
    else{
        $_SESSION['error'] = "Cannot upload image of that type.";
        header('location: ../post_event.php');
    }

   
}
else{
     //echo "Technical difficulty";
}

?>