"use strict";

var $ = function (id) { return document.getElementById(id); };

var calculateChange = function() {    
	
	var quarters = 25;
	var dimes = 10;
	var nickels = 5;
	var pennies = 1;
	
	//old code - commented out
	
   /* if (isNaN(cents) || cents < 0 || cents > 99) {
        alert("Please enter a valid number between 0 and 99");
    } else {
        // calculate the number of quarters
        quarters = cents / 25;  // get number of quarters
        quarters = Math.floor(quarters);
        cents = cents % 25;         // assign the remainder to the cents variable

        // calculate the number of dimes
        dimes = cents / 10;     // get number of dimes
        dimes = Math.floor(dimes);
        cents = cents % 10;         // assign the remainder to the cents variable

        // calculate the number of nickels
        nickels = cents / 5;
        nickels = Math.floor(nickels);

        // calculate the number of nickels and pennies
        pennies = cents % 5;

        // display the results of the calculations
        $("quarters").value = quarters;
        $("dimes").value = dimes;
        $("nickels").value = nickels;
		$("pennies").value = pennies; }
   */ 
   
   //object literal - commented out 
   
   /* coins.cents = $("cents").value;
   
   if (coins.isValid()== false) {
		alert("Please enter a valid number between 0 and 99");
		return false;
	};

	// display the results of the calculations
	$("quarters").value = coins.getNumber(quarters);
	$("dimes").value = coins.getNumber(dimes);
	$("nickels").value = coins.getNumber(nickels);
	$("pennies").value = coins.getNumber(pennies); */
	
	
	//constructor function
	var coin = new Coins($("cents").value);
	
	if(coin.isValid()==false){
		alert("Please enter a valid number between 0 and 99");
		return false;
	}
	$("quarters").value = coin.getNumber(quarters);
	$("dimes").value = coin.getNumber(dimes);
	$("nickels").value = coin.getNumber(nickels);
	$("pennies").value = coin.getNumber(pennies);
};

window.onload = function () {
    $("calculate").onclick = calculateChange;
    $("cents").focus();
};