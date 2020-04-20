<?php

class Student {
    private $name;
    private $studentID;
    protected $address; //accessible in the sub classes
    CONST numCourses = 5; //no dollar sign for constants, all upper-case, cannot be overridden


    //getter
    public function __get($prop) { //two underscores for the getter
        return $this -> $prop;
    }
    //setter
    public function __set($prop, $value) {
        $this -> $prop = $value;
    }
    //constructor - cannot overload constructors or functions
    public function __construct($name, $studentID) {
        $this->studentID = $studentID;
        $this->name = $name;
    }
    //destructor releases memory being used by objects no longer in use 
    public function __destruct() {
        echo "Object destroyed<BR>";
    }
    //static method
    public static function PrintSchool() {
        echo "NBCC <BR>";
    }
    //abstract method
    //public abstract function someMethod();
}
