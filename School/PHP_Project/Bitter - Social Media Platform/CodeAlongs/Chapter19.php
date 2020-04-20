<?php
$myString = "Hello World";
echo md5($myString) . "<BR>";
//iv = initialization vector 
//cbc = cipher block chaining 
//$iv = mcrypt_create_iv(8);
$key = "secret";
$message = openssl_encrypt($myString);
//echo $message . "<BR>";
echo bin2hex("Hello world") . "<BR>";