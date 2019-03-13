<?php

include_once("../../config.php");

if(isset($_POST['songId']) && isset($_POST['playlistId'])){
    $songId = $_POST['songId'];
    $playlistId = $_POST['playlistId'];
    $query = "DELETE form playlistsongs WHERE songId = '$songId' and playlistId = '$playlistId'";
    $result = mysqli_query($con,$query);
    //echo "Song deleted from the playlist.";
    echo $songId . " " . $playlistId;
}else{
    echo "Unable to delete song from the playlist.";
}

?>