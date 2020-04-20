var $ = function (id) { return document.getElementById(id); };

var currentDate = new Date(2015, 1, 15);

var getMonthText = function(currentMonth) {
    //you must finish writing this function
	//it must return a string representation of the current month (ie: January)
	
	var date = new Date(2015, 1, 15);
    var monthName = new Array("January", "February", "March", "April", "May", "June" , "July", "August", "September", "October", "November", "December");
    return monthName[date.getMonth()] //returns the month by name
};

var getLastDayofMonth = function(currentMonth) {
	//you must finish writing this function
	//function must return the last day of the current month
	//so if today is January 22, 2019 the function will return January 31, 2019
	//if today was February 14, 2016 the function would return February 29th, 2016
	
	var endOfMonth = new Date(2015, 1, 15); //current date
	endOfMonth.setMonth(endOfMonth.getMonth() + 1); //set the month ahead by one
	endOfMonth.setDate(0); //move the date to one day before the start of the month, which will be the last day of the previous month
	return endOfMonth.getDate(); 
	
};

window.onload = function () {
    //you must finish writing this function
	$("month_year").firstChild.nodeValue = getMonthText() + " " + currentDate.getFullYear();

	currentDate.setDate(1); // set date object to start on 1
	
	var numberDays = getLastDayofMonth(currentDate.getMonth()) //number of days in the current month
	var weekDay = currentDate.getDay(); //day of the week 
	var date = 1; //calendar date, starting with 1
	var count = 0; //loop counter
	var weekOne = true; //keeps track of the first week of the month, in order to apply any blank space before the 1st
	
	while (date <= numberDays)
    {
        var row = document.createElement("tr");
        $("calendar").appendChild(row);
 
        if(weekOne == true)
        {
            while(count < weekDay)  //applies blank space to cells before the 1st of the month
            {
                var day = document.createElement("td"); 
                row.appendChild(day);
                day.innerHTML = "";
                count += 1;
            }
            weekOne = false;
        }
            while(count <= 6) //loop to make rows until 6 rows have been created
            {
                if(date<= numberDays)
                {
                    var day = document.createElement("td"); //adds date to each cell
                    row.appendChild(day);
                    day.innerHTML = date;
                    date += 1;
                }
                else
                {
                    var day = document.createElement("td"); //adds blank cells after last day of month
                    row.appendChild(day);
                    day.innerHTML = "";
                }
                count += 1;
            }
            count =0;
       
    }
 
};