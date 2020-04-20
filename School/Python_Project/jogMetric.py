#requires installation of mysql connector python (cmd: "pip install mysql-connector-python")
import datetime, os, sys, mysql.connector

#prompt user for date, format it
try:
    dateInput = input("Please enter the date of your run dd/mm/yy: ")
    dateString = datetime.datetime.strptime(dateInput, "%d/%m/%y")
except:
    print("Please enter the date in the proper format dd/mm/yy")
    tryAgain = input("Would you like to try again?")
    if tryAgain.startswith("y") or tryAgain == str("sure") or tryAgain == str("definitely") or tryAgain == str("why not"):
        os.system("jogMetric.py")
    else:
        sys.exit("Goodbye!")

#prompt user for distance, format it from string to float
try:
    distance = float(input("Please enter the total distance ran in KM: "))
except:
    print("Please enter a valid number for distance ran")
    tryAgain = input("Would you like to try again?")
    if tryAgain.startswith("y") or tryAgain == str("sure") or tryAgain == str("definitely") or tryAgain == str("why not"):
        os.system("jogMetric.py")
    else:
        sys.exit("Goodbye!")

#prompt user for time, must be minutes and seconds in mm:ss
try:
    time = input("Please enter total time ran in MM:SS format: ")
except:
    print("Please enter your time in minutes and seconds, using numbers, in mm:ss format")
    tryAgain = input("Would you like to try again?")
    if tryAgain.startswith("y") or tryAgain == str("sure") or tryAgain == str("definitely") or tryAgain == str("why not"):
        os.system("jogMetric.py")
    else:
        sys.exit("Goodbye!")

#take time entered, and split it into an array
timeArray = time.split(':')
minutes = float(timeArray[0])
seconds = float(timeArray[1])
#convert minutes to seconds
seconds2 = float(minutes * 60)
#break down total time to seconds
seconds = float(seconds + seconds2)
#convert time to an hour (or part of an hour)
hour = float(seconds/3600)
hour = round(hour, 2)

#calculate averages speed in km/h - round to two decimal points
perHour = float(distance/hour)
perHour = round(perHour, 2)

#output to user
print(dateString)
print("Total time(hour): ", hour)
print("Average KM per hour: ", perHour)

#prompt user to save their data
save = str.lower(input("Would you like to save your results? "))

if save.startswith("y") or save == str("sure") or save == str("definitely") or save == str("why not"):
    try: # found a great tutorial on working with MySQL here: https://pynative.com/python-mysql-insert-data-into-database-table/
        #connect to the database
        connection = mysql.connector.connect(host="jogmetricdb.cp0yoaz5y5yg.us-east-1.rds.amazonaws.com", database="rundata", user="admin", password="jogmetric")
        #initialize the cursor
        cursor = connection.cursor()
        if(connection.is_connected()):
            print("Connected to database ")
        #insert query #USE A STORED PROCEDURE
        query = "INSERT INTO rundata (run_date, run_distance, run_time, kmh) VALUES (%s, %s, %s, %s)"
        #tuple (list) of variables to replace the placeholders in the query
        record = (str(dateString), str(distance), str(time), str(perHour))
        #execute the query with the input variables
        cursor.execute(query, record)
        #commit changes to the database
        connection.commit()
        print("Record successfully added!")
    except:
        print("An error has occured - database not updated")
    finally:
        cursor.close()
        connection.close()
        print("Connection has closed")

else:
    print("Okay!")
view = input("Would you like to see your run data?")
if view.startswith("y") or view == str("sure") or view == str("definitely") or view == str("why not"):
    try:
        #connect to the database
        connection = mysql.connector.connect(host="jogmetricdb.cp0yoaz5y5yg.us-east-1.rds.amazonaws.com", database="rundata", user="admin", password="jogmetric")
        cursor = connection.cursor()
        if(connection.is_connected()):
            print("Connected to database ")
            query = "SELECT * FROM rundata"
            cursor.execute(query)
            records = cursor.fetchall()
            print("\nPrinting each run record")
        for row in records:
            print("Id = ", row[0], )
            print("Date = ", row[1])
            print("Distance(km)  = ", row[2])
            print("Run time  = ", row[3])
            print("Average speed(km/h)  = ", row[4], "\n")
    except:
        print("An error has occured - could not retrieve data from the database")
    finally:
        if (connection.is_connected()): #close the connection 
            cursor.close()
            connection.close()
            print("Connection has closed")
else:
    print("Sure thing!")
#imported "sys" to use sys.exit, for some reason quit() wasn't working...
sys.exit("Goodbye!")