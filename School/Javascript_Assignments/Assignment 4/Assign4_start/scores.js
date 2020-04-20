"use strict";

var $ = function (id) { return document.getElementById(id); };

var scoresSplit = localStorage.getItem("scores");
var studentsSplit = localStorage.getItem("students");

console.log("Scores: " + scoresSplit);
console.log("Students: " + studentsSplit);

	if (scoresSplit == null) {
		var scores = [];
	}
	else {
		var scores = scoresSplit.split("-");
	}

	if (studentsSplit == null) {
		var students = [];
	}
	else {
		var students = studentsSplit.split("-");	
	}
	
	

var displayScores = function () {   
    var total = 0;
	//var length = scores.length;
	$("scores").value = "";
	//for loop adds all scores in the scores array
	for (var i = 0; i < scores.length; i++) {
		total += parseFloat(scores[i]);
	}
	var average = total/scores.length;
	average = parseFloat(average).toFixed(2);
	
	$("average_score").value = average;
	
	//for loop outputs contents of students array to the text area
	for (var i = 0; i < students.length; i++) {
		$("scores").value += students[i];
	}
	
};

var addScore = function () {
    //var firstName = $("first_name").value;
	//var lastName = $("last_name").value;
	var score = parseFloat($("score").value);
	var entry = $("last_name").value + ", " + $("first_name").value + " : " + score;

	scores.push(score);
	students.push(entry);
	
	
	for (var i = 0; i < students.length; i++) {
		
		if (students[i].indexOf("\r\n") != -1){
			students[i] = students[i];
		}
		else {
			students[i] = students[i] + " \r\n";
		}
	}	
	
	displayScores();
	
	var scoresString = scores.join("-");
	//console.log("scoresString: " + scoresString);
	var studentsString = students.join("-");
	//console.log("studentsString: " + studentsString);
	
	localStorage.setItem("scores", scoresString);
	localStorage.setItem("students", studentsString);
    
    // get the add form ready for next entry
    $("first_name").value = "";
    $("last_name").value = "";
    $("score").value = "";
    $("first_name").focus();
	
};

var clearScores = function () {   

    // remove the score data from the web page
    $("average_score").value = "";
	$("scores").value = "";
    $("first_name").focus();
	
	var scores = [];
	var students = [];
	
	localStorage.clear();
	sessionStorage.clear();
};

var sortScores = function () {   
    students = students.sort();
	$("scores").value = "";
	
	for (var i = 0; i < students.length; i++) {
		$("scores").value += students[i];
	};
};

window.onload = function () {
    $("add_button").onclick = addScore;
    $("clear_button").onclick = clearScores;    
    $("sort_button").onclick = sortScores;    
    $("first_name").focus();
};