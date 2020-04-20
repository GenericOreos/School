<?php
session_start();
include("Tweet.php");
if(isset($_POST["btn"])) {
    $origID = $_GET['tweet_id'];
    $text = trim($_POST["myReply"]);
    Tweet::SendReply($text, $origID);
}