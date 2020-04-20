"use strict";

var $ = function (id) { return document.getElementById(id); };

//object literal

var coins = {
	cents: "",
	isValid: function() {
		if (isNaN(this.cents) || this.cents < 0 || this.cents > 99 || this.cents == "") { 
		return false; }
	}, //end of isValid function
	getNumber: function(divisor) {
		var change = Math.floor(this.cents/divisor);
		this.cents = this.cents % divisor;
		return change;
	} //end of getNumber function 
	
};//end of coins object literal 

var Coins = function(cents) {
	this.cents = cents;
	this.isValid = function () {
		if (isNaN(this.cents) || this.cents < 0 || this.cents > 99 || this.cents == "") { 
		return false; }
	};//end of isValid function
	this.getNumber = function(divisor) {
		var change = Math.floor(this.cents/divisor);
		this.cents = this.cents % divisor;
		return change;
	};//end of getNumber function
}