<?php

include_once("../../config.php");

if(isset($_POST['username']) && isset($_POST['oldPass']) && isset($_POST['newPass'])){

    //echo gettype($_POST['oldPass']) . " " . $_POST['newPass'] . " " .$_POST['confPass'] . "<br>";

    if($_POST['oldPass'] == "" || $_POST['newPass']=="" || $_POST['confPass']=="") {
        echo "ERROR : Please fill all the fields.";
        exit();
    }

    if($_POST['newPass'] != $_POST['confPass']) {
        echo "ERROR : New passwords don't match.";
        exit();
    }
    
    if(preg_match('/[^A-Za-z0-9]/', $_POST['newPass'])) {
        echo "ERROR : Your password can only contain numbers and letters.";
        exit();
    }

    if(strlen($_POST['newPass']) > 30 || strlen($_POST['newPass']) < 5) {
        echo "ERROR : Your password must be between 5 and 30 characters.";
        exit();
    }

    $username = $_POST['username'];
    $oldPass = md5($_POST['oldPass']);
    $newPass = md5($_POST['newPass']);

    $query = "Select password from users where username = '$username'";
    $result = mysqli_query($con,$query);
    if($row = mysqli_fetch_array($result)){
        if($row['password'] != $oldPass){
            echo "ERROR : Password Incorrect.";
            exit();
        }    

        $query = "UPDATE users SET password = '$newPass' where username = '$username' and password = '$oldPass'";
        $result = mysqli_query($con,$query);
        if($result){
            echo "Update successful.";
        }else{
            echo "ERROR : Sorry, unable to change the password.";
        }
    }

}else{
    echo "ERROR : Sorry, unable to change the email address.";
}
?>