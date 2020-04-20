<?php
session_start();
include("connect.php");
$like_from_id = $_SESSION["SESS_MEMBER_ID"];
$like_tweet_id = $_GET["tweet_id"];
$sql = "DELETE FROM likes WHERE(tweet_id = $like_tweet_id) AND (user_id = $like_from_id)";
//echo $sql;
$query = mysqli_query($con, $sql);

if(mysqli_affected_rows($con) == 1){
   $message = "You unliked this tweet";
   header("location:index.php?message=$message");
} else {
    $message = "Error! Please try again!";
    header("location:index.php?message=$message");
}