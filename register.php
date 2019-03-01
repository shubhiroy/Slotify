<?php
  include("includes/db.php");
  $account = new Account();
  include("includes/register_handler.php");
  include("includes/login_handler.php");
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
    <form action="register.php" id="inputContainer" method="POST">
        <h2>Login to your account</h2><br><br>
        <label for="loginUsername">Username :  </label>
        <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSingh" required><br><br>
        <label for="loginPassword">Password  :   </label>
        <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required><br><br>
        <button type="submit" name="loginButton" id="loginButton">LOG IN</button><br><br>
    </form>

     <form action="register.php" id="inputContainer" method="POST">
        <h2>Create your free account</h2><br><br>
        <label for="username">Username :  </label>
        <input id="username" name="username" type="text" placeholder="e.g. bartSingh" ><br><br>
        <label for="firstname">First name :  </label>
        <input id="firstName" name="firstname" type="text" placeholder="e.g. Bart" ><br><br>
        <label for="lastname">Last name :  </label>
        <input id="lastName" name="lastname" type="text" placeholder="e.g. Singh" ><br><br>
        <label for="email">Email :  </label>
        <input id="email" name="email" type="email" placeholder="e.g. bartsingh@xyz.com" ><br><br>
        <label for="email2">Confirm Email :  </label>
        <input id="email2" name="email2" type="email" placeholder="e.g. Singh" required><br><br>
        <label for="password">Password  :   </label>
        <input id="password" name="password" type="password" placeholder="Your password" ><br><br>
        <label for="password2">Confirm Password  :   </label>
        <input id="password2" name="password2" type="password" placeholder="Your password" ><br><br>
        <button type="submit" name="registerButton" id="registerButton">SIGN UP</button>
    </form>
</body>
</html>