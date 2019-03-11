<?php
include_once("../../config.php");
if(isset($_POST['playlistName']) && isset($_POST['username'])){
    $playlistName = $_POST['playlistName'];
    $username = $_POST['username'];
    $date = date("Y-m-d");
    $query = "INSERT INTO playlists VALUES (NULL,'$playlistName','$username','$date');";
    $result = mysqli_query($con,$query);
    
}else{
    echo "Playlist name or username not passed into file.";
}

?>