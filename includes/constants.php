<?php
class Constants{
    public static $usernameLength = "<span class='errorMessage'>Username should be between 5 and 30 characters.</span>";
    public static $usernameTaken = "<span class='errorMessage'>Username not available.</span>";
    public static $firstnameLength = "<span class='errorMessage'>First name should be between 2 and 25 characters.</span>";
    public static $lastnameLength = "<span class='errorMessage'>Last name should be between 2 and 25 charaters.</span>";
    public static $emailMatch = "<span class='errorMessage'>Emails don't match.</span>";
    public static $emailInvalid = "<span class='errorMessage'>Email is invalid.</span>";
    public static $emailAlreadyUsed = "<span class='errorMessage'>Email connected to another account.</span>";
    public static $passwordLength = "<span class='errorMessage'>Password should be between 5 and 30 characters.</span>";
    public static $passwordMatch = "<span class='errorMessage'>Passwords don't match.</span>";
    public static $passwordAlphaNumeric = "<span class='errorMessage'>Password can only contain alphabets and numbers.</span>";
    public static $loginFailed = "<span class='errorMessage'>Incorrect username or password.</span>";
}
?>