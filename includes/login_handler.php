<?php
    if(isset($_POST['loginButton'])){
        $sanitizer = new Sanitizer();
        $loginUsername = $sanitizer->usernameSanitizer($_POST['loginUsername']);
        $loginPassword = $sanitizer->passwordSanitizer($_POST['loginPassword']);

        $isSuccessful = $account->login($loginUsername,$loginPassword);
        if($isSuccessful){
            echo($loginUsername);
            $_SESSION['userLoggedIn'] = $loginUsername;
            header("Location: index.php");
        }
    }
?>