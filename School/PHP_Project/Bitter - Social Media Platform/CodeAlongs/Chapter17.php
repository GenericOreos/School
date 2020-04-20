<?php
//chaoter 17 - sessions
//a cookie is a small text file stored on your computer - 4KB - limited size and security issues
//session replaced cookies, and are stored on the RAM of the server
session_start(); //must always start the session - this must go before anything else 
$_SESSION["name"] = "Adam";//this would be similar to what will be on login_proc
$_SESSION["password"] = "Password";
echo $_SESSION["name"]."<BR>"; //retrieve session data

//for debugging purposes - not meant for users to see
echo session_id()." my session ID <BR>";
echo session_encode()." all session vars";
session_unset(); //free all session variables 
session_destroy(); //completely ends the session 