<?php
    if(isset($_POST['loginButton'])){
        $sanitizer = new Sanitizer();
        $loginUsername = $sanitizer->usernameSanitizer($_POST['loginUsername']);
        $loginPassword = $sanitizer->passwordSanitizer($_POST['loginPassword']);
        echo($loginUsername . " " . $loginPassword);
    }
?>