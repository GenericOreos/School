<?php
include("Student.php");//include the file that contains the class git st

//create an instance of the student class
$s = new Student("Adam", "3452345");
$s->studentID = "321";
echo $s -> studentID . "<BR>";
Student::PrintSchool(); //how to call a static method

function DoStuff(Student $s) { //adding "Student" to the argument is not required,
    echo $s->name."<BR>";      //but helps make the code readable - called "type hinting"
}
DoStuff($s);