<?php
  include_once("includes/config.php");
  include_once("includes/sanitizer.php");
  include_once("includes/account.php");
  include_once("includes/constants.php");
  $account = new Account($connection);
  include_once("includes/register_handler.php");
  include_once("includes/login_handler.php");
  function getInputValue($field){
      if(isset($_POST[$field])){
          echo($_POST[$field]);
      }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotify</title>
    <link rel="stylesheet" type="text/css" href="includes/assets/css/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="includes/assets/js/register.js"></script>
    <!-- <script>
        $(document).load(function(){
            $('#loginForm').show();
        });
    </script> -->
    <?php
        if(isset($_POST['registerButton'])){
            echo "<script>
                    $(document).ready(function(){
                        $('#loginForm').hide();
                        $('#registerForm').show();
                    });
                  </script>";
        }else{
            echo "<script>
                    $(document).ready(function(){
                        $('#loginForm').show();
                        $('#registerForm').hide();
                    });
                  </script>";
        }
    ?>
    
</head>
<body>
    <div id="background">
        <div id="loginContainer">
            <div id="inputContainer">
                <form id="loginForm" action="register.php" id="inputContainer" method="POST">
                    <h2>Login to your account</h2><br><br>
                    <?php
                        echo($account->getError(Constants::$loginFailed));
                    ?><br>
                    <label for="loginUsername">Username</label>
                    <input id="loginUsername" name="loginUsername" type="text" placeholder="e.g. bartSingh" value="<?php getInputValue('loginUsername') ?>" required><br><br>
                    <label for="loginPassword">Password</label>
                    <input id="loginPassword" name="loginPassword" type="password" placeholder="Your password" required><br><br>
                    <button type="submit" name="loginButton" id="loginButton">LOG IN</button><br><br>
                    <div class="hasAccountText">
                        <span id="hideLogIn">Don't have an account ? Register Here.</span>
                    </div>
                </form>

                <form id="registerForm" action="register.php" id="inputContainer" method="POST" style= >
                    <h2>Create your free account</h2><br><br>
                    <label for="username">Username</label>
                    <input id="username" name="username" type="text" placeholder="e.g. bartSingh" value="<?php getInputValue('username') ?>"><br>
                    <?php 
                        echo($account->getError(Constants::$usernameLength));
                        echo($account->getError(Constants::$usernameTaken));
                    ?><br>
                    <label for="firstname">First Name</label>
                    <input id="firstName" name="firstname" type="text" placeholder="e.g. Bart" value="<?php getInputValue('firstname') ?>"><br>
                    <?php 
                        echo($account->getError(Constants::$firstnameLength));
                    ?><br>
                    <label for="lastname">Last Name</label>
                    <input id="lastName" name="lastname" type="text" placeholder="e.g. Singh" value="<?php getInputValue('lastname') ?>"><br>
                    <?php 
                        echo($account->getError(Constants::$lastnameLength));
                    ?><br>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email" placeholder="e.g. bartsingh@xyz.com" value="<?php getInputValue('email') ?>"><br>
                    <?php 
                        echo($account->getError(Constants::$emailMatch));
                        echo($account->getError(Constants::$emailInvalid));
                        echo($account->getError(Constants::$emailAlreadyUsed));
                    ?><br>
                    <label for="email2">Confirm Email</label>
                    <input id="email2" name="email2" type="email" placeholder="e.g. bartsingh@xyz.com" value="<?php getInputValue('email2') ?>"><br><br>
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" placeholder="Your password" value=""><br>
                    <?php 
                        echo($account->getError(Constants::$passwordLength));
                        echo($account->getError(Constants::$passwordMatch));
                        echo($account->getError(Constants::$passwordAlphaNumeric));
                    ?><br>
                    <label for="password2">Confirm Password</label>
                    <input id="password2" name="password2" type="password" placeholder="Your password" value=""><br><br>
                    <button type="submit" name="registerButton" id="registerButton">SIGN UP</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account ? Login Here.</span>
                    </div>
                </form>
            </div>

            <div id="loginText">
                <h1>Get Great Music, Right Now.</h1>
                <h2>Listen to loads of music for free</h2>
                <ul>
                    <li>Discover music you'll fall in love with</li>
                    <li>Create your own playlist</li>
                    <li>Follow artists to keep up to date</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>