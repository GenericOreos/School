<?php
session_start();
date_default_timezone_set('America/Halifax');
require_once 'connect.php';
include('User.php');
include('Tweet.php');
$search = strtolower($_GET["search"]);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Bitter - Social Media for Trolls, Narcissists, Bullies and Presidents</title>

    <!-- Bootstrap core CSS -->
    <link href="includes/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="includes/starter-template.css" rel="stylesheet">
	<!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-1.10.2.js" ></script>
  </head>
<body>
<BR><BR><BR><BR>
<?php include("Includes/header.php"); ?>
<h1>User Search Results</h1> <BR><BR>
<?php 
User::UserSearch($search);
?>
<BR><BR><h1>Tweet Search Results</h1><BR><BR>
<?php 
Tweet::TweetSearch($search);
?>
<BR><BR><BR><BR>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="includes/bootstrap.min.js"></script>
</body>
  
<footer><Center><a href="ContactUs.php"><b>Contact Us!</b></a></center></footer>

</html>