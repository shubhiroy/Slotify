<?php
include_once("../../config.php");
if(isset($_POST['playlistId'])){
    $_playlistId = $_POST['playlistId'];
    $query1 = "Delete from playlists where id = '$_playlistId'";
    $query2 = "Delete from playlistsongs where playlistId = '$_playlistId'";

    $result1 = mysqli_query($con,$query1);
    $result2 = mysqli_query($con,$query2);
}else{
    echo "false";
}

?>