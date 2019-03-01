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
    }
    private function validateFirstName($fn){

    }
    private function validateLastName($ln){

    }
    private function validateEmails($em, $em2){

    }
    private function validatePasswords($pw, $pw2){

    }
}
?>