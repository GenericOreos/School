<?php 
session_start();
//insert the user's data into the users table of the DB
//if everything is successful, redirect them to the login page.
//if there is an error, redirect back to the signup page with a friendly message
if(isset($_POST["firstname"])){
    require_once('includes/Fedex/fedex-common.php');
    include("connect.php");
    include("User.php");
    
    $firstName = $_POST["firstname"];
    $lastName = $_POST["lastname"];
    $email = $_POST["email"];
    $userName = strtolower($_POST["username"]);
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $confirmPassword = $_POST["confirm"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $province = $_POST["province"];
    $postalCode = $_POST["postalCode"];
    $url = $_POST["url"]; 
    $description = $_POST["desc"];
    $location = $_POST["location"];
    
    $user = new User($userName, $password, $firstName, $lastName, $address, $province, $postalCode,
            $phone, $email, $location, $description, $url, $hash);
    //validate postal code and insert user to database (if postal and province are correct)
    User::PostalValidate($user);
}