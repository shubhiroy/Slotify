<?php
    include("includes/config.php");
    if(isset($_SESSION['userLoggedIn'])){
        $username = $_SESSION['userLoggedIn'];
    }else{
        header("Location: register.php");
    }
    // unset($_SESSION['userLoggedIn']); // LOG OUT
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotify</title>
</head>
<body>
    Hello !!!
</body>
</html>
