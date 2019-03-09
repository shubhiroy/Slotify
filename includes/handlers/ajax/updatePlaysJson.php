<?php
include_once("../../config.php");
if(isset($_POST['songId'])){
    $songId = $_POST['songId'];
    $query = "Update songs set plays = plays +  1 where id = '$songId'";
    $result = mysqli_query($con,$query); 
}
?>