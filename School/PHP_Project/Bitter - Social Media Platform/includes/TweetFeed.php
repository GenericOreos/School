<?php
include("Tweet.php");
date_default_timezone_set('America/Halifax');
$userID = $_SESSION["SESS_MEMBER_ID"];
Tweet::ShowFeed($userID);