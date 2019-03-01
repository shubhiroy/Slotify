<?php
include("config.php");
    $field = 'email';
    $value = 'a@a.com';
   $querry = "Select $field from users where $field = '$value'";
   echo($querry.'<br>');
   $result = mysqli_query($connection,$querry);
   echo(mysqli_num_rows($result));
   ob_end_flush();
?>