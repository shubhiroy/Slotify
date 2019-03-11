<?php

if(isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
    include_once("includes/config.php");
    include_once("classes/User.php");
    include_once("classes/Artist.php");
    include_once("classes/Album.php");
    include_once("classes/Song.php");
    include_once("classes/Playlist.php");

    if(isset($_SESSION['userLoggedIn'])){
        $userLoggedIn = $_SESSION['userLoggedIn'];
        $user = new User($con,$userLoggedIn);
    }else{
        exit();
    }

}else{
    include("includes/header.php");
    include("includes/footer.php");

    $url = $_SERVER['REQUEST_URI'];
    echo "<script> openURL('$url'); </script>";
    exit();
}

?>