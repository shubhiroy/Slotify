<?php

include_once("../../config.php");

if(isset($_POST['email']) && isset($_POST['username'])){
    $email = $_POST['email'];
    $username = $_POST['username'];

    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        echo "ERROR : Invalid Email.";
        exit();
    }

    // $query = "Select email from users where username != '$username' and email = '$email'";
    // $result = mysqli_query($con,$query);
    // if(mysqli_num_rows($result) > 0){
    //     echo "ERROR : Email address is already linked with another id.";
    //     exit();
    // }

    $query = "Select email from users where username != '$username' and email = '$email'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        echo "ERROR : Email address is already linked with another id.";
        exit();
    }


    $query = "UPDATE users SET email = '$email' where username == '$username'";
    $result = mysqli_query($con,$query);
    if($result){
        echo "Update successful.";
    }else{
        echo "ERROR : Sorry, unable to change the email address.";
    }
    

}else{
    echo "ERROR : Sorry, unable to change the email address.";
}
?>