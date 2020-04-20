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
        $x = 5;
        $myName = "Adam";
        echo $myName."<BR>"; // . is string concatenation
        echo ++$x."<BR>"; //prefix vs postfix - put the ++ before the variable 
        echo $myName.= " Brewer<BR>";
        print "Hello World <BR>";
        ?>
        <!-- short circuit tag --!>
        My name is <?=$myName?> and I am a student at NBCC. <BR >
        
        <?php
        //scalar variables are used to hold a single value
        //boolean, int, float, string
        $value = (bool) true;
        $value = 'hello world';
        $value = 0755; //octal (starts with 0)
        $value = 5;
        echo $value." should be a boolean value <BR>"; //will display most recent value
        
        //arrays - to be covered later
        $students[0] = "Jimmy";
        $students[1] = "Susie";
        $students[2] = "Johnny";
        
        //php variables are case-sensitive
        $x = 50;
        $X = 100; //separate variables
        $myVar = "5";
        $myVar2 = "10";
        //type juggling
        echo $myVar + $myVar2."<BR>";
        echo gettype($myVar2)."<BR>";
        //reference variables
        $myVar2 =& $myVar;
        $myVar = 5600;
        echo $myVar2."<BR>";
        
        const PI = 3.14159;
        //define (PI, 3.14);
        
        echo PI."<BR>"; //no dollar sign on constants!
        
        //Part 2
        echo"<PRE>";
        $count = 0;
        $count ++; //increment the count variable
        echo $count."<BR>";
        if ($count == 0) {
            echo "ZERO<BR>";
        }
        elseif ($count > 0) {
            echo "greater than 0 \r\n";
        }
        else {
            echo $count. " count<BR>";
        }
        echo "</PRE>";
        
        //spaceship operator returns 1, 0, -1 if it's greater than, equal to, or less than
        $a = 1;
        $b = 2;
        echo ($a <=> $b). "<BR>";
        
        //switch statement
        $color = "red";
        switch ($color) {
            case "red":
                echo "RED<BR>";
                break;
            case "blue":
                echo "blue<BR>";
                break;
            default:
                echo "DEFAULT<BR>";
                break;
        }
        //while loop
        while(true) {
            if ($color == "red") break;
        }
        
        //do while loop
        $i = 0;
        do {
            echo pow($i, 2)."<BR>";
            $i++;
        } while ($i < 10);
        
        //for loop
        for($i=0; $i<10; $i++) {
            if ($i == 5) continue; //skip current iteration
        }
        ?>
    </body>
</html>
