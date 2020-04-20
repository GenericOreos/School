<?php 
session_start();
include("Tweet.php");
if(isset($_POST["button"])) {
    $text = trim($_POST["myTweet"]);
    Tweet::SendTweet($text);
}