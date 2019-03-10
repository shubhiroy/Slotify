<?php
include_once("../../config.php");
if(isset($_POST['albumId'])){
    $albumId = $_POST['albumId'];
    $query = "Select * from albums where id = '$albumId'";
    $result = mysqli_query($con,$query);
    $resArr = mysqli_fetch_array($result);
    echo json_encode($resArr);
}
?>