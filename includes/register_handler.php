<?php
    if(isset($_POST['registerButton'])){
        $sanitizer = new Sanitizer();
        $username = $sanitizer->usernameSanitizer($_POST['username']);
        $firstname = $sanitizer->nameSanitizer($_POST['firstname']);
        $lastname = $sanitizer->nameSanitizer($_POST['lastname']);
        $email = $sanitizer->emailSanitizer($_POST['email']);
        $email2 = $sanitizer->emailSanitizer($_POST['email2']);
        $password = $sanitizer->passwordSanitizer($_POST['password']);
        $password2 = $sanitizer->passwordSanitizer($_POST['password2']);
        
        $account->register($username,$firstname,$lastname,$email,$email2,$password,$password2);
    }
?>