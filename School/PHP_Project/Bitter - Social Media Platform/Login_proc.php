<?php 
//verify the user's login credentials. if they are valid redirect them to index.php/
//if they are invalid send them back to login.php
session_start();
if(isset($_POST["username"])) {
    include("connect.php");
    include("User.php");
    $screenName = strtolower($_POST["username"]);
    $password = $_POST["password"];
    User::Login($screenName, $password);
}
