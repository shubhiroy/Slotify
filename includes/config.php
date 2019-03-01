<?php
ob_start();
session_start();
$timezone = date_default_timezone_set("Indian/Christmas");
$connection = mysqli_connect("localhost","root","","slotify");
if(mysqli_connect_errno()){
    echo("Failed : ".mysqli_connect_errno());
}
?>