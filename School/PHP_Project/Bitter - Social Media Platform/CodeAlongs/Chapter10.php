<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$path = "c:\php\students.txt";
printf("file size: %s bytes <BR>", filesize($path)); //displays 12 (bytes)
printf("file name: %s <BR>", basename($path));
printf("folder name: %s <BR>", dirname($path));

//relative file paths
$relPath = "../images/logo.jpg";
echo "absolute path is " . realpath($relPath) . "<BR>";
echo "DISK SPACE REMAINING: " . disk_free_space('c:'). " bytes" . "<BR>";
echo "TOTAL DISK SPACE: " . disk_total_space('c:'). " bytes" . "<BR>";

date_default_timezone_set("America/Halifax");
echo "file last accessed " . date("m-d-y g:i:s", fileatime($relPath)) . "<BR>";
echo "file last modified " . date("m-d-y g:i:s", filemtime($relPath)) . "<BR>";

//open the file
//r means read
//w means write
//x means create
//w+ means read and write
//a means append
$myFile = fopen($path, "a+");
while(!feof($myFile)){
    echo fread($myFile, 5) . "<BE>";
}
