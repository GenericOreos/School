<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        $colours[0] = "Red";
        $colours[1] = "Blue";
        $colours[2] = "Green";
        $colours[3] = "Orange";
        //there's an easier way
        $colours = [8=>"Red", 9=>"Blue", 55=>"Green", 20=>"Orange"];
        echo $colours[9]."<BR>";
        
        $grades = ["jimmy" => 98, "johnny" => 66];
        echo $grades["jimmy"]."<BR>";
        
        //2-dimensional array
        $twoDArray = array("jimmy" => array("math" => 98, "science" => 99, "french" => 91), 
                           "johnny" => array("math" => 87, "science" => 93, "frenh" => 100),
                           "suzie" => array("math" => 90, "science" => 78, "french" => 79));
        
        foreach ($twoDArray as $student) {
            echo $student["math"]. " ". $student["science"]."<BR>";
        }
        
        //read from a file
        $students = file("students.txt");
        foreach($students as $student) {
            list($name, $hometown, $gpa) = explode("|", $student);
            echo $name." ".$hometown." ".$gpa."<BR>";
        }
        
        //populate an array with a range
        $myNums = range(0, 100); //or range "A" to "F"
        //to print an array quickly
        print_r($myNums);
        array_unshift($colours, "purple"); //add to the beginning of the array
        array_push($colours, "yellow"); //add to the end of the array
        print_r($colours);
        array_shift($colours); //removes element from the beginning
        array_pop($colours); //removes from the end of the array
        print_r($colours);
        
        if(in_array("Red", $colours)) {
            echo "FOUND<BR>";
        }
        else {
            echo "NOT FOUND<BR>";
        }
        
        //how many items are in the array?
        echo count($myNums)." elements<BR>";
        echo sizeof($colours); //alias of count
        echo "<BR>";
        print_r(array_reverse($colours));
        echo "<BR>";
        print_r(array_flip($colours)); //reverse keys and values
        echo "<BR>";
        
        //sort (ascii order by default)
        //sort($colours);
        sort($colours, SORT_NATURAL);
        natcasesort($colours);
        print_r($colours);
        echo "<BR>";
        $colours2 = array("black", "orange");
        $newArray = array_merge($colours, $colours2);
        print_r($newArray);
        ?>
    </body>
</html>
