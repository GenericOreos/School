<?php
class Tweet {
    private $tweetId;
    private $tweetText;
    private $userId;
    private $originalTweetId;
    private $replyToTweetId;
    private $dateAdded;
    
    //getter
    public function __get($prop) { //two underscores for the getter
        return $this -> $prop;
    }
    //setter
    public function __set($prop, $value) {
        $this -> $prop = $value;
    }
    //constructor
    public function __construct($tweetText, $userId) {
        //$this->dateAdded = $dateAdded;
        //$this->originalTweetId = $originalTweetId;
        //$this->replyToTweetId = $replyToTweetId;
        //$this->tweetId = $tweetId;
        $this->tweetText = $tweetText;
        $this->userId = $userId;
    }
    //destructor
    public function __destruct() {
        echo "Object destroyed<BR>";
    }
    public static function ShowFeed($userID) {
        require_once("connect.php"); 
        $user_id = $_SESSION["SESS_MEMBER_ID"];
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT users.user_id, users.first_name, users.last_name, users.screen_name, users.province, users.date_created, users.profile_pic, tweets.tweet_id, "
                . "tweets.tweet_text, tweets.original_tweet_id, tweets.reply_to_tweet_id, tweets.date_created FROM users INNER JOIN tweets ON tweets.user_id = users.user_id "
                . "WHERE users.user_id IN (SELECT to_id FROM follows WHERE follows.from_id = '$userID') OR users.user_id = '$userID' ORDER BY tweets.date_created DESC LIMIT 10";
        $now = new DateTime();
        if ($query = mysqli_query($con, $sql)) {
            while($row = mysqli_fetch_array($query)) {
                $dateTweeted = $row['date_created'];
                $tweetTime = new DateTime($dateTweeted);
                $interval = $tweetTime->diff($now);
                $owner = $row['first_name']. " " .$row['last_name'];
                echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].'&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'">'
                        .$row['first_name']. " " .$row['last_name'] . " @" . $row['screen_name'] ."</a>". " ";
                    if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                    elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                    elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                    elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                    elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                    elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                    elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                    elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                    elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                    elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                    elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago";
                    elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
        if($row['original_tweet_id'] != 0) {echo "<b> retweeted from ".$owner."</b>";}
        if($row['reply_to_tweet_id'] != 0) {echo "<b><i> replied</i></b>";}
        $like = (Tweet::AlreadyLiked($user_id, $row["tweet_id"]))? "<a href='Unlike.php?tweet_id=".$row["tweet_id"]."'><BR><BR> <img class='border' src='../Images/liked.png' height='40' width='40'/></a>"
                : "<a href='Like.php?tweet_id=".$row["tweet_id"]."'><BR><BR> <img class='border' src='../Images/like.ico' height='40' width='40'/></a>";
        echo "<BR>". $row['tweet_text'] .$like. " </a>"
                    ."<a href='Retweet.php?tweet_id=".$row['tweet_id']."&tweet_text=".$row['tweet_text']."'><img class='border' src='../Images/retweet.png' height='40' width='40'/> </a> "
                    ."<button type ='button' name='btnReply' id='btnReply'><img class='border' src='../Images/reply.png' height='40' width='40'/></button><BR><BR><HR>"
                    ."<div class='img-rounded'><form method='post' id='reply_form' action='Reply.php?tweet_id=".$row['tweet_id']."'>"
		."<div class='form-group'><textarea class='form-control' name='myReply' id='myReply' rows='1' placeholder='Do you dare to reply?'></textarea> <BR>"
        ."<input type='submit' name='btn' id='btn' value='Reply' class='btn btn-primary btn-lg btn-block login-button'/><BR><BR><HR></div></form></div>";}}
    }// end of ShowFeed
    public static function UserFeed($userID) { 
        require_once("connect.php"); 
        $user_id = $_SESSION["SESS_MEMBER_ID"];
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT users.user_id, users.first_name, users.last_name, users.screen_name, users.province, users.date_created, users.profile_pic, tweets.tweet_id, tweets.tweet_text, tweets.original_tweet_id, tweets.reply_to_tweet_id, tweets.date_created FROM users INNER JOIN tweets ON tweets.user_id = users.user_id WHERE users.user_id = '$userID' ORDER BY tweets.date_created DESC LIMIT 10";
        $now = new DateTime();
        if ($query = mysqli_query($con, $sql)) {
            while($row = mysqli_fetch_array($query)) {
                $dateTweeted = $row['date_created'];
                $tweetTime = new DateTime($dateTweeted);
                $interval = $tweetTime->diff($now);
                $owner = $row['first_name']. " " .$row['last_name'];
                echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].'&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'">'
                        .$row['first_name']. " " .$row['last_name'] . " @" . $row['screen_name'] ."</a>". " ";
                    if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                    elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                    elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                    elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                    elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                    elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                    elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                    elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                    elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                    elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                    elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago"; 
                    elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
        if($row['original_tweet_id'] != 0) {echo "<b> retweeted from ".$owner."</b>";}
        if($row['reply_to_tweet_id'] != 0) {echo "<b><i> replied</i></b>";}
        $like = (Tweet::AlreadyLiked($user_id, $row["tweet_id"]))? "<a href='Unlike.php?tweet_id=".$row["tweet_id"]."'><BR><BR> <img class='border' src='../Images/liked.png' height='40' width='40'/></a>"
                : "<a href='Like.php?tweet_id=".$row["tweet_id"]."'><BR><BR> <img class='border' src='../Images/like.ico' height='40' width='40'/></a>";
        echo "<BR>". $row['tweet_text'] .$like."</a>"
                    ."<a href='Retweet.php?tweet_id=".$row['tweet_id']."&tweet_text=".$row['tweet_text']."'><img class='border' src='../Images/retweet.png' height='40' width='40'/></a> "
                    ."<button type ='button' name='btnReply' id='btnReply'><img class='border' src='../Images/reply.png' height='40' width='40'/></button><BR><BR><HR>"
                    ."<div class='img-rounded'><form method='post' id='reply_form' action='Reply.php?tweet_id=".$row['tweet_id']."'>"
		."<div class='form-group'><textarea class='form-control' name='myReply' id='myReply' rows='1' placeholder='Do you dare to reply?'></textarea> <BR>"
        ."<input type='submit' name='btn' id='btn' value='Reply' class='btn btn-primary btn-lg btn-block login-button'/><BR><BR><HR></div></form></div>";}}
    }// end of UserFeed
    public static function SendTweet($text) {
        if($text == "") {
        $message = "You need to type something first!";        
        header("location: index.php?message=$message");
        } else {
        include("connect.php");
        $userID = $_SESSION["SESS_MEMBER_ID"];
        $tweet = "INSERT INTO tweets (tweet_text, user_id) VALUES ('$text', '$userID')";
        $postTweet = mysqli_query($con, $tweet);
        
        if(mysqli_affected_rows($con) == 1){

               $message = "Nice tweet";
               header("location:index.php?message=$message");
            } else {
                $message = "Error! Please try again!";
                header("location:index.php?message=$message");
            }
        }
    }//end of SendTweet()
    public static function SendRetweet($tweetID, $tweetText) {
        include("connect.php");
        $userID = $_SESSION["SESS_MEMBER_ID"];
        $tweet = "INSERT INTO tweets (tweet_text, user_id, original_tweet_id) VALUES ('$tweetText', '$userID', '$tweetID')";
        $insertTweet = mysqli_query($con, $tweet);
        if(mysqli_affected_rows($con) > 0){

               $message = "Retweet successful!";
               header("location:index.php?message=$message");
            } else {
                $message = "Error! Please try again!";
                header("location:index.php?message=$message");
            }
    }//end of SendRetweet()
    public static function SendReply($tweetText, $tweetID) {
        if($tweetText == "") {
        $message = "You need to type something first!";        
        header("location: index.php?message=$message");
        } else {
        include("connect.php");
        $userID = $_SESSION["SESS_MEMBER_ID"];
        $tweet = "INSERT INTO tweets (tweet_text, user_id, reply_to_tweet_id) VALUES ('$tweetText', '$userID', '$tweetID')";
        $postTweet = mysqli_query($con, $tweet);
        
        if(mysqli_affected_rows($con) > 0){

               $message = "Reply successful";
               header("location:index.php?message=$message");
            } else {
                $message = "Error! Please try again!";
                header("location:index.php?message=$message");
            }
        }
    }//end of SendReply()
    public static function TweetSearch($search){
        $sql = "SELECT users.user_id, users.first_name, users.last_name, users.screen_name, users.province, users.date_created, users.profile_pic, tweets.tweet_id, tweets.tweet_text, "
                . "tweets.original_tweet_id, tweets.reply_to_tweet_id, tweets.date_created FROM users INNER JOIN tweets ON tweets.user_id = users.user_id";
        $now = new DateTime();
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $query = mysqli_query($con, $sql);
        
        while($row = mysqli_fetch_array($query)){
            $text = strtolower($row['tweet_text']);
            $textArray = explode(" ", $text);
        if (in_array($search, $textArray) || strpos($text, $search)) {
               $dateTweeted = $row['date_created'];
                $tweetTime = new DateTime($dateTweeted);
                $interval = $tweetTime->diff($now);
                $owner = $row['first_name']. " " .$row['last_name'];
                echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].'&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'">'
                        .$row['first_name']. " " .$row['last_name'] . " @" . $row['screen_name'] ."</a>". " ";
                    if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                    elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                    elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                    elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                    elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                    elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                    elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                    elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                    elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                    elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                    elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago"; 
                    elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
        if($row['original_tweet_id'] != 0) {echo "<b> retweeted from ".$owner."</b>";}
        if($row['reply_to_tweet_id'] != 0) {echo "<b><i> replied</i></b>";}
        echo "<BR>" . $row['tweet_text'] ."<BR><BR> <img class='border' src='../Images/like.ico' height='40' width='40'/> "
                    ."<a href='Retweet.php?tweet_id=".$row['tweet_id']."&tweet_text=".$row['tweet_text']."'><img class='border' src='../Images/retweet.png' height='40' width='40'/></a> "
                    ."<button type ='button' name='btnReply' id='btnReply'><img class='border' src='../Images/reply.png' height='40' width='40'/></button><BR><BR><HR>"
                    ."<div class='img-rounded'><form method='post' id='reply_form' action='Reply.php?tweet_id=".$row['tweet_id']."'>"
		."<div class='form-group'><textarea class='form-control' name='myReply' id='myReply' rows='1' style=width:30% placeholder='Do you dare to reply?'></textarea> <BR>"
		."<input type='submit' name='btn' id='btn' value='Reply' style=width:30% class='btn btn-primary btn-lg btn-block login-button'/><BR><BR><HR></div></form></div>";
            }
        }
    }//end of funciton
    public static function AlreadyLiked($userID, $tweetID) {
        require_once("connect.php"); 
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT tweets.tweet_id, tweets.tweet_text, tweets.user_id, likes.like_id, likes.tweet_id, likes.user_id FROM tweets"
                . " INNER JOIN likes ON tweets.tweet_id = likes.tweet_id WHERE likes.user_id = '$userID' AND tweets.tweet_id = '$tweetID'";
        $result = mysqli_query($con, $sql);
        if(mysqli_num_rows($result) != 0) {
            return true;
        } else {
            return false;
        }
    }
    public static function ReplyNotifications($userID){
        require_once("connect.php");
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT users.user_id, users.first_name, users.last_name, users.screen_name, users.province, users.date_created, users.profile_pic, tweets.tweet_id,"
                ." tweets.tweet_text, tweets.original_tweet_id, tweets.reply_to_tweet_id, tweets.date_created FROM users INNER JOIN tweets ON tweets.user_id = users.user_id"
                ." WHERE tweets.reply_to_tweet_id IN (SELECT tweets.tweet_id FROM tweets WHERE user_id = '$userID')  ORDER BY tweets.date_created DESC";
        $query = mysqli_query($con, $sql);
        $now = new DateTime();
        while($row = mysqli_fetch_array($query)){
             $dateTweeted = $row['date_created'];
            $tweetTime = new DateTime($dateTweeted);
            $interval = $tweetTime->diff($now);
            $owner = $row['first_name']. " " .$row['last_name'];
            echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].'&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'">'
                    .$row['first_name']. " " .$row['last_name'] . " @" . $row['screen_name'] ."</a>". " replied to your tweet ";
                if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago";
                elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
            $like = (Tweet::AlreadyLiked($userID, $row["tweet_id"]))? "<a href='Unlike.php?tweet_id=".$row["tweet_id"]."'><BR><BR> <img class='border' src='../Images/liked.png' height='40' width='40'/></a>"
                : "<a href='Like.php?tweet_id=".$row["tweet_id"]."'><BR><BR> <img class='border' src='../Images/like.ico' height='40' width='40'/></a>";
            echo "<BR>". $row['tweet_text'] .$like."</a>"
                    ."<a href='Retweet.php?tweet_id=".$row['tweet_id']."&tweet_text=".$row['tweet_text']."'><img class='border' src='../Images/retweet.png' height='40' width='40'/></a> "
                    ."<button type ='button' name='btnReply' id='btnReply'><img class='border' src='../Images/reply.png' height='40' width='40'/></button><BR><BR><HR>"
                    ."<div class='img-rounded'><form method='post' id='reply_form' action='Reply.php?tweet_id=".$row['tweet_id']."'>"
                    ."<div class='form-group'><textarea class='form-control' name='myReply' id='myReply' rows='1' placeholder='Do you dare to reply?'></textarea> <BR>"
                    ."<input type='submit' name='btn' id='btn' value='Reply' class='btn btn-primary btn-lg btn-block login-button'/><BR><BR><HR></div></form></div>";        
        }
    } //end of function
    public static function LikeNotifications($userID) {
         require_once("connect.php");
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
//        $sql = "SELECT users.user_id, users.first_name, users.last_name, users.screen_name, users.province, users.date_created, users.profile_pic, tweets.tweet_id,"
//                ." tweets.tweet_text, tweets.original_tweet_id, tweets.reply_to_tweet_id, tweets.date_created, likes.like_id, likes.tweet_id, likes.user_id"
//                ." FROM users INNER JOIN tweets ON tweets.user_id = users.user_id INNER JOIN likes ON likes.tweet_id = tweets.tweet_id"
//                ." WHERE tweets.tweet_id IN (SELECT tweets.tweet_id FROM tweets WHERE user_id = '$userID')  ORDER BY tweets.date_created DESC";
        $sql = "SELECT likes.user_id, likes.tweet_id, likes.date_created, tweets.tweet_text FROM likes INNER JOIN tweets ON tweets.tweet_id = likes.tweet_id WHERE tweets.tweet_id IN (SELECT tweet_id FROM tweets WHERE user_id = '$userID')"
            . " ORDER BY date_created DESC";
        $query = mysqli_query($con, $sql);
        $now = new DateTime();
        while($row = mysqli_fetch_array($query)){
            $sql2 = "SELECT users.user_id, users.first_name, users.last_name, users.province, users.date_created, users.profile_pic, users.screen_name, (SELECT tweet_text FROM tweets WHERE tweet_id = " . $row["tweet_id"] .  ") AS message FROM users WHERE users.user_id = " 
                        . $row["user_id"];
            $result = mysqli_query($con, $sql2);
            while($row2 = mysqli_fetch_array($result)){
            $dateTweeted = $row['date_created'];
            $tweetTime = new DateTime($dateTweeted);
            $interval = $tweetTime->diff($now);
            echo '<a href = "userpage.php?user_id='.$row2['user_id'].'&province='.$row2['province'].'&date_created='.$row2['date_created'].'&first_name='.$row2['first_name'].'&last_name='.$row2['last_name'].'&profile_pic='.$row2['profile_pic'].'">'
                    .$row2['first_name']. " " .$row2['last_name'] . " @" . $row2['screen_name'] ."</a>". " liked your tweet ";
                if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago";
                elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
            echo "<BR>". $row['tweet_text'] ."</a><BR><BR><HR>";
            }
        }
    } //end of function
    public static function RetweetNotifications($userID) {
        require_once("connect.php");
        $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
        $sql = "SELECT users.user_id, users.first_name, users.last_name, users.screen_name, users.province, users.date_created, users.profile_pic, tweets.tweet_id,"
                ." tweets.tweet_text, tweets.original_tweet_id, tweets.reply_to_tweet_id, tweets.date_created FROM users INNER JOIN tweets ON tweets.user_id = users.user_id"
                ." WHERE tweets.original_tweet_id IN (SELECT tweets.tweet_id FROM tweets WHERE user_id = '$userID')  ORDER BY tweets.date_created DESC";
        $query = mysqli_query($con, $sql);
        $now = new DateTime();
        while($row = mysqli_fetch_array($query)){
             $dateTweeted = $row['date_created'];
            $tweetTime = new DateTime($dateTweeted);
            $interval = $tweetTime->diff($now);
            echo '<a href = "userpage.php?user_id='.$row['user_id'].'&province='.$row['province'].'&date_created='.$row['date_created'].'&first_name='.$row['first_name'].'&last_name='.$row['last_name'].'&profile_pic='.$row['profile_pic'].'">'
                    .$row['first_name']. " " .$row['last_name'] . " @" . $row['screen_name'] ."</a>". " retweeted you ";
                if ($interval->y > 1) echo $interval->format('%y years') . " ago"; 
                elseif ($interval->y > 0) echo $interval->format('%y year') . " ago"; 
                elseif ($interval->m > 1) echo $interval->format('%m months') . " ago"; 
                elseif ($interval->m > 0) echo $interval->format('%m month') . " ago"; 
                elseif ($interval->d > 1) echo $interval->format('%d days') . " ago"; 
                elseif ($interval->d > 0) echo $interval->format('%d day') . " ago"; 
                elseif ($interval->h > 1) echo $interval->format('%h hours') . " ago"; 
                elseif ($interval->h > 0) echo $interval->format('%h hour') . " ago"; 
                elseif ($interval->i > 1) echo $interval->format('%i minutes') . " ago"; 
                elseif ($interval->i > 0) echo $interval->format('%i minute') . " ago"; 
                elseif ($interval->s > 1) echo $interval->format('%s seconds') . " ago";
                elseif ($interval->s > 0) echo $interval->format('%s second') . " ago";
        echo "<BR>". $row['tweet_text']."<BR><BR><HR>";
        }
    }//end of function
}