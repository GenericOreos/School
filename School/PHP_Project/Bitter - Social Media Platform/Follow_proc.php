<?php
session_start();
include("connect.php");
include("User.php");

$fromID = $_SESSION["SESS_MEMBER_ID"];
$toID = $_GET["user_id"];
User::FollowUser($fromID, $toID);