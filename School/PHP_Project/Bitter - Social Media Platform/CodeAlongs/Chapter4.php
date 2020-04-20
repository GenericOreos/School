<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//type-hinting will throw an exception if the type doesn't match 
function AddNumbers(int $x, int $y) {
    return $x + $y;
}//end function


function PrintMessage($x) {
    $x = "Bonjour";
    echo $x."<BR>";
}//end function

//recursive function
function Factorial($num) {
    //base case
    if ($num == 1) {
        return 1;
    }
    else {
        return $num * Factorial($num-1);
    }
}
echo AddNumbers(5, 9)."<BR>";
echo rand(1,6)."<BR>";
echo getrandmax()."<BR>";
echo Factorial(6)."<BR>";
$myMessage = "Hello world!";
PrintMessage($myMessage);