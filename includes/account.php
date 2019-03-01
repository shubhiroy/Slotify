<?php
class Account{

    private  $errArray;
    private  $connection;
    
    public function __construct($connection){  
        $this->errArray = array();
        $this->connection = $connection;
    }
    
    public function login($un, $pw){
        return $this->checkUserLoginDetails($un,$pw);
    }

    public function register($un, $fn, $ln, $em, $em2, $pw, $pw2){
        $this->validateUsername($un);
        $this->validateFirstName($fn);
        $this->validateLastName($ln);
        $this->validateEmails($em,$em2);
        $this->validatePasswords($pw,$pw2);

        if(empty($this->errArray)){
            return $this->insertUserDetails($un,$fn,$ln,$em,$pw);
        }else{ 
            return false;
        }
    }
    
    public function getError($err){
        if(!in_array($err,$this->errArray)){
            return  "";
        }
        return $err.'<br>';
    }

    private function checkUserLoginDetails($un, $pw){
        $encryptedpw = md5($pw);
        $querry = "Select * from users where username = '$un' and password = '$encryptedpw'";
        $result = mysqli_query($this->connection,$querry);
        if(mysqli_num_rows($result) == 1){
            return true;
        }else{
            array_push($this->errArray,Constants::$loginFailed);
            return false;
        }    
    }

    private function insertUserDetails($un,$fn,$ln,$em,$pw){
        $encyptedpw = md5($pw);
        $date = date("Y-m-d");
        $profilepic = "assets/images/profile-pic/head_emerald.png";
        $querry = "Insert into users(username,firstname,lastname,email,password,signupdate,profilepic) values('$un','$fn','$ln','$em','$encyptedpw','$date','$profilepic')";
        $result = mysqli_query($this->connection,$querry);
        return $result;
    }
    
    private function validateUsername($un){
        if(strlen($un) > 25  || 5 > strlen($un)){
            array_push($this->errArray,Constants::$usernameLength);
            return;
        }
        $checkUsernameQuerry = $this->checkExistingField('username',$un);
        if($checkUsernameQuerry){
            array_push($this->errArray,Constants::$usernameTaken);
            return;
        }
    }
    
    private function validateFirstName($fn){
        if(strlen($fn) > 25  || 2 > strlen($fn)){
            array_push($this->errArray,Constants::$firstnameLength);
            return;
        }
    }
    
    private function validateLastName($ln){
        if(strlen($ln) > 25  || 2 > strlen($ln)){
            array_push($this->errArray,Constants::$lastnameLength);
            return;
        }
    }
    
    private function validateEmails($em, $em2){
        if($em != $em2){
            array_push($this->errArray,Constants::$emailMatch);
            return;
        }
        if(!filter_var($em,FILTER_VALIDATE_EMAIL)){
            array_push($this->errArray,Constants::$emailInvalid);
            return;
        }
        $checkEmailQuerry = $this->checkExistingField('email',$em);
        if($checkEmailQuerry){
            array_push($this->errArray,Constants::$emailAlreadyUsed);
            return;
        }
    }
    
    private function validatePasswords($pw, $pw2){
        if(strlen($pw) > 30  || 5 > strlen($pw)){
            array_push($this->errArray,Constants::$passwordLength);
            return;
        }
        if($pw != $pw2){
            array_push($this->errArray,Constants::$passwordMatch);
            return;
        }
        if(preg_match('/[^A-Za-z0-9]/',$pw)){
            array_push($this->errArray,Constants::$passwordAlphaNumeric);
            return;
        }
    }

    private function checkExistingField($field, $value){
        $querry = "Select $field from users where $field = '$value'";
        $result = mysqli_query($this->connection,$querry);
        if(mysqli_num_rows($result) != 0){
            return true;
        }
        return false;
    }
}
?>