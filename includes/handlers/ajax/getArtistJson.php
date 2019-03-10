<?php
include_once("../../config.php");

if(isset($_POST['artistId'])){
    $artistId = $_POST['artistId'];
    $query = "Select name from artists where id = '$artistId'";
    $result = mysqli_query($con,$query);
    $resultArr = mysqli_fetch_array($result);
    echo json_encode($resultArr);
}

?>