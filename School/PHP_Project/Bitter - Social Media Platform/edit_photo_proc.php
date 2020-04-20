<?php 
session_start();
include("User.php");
    if(isset($_POST['submit'])) {
        include("connect.php");
        $sess = $_SESSION["SESS_MEMBER_ID"];
        User::UploadPic($sess);
}

    