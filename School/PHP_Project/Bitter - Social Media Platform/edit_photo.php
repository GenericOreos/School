<?php
//this page will allow the user to edit their profile photo
session_start();
if(!isset($_SESSION["SESS_MEMBER_ID"])) {
    header("location:Login.php?");
}
include("Includes/Message.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Be sure to upload a photo to show people who is trolling them. Or use an anime pic if you are a coward.">
    <meta name="author" content="Adam Brewer, adambrewer88@gmail.com">
    <link rel="icon" href="favicon.ico">

    <title>Bitter - Social Media for Trolls, Narcissists, Bullies and Presidents</title>
    
    <!-- Bootstrap core CSS -->
    <link href="includes/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="includes/starter-template.css" rel="stylesheet">
	<!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	
    <script src="includes/bootstrap.min.js"></script>
    
  </head>
  <body
      <?php include("Includes/headernav.php"); ?>
      <?php include("Includes/Message.php"); ?>
        <form action="edit_photo_proc.php" method="post" enctype="multipart/form-data">
            <BR><BR>
                <B>Select your image (Must be under 1MB in size): </B>
                <input type="file" name="pic" accept="image/*" required><br><br>
                <input id="button" type="submit" name="submit" value="Submit">
        </form>
    </body>