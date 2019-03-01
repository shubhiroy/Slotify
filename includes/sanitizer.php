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
?>