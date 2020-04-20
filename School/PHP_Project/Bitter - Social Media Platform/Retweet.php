<?php
session_start();
include("Tweet.php");
$origID = $_GET['tweet_id'];
$userID = $_SESSION["SESS_MEMBER_ID"];
$tweetText = $_GET['tweet_text'];
Tweet::SendRetweet($origID, $tweetText);