"use strict";
var $ = function(id) { return document.getElementById(id); };


var clearTextBoxes = function() {
    $("degrees_entered").value = "";
    $("degrees_computed").value = "";
};

window.onload = function() {
    $("convert").onclick = convertTemp;
    $("to_celsius").onclick = toCelsius;
    $("to_fahrenheit").onclick = toFahrenheit;
	$("degrees_entered").focus();
};

var toCelsius = function () {
	clearTextBoxes();
	$("degrees_entered").focus();
	$("degree_label_1").firstChild.nodeValue = "Enter F degrees:";
	$("degree_label_2").firstChild.nodeValue = "Degrees Celsius:";
};

var toFahrenheit = function() {
	clearTextBoxes();
	$("degrees_entered").focus();
	$("degree_label_1").firstChild.nodeValue = "Enter C degrees:";
	$("degree_label_2").firstChild.nodeValue = "Degrees Fahrenheit:";
	
};

var convertTemp = function () {
	//start with a console.log at the beginning of each function - to track where the program is at that moment
console.log("Inside convertTemp function");
	var tempEntered = $("degrees_entered").value;
	var tempConverted = 0;
	
	if (isNaN($("degrees_entered").value)) {
console.log("Inside convertTemp function, IF statement");
		alert("You must enter a valid number for degrees.");
		clearTextBoxes();
		$("degrees_entered").focus();
		
	}
	else {
console.log("Inside convertTemp function, ELSE statement");
		if ($("to_celsius").checked) {
console.log("Inside convertTemp function, IF/ELSE statement");
			tempConverted = (tempEntered - 32) * 0.5556;
			tempConverted = parseInt(tempConverted);
			$("degrees_computed").value = tempConverted;
		}
		else if ($("to_fahrenheit").checked) {
console.log("Inside convertTemp function, IF/ELSE IF statement");
			tempConverted = (tempEntered * 1.8) + 32;
			tempConverted = parseInt(tempConverted);
			$("degrees_computed").value = tempConverted;
		}
	}	
	console.log("end of convertTemp function");
};









