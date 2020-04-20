<?php
$students = array("Nick", "Jim", "John", "Jill");
$jStudents = preg_grep("/^J/", $students); // ^ means beginning of the string
print_r($jStudents);
echo "<BR>";

$myString = "The lion, the witch and the wardrobe";
preg_match_all("/the/i", $myString, $myMatches);  // case insensitive
print_r($myMatches);
echo "<BR>";

$myString2 = "the price is $19.99";
echo preg_quote($myString2)."<BR>";

$myString3 = "PHP is my favourite programming language";
$myString3 = preg_replace("/PHP/", "Java", $myString3);
//preg_filter("/PHP/", "Java", $myString3);
echo $myString3."<BR>";

$myString4 = "this|is|a|sentence";
$myArray = preg_split("/\|/", $myString4);
print_r($myArray);
echo "<BR>";

echo strlen($myString4)."<BR>";

$myString5 = "c'est un café français";
echo htmlentities($myString5)."<BR>";

$myString6 = "Billy O'Donnell";
echo addslashes($myString6."<BR>");

//mysqli_real_escape_string($con, $myString6)."<BR>"; //IMPORTANT - USE THIS FOR INSERT STATEMENTS

$myString7 = "Java <BR> is <BR> awesome";
echo $myString7;
echo "<BR>";
echo strip_tags($myString7);
echo "<BR>";

session_start();
if (isset($_SESSION["name"])){
    echo "You are logged in";
}
else{
    echo "You are not logged in";
}