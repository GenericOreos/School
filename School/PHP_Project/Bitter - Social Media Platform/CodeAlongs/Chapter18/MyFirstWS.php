<?php
//c to f
$temp = $_GET["temp"];
$returnVal = $temp * 1.8 + 32;
$format = $_GET["format"];

if($format == "json") {
    header("content-type: applicaton/json");
    echo json_encode(array("temp"=>$returnVal));
} else {
    header("content-type: text/xml");
    echo"<?xml version=\"1.0\"?>";
    echo "<root>";
    echo "<temp>" . $returnVal ."</temp>";
    echo "</root>";
}