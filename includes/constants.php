<?php
class Constants{
    public static $usernameLength = "[-] Username should be between 5 and 30 characters.";
    public static $usernameTaken = "[-] Username not available.";
    public static $firstnameLength = "[-] First name should be between 2 and 25 characters.";
    public static $lastnameLength = "[-] Last name should be between 2 and 25 charaters.";
    public static $emailMatch = "[-] Emails don't match.";
    public static $emailInvalid = "[-] Email is invalid.";
    public static $emailAlreadyUsed = "[-] Email connected to another account.";
    public static $passwordLength = "[-] Password should be between 5 and 30 characters.";
    public static $passwordMatch = "[-] Passwords don't match";
    public static $passwordAlphaNumeric = "[-] Password can only contain alphabets and numbers.";
    public static $loginFailed = "[-] Incorrect username or password.";
}
?>