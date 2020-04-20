<?php

//log the user out and redirect them back to the login page.
session_start();
unset($_SESSION["SESS_MEMBER_ID"]);
session_destroy();
header('Location: login.php');
?>
