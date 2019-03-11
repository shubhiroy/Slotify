<?php
include_once("includes/includedFiles.php");

if(isset($_GET['id'])){
    $playlistId = $_GET['id'];
}else{
    header("Location: yourMusic.php");
}
?>