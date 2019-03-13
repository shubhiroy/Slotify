<?php
include_once("../../config.php");

if(isset($_POST['songId']) && isset($_POST['playlistId'])){
    $songId = $_POST['songId'];
    $playlistId = $_POST['playlistId'];
    $query = "SELECT max(playlistOrder) + 1 as playlistOrder from playlistsongs  where playlistId = '$playlistId'";
    $result = mysqli_query($con,$query);
    $resultArr = mysqli_fetch_array($result);
    $order = ($resultArr['playlistOrder'] == NULL) ? 1 : $resultArr['playlistOrder'];
    $query = "INSERT into playlistSongs values(NULL,'$songId','$playlistId','$order')";
    $result = mysqli_query($con,$query);
    echo "Song added to playlist.";
}else{
    echo "Unable to add song to playlist.";
}

?>