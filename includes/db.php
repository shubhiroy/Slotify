<?php
class Sanitizer{
    function usernameSanitizer($input){
        $input = strip_tags($input);
        $input = str_replace(" ","",$input);
        return $input;
    }
    function emailSanitizer($input){
        $input = strip_tags($input);
        $input = str_replace(" ","",$input);
        return $input;
    }
    function passwordSanitizer($input){
        $input = strip_tags($input);
        return $input;
    }
    function nameSanitizer($input){
        $input = strip_tags($input);
        $input = str_replace(" ","",$input);
        $input = ucfirst(strtolower($input));
        return $input;
    }
}

class Account{
    var $error_arr;
    public function __construct(){  
        $this->error_arr = array();
    }
    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em,$em2);
        $this->validatePasswords($pw,$pw2);
        print_r($this->error_arr); 
    }
    private function validateUsername($un){
        if(strlen($un) > 25  || 5 > strlen($un)){
            array_push($this->error_arr,"Username should be between 5 and 25.");
            return;
        }
        //TODO: Check if the username already exists
    }
    private function validateFirstName($fn){
        if(strlen($fn) > 30  || 2 > strlen($fn)){
            array_push($this->error_arr,"First name should be between 2 and 30.");
            return;
        }
    }
    private function validateLastName($ln){
        if(strlen($ln) > 30  || 2 > strlen($ln)){
            array_push($this->error_arr,"Last name should be between 2 and 30.");
            return;
        }
    }
    private function validateEmails($em, $em2){
        if($em != $em2){
            array_push($this->error_arr,"Your emails don't match.");
            return;
        }
        if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            array_push($this->error_arr,"Email is invalid.");
            return;
        }
        //TODO: Check if the email already exists
    }
    private function validatePasswords($pw, $pw2){
        echo 'password field';
        if($pw != $pw2){
            array_push($this->error_arr,"Your passwords don't match.");
            return;
        }
        if(preg_match('/[^A-Za-z0-9]/',$pw)){
            array_push($this->error_arr,"Your passwords can only contain numbers and characters");
            return;
        }
    }
}
?>