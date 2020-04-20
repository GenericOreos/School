<?php
//chapter 8 - errors and exception handling 
try {
    if (!mysqli_connect("localhost", "username", "password", "schema")) {
        throw new Exception("error connecting to database");
    }
    else{
        echo "Success! <BR>";
    }
}
catch (Exception $ex) {
    error_log("ERROR IN FILE ".$ex->getFile(). " on line # ".$ex->getLine().$ex->getMessage());
    echo "could not connect to database";
    exit;
}
echo "MORE LOGIC HERE<BR>";
?>

