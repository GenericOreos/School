<?php
session_start();
date_default_timezone_set('America/Halifax');
include("connect.php");
include("Tweet.php");
include("User.php");
if(!isset($_SESSION["SESS_MEMBER_ID"])) {
    header("location:Login.php?");
}
include("Includes/Message.php");
$login_id = $_SESSION["SESS_MEMBER_ID"];
$user_id = $_GET["user_id"];
$firstName = $_GET["first_name"];
$lastName = $_GET["last_name"];
$profPic = $_GET["profile_pic"];
$province = $_GET['province'];
$dateCreated = $_GET['date_created'];    
$fullName = $firstName.' '.$lastName;

$tweets = User::TweetStats($user_id);
$followers = User::FollwerStats($user_id);
$following = User::FollowingStats($user_id);
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

    <?php include("Includes/header.php"); ?>
	
	<BR><BR>
    <div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="mainprofile img-rounded">
				<div class="bold">
				<img class="bannericons" src="<?php echo $profPic?>">
				<?php echo $fullName?><BR></div>
				<table>
				<tr><td>
				tweets</td><td>following</td><td>followers</td></tr>
				<tr><td><?php echo $tweets?></td><td><?php echo $following?></td><td><?php echo $followers?></td>
				</tr></table>
				<img class="icon" src="images/location_icon.jpg"><?php echo $province?>
				<div class="bold">Member Since:</div>
				<div><?php echo $dateCreated?></div>
				</div><BR><BR>
				
				<div class="trending img-rounded">
				<div class="bold"> &nbsp;Followers you know<BR>
                                    <?php User::FollowersYouKnow($login_id, $user_id) ?>
				</div>
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="img-rounded">
					<?php 
                                        Tweet::UserFeed($user_id); ?>
				</div>
				<div class="img-rounded">
				
				</div>
			</div>
			<div class="col-md-3">
				<div class="whoToTroll img-rounded">
				<div class="bold">Who to Troll?<BR></div>
                                    <?php include("Includes/WhoToTroll.php"); ?>
				
				</div><BR>
				
			</div>
		</div> <!-- end row -->
    </div><!-- /.container -->

	

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="includes/bootstrap.min.js"></script>
    
  </body>
</html>
