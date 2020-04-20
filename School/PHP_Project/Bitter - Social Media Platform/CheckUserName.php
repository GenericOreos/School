<?php
$userName = $_GET['to'];

// Connect to database - CHANGE THIS TO YOUR DB SCHEMA NAME
$db = mysqli_connect("localhost", "root", "","bitter-adambrewer")
		or die(mysql_error());
$strSql = "select * from users where screen_name='$userName'";

if($result = mysqli_query($db, $strSql)) {
    if (mysqli_num_rows($result) > 0) {
        $json_out = '{"msg":"Message this user!"}'; //must use curly braces for json
        
    }
    else{
        $json_out = '{"msg":"User not found"}';
    }                
}
echo $json_out;
