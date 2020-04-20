<?php
session_start();
include("connect.php");
if(!isset($_SESSION["SESS_MEMBER_ID"])) {
    header("location:Login.php?");
}
include("Includes/Message.php");
include("User.php");
$loginID = $_SESSION["SESS_MEMBER_ID"];

$sql = "SELECT first_name, last_name, profile_pic, province, date_created FROM users WHERE user_id = '$loginID'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
$firstN = $row['first_name'];
$lastN = $row['last_name'];
$profP = $row['profile_pic'];
$prov = $row['province'];
$dateC = $row['date_created'];
$fullN = $firstN. " " .$lastN;

$tweets = User::TweetStats($loginID);
$followers = User::FollwerStats($loginID);
$following = User::FollowingStats($loginID);
date_default_timezone_set('America/Halifax');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="BITTER: Social Media for Trolls! Who Are You Going to Troll Today?">
    <meta name="author" content="Nick Taggart, nick.taggart@nbcc.ca">
    <link rel="icon" href="favicon.ico">

    <title>Bitter - Social Media for Trolls, Narcissists, Bullies and Presidents</title>

    <!-- Bootstrap core CSS -->
    <link href="includes/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="includes/starter-template.css" rel="stylesheet">
	<!-- Bootstrap core JavaScript-->
    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    
    <script src="includes/bootstrap.min.js"></script>
    
    <script type="text/javascript" src="includes/jquery-3.3.1.min.js"></script>
        <script>
            //just a little jquery, nothing to see here
            function searchUsers(){
                $.get(
                    "CheckUserName.php",
                    $("#to").serializeArray(),
                    function(data) {//anonymous function
                      $("#nameSearch").text(data.msg);
                    },
                    "json" 
                );
                return true;
            }
        </script>        
  </head>

  <body>

    <?php include("Includes/header.php"); ?>
      
	<BR><BR>
    <div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="mainprofile img-rounded">
				<div class="bold">
				<img class="bannericons" src="<?php echo $_SESSION["pic"]?>">
                                    <?php echo $fullN?><BR></div>
				<table>
				<tr><td>
				tweets</td><td>following</td><td>followers</td></tr>
				<tr><td><?php echo $tweets?></td><td><?php echo $following?></td><td><?php echo $followers?></td>
				</tr></table><BR><BR><BR><BR><BR>
				</div><BR><BR>
				<div class="trending img-rounded">
				<div class="bold">Trending</div>
				</div>
				
			</div>
			<div class="col-md-6">
                            <form method="post" id="message_form" action="DirectMessage_proc.php">
                                <div class="form-group">
                                Send message to: <input type="text" id="to" name="to" list="dlUsers"  onkeyup="searchUsers()" autocomplete="off">
                                <span id="nameSearch"></span><br>
                                <datalist id="dlUsers">
                                <!-- this datalist is empty initially but will hold the list of users to select as the user is typing -->
                                </datalist>
                                <input type="hidden" name="userId" value="<?=$loginID?>">
                                <textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter your message here"></textarea>
                                <input type="submit" name="button" id="button" value="Send" class="btn btn-primary btn-lg btn-block login-button"/>
                                </div>
                            </form>
                            <h1>Your Messages</h1><br/>
                            <?php User::GetAllMessages($loginID)?>
			</div>
			<div class="col-md-3">
				<div class="whoToTroll img-rounded">
				<div class="bold">Who to Troll?<BR></div>
				<!-- display people you may know here-->
				<?php         
                                include("Includes/WhoToTroll.php");
                                ?>
				</div><BR>
				<!--don't need this div for now 
				<div class="trending img-rounded">
				© 2018 Bitter
				</div>-->
			</div>
		</div> <!-- end row -->
    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
  <footer><Center><a href="ContactUs.php"><b>Contact Us!</b></a></center></footer>
</html>