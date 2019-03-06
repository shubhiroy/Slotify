<?php
include_once("../../config.php");

if(isset($_POST['songId'])){
    $songId = $_POST['songId'];
    $query = "Select * from songs where id = '$songId'";
    $result = mysqli_query($con,$query);
    $resultArr = mysqli_fetch_array($result);
    echo json_encode($resultArr);
}

?>