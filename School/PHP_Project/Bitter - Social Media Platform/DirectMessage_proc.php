<?php
session_start();
include_once("connect.php");
$loginID = $_SESSION["SESS_MEMBER_ID"];
$userName = $_POST['to'];
$messageText = $_POST['message'];

if($messageText == "") {
    $message = "You need to type something first!";        
    header("location: DirectMessage.php?message=$message");
} else {
    $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS, DB_NAME);
    $sql = "SELECT * FROM users where screen_name = '$userName'";
    if($query = mysqli_query($con, $sql)) {
        while($row = mysqli_fetch_array($query)) {
             $msgToID = $row['user_id'];
             $sql2 = "INSERT INTO messages (from_id, to_id, message_text) VALUES ('$loginID','$msgToID', '$messageText')";
             $result = mysqli_query($con, $sql2);
             
             if(mysqli_affected_rows($con) == 1){

               $message = "Message sent!";
               header("location:DirectMessage.php?message=$message");
            } else {
                $message = "Error! Please try again";
                header("location:DirectMessage.php?message=$message");
            }
        }
    }
}
