/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package selenium_final;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;

/**
 *
 * @author adamb
 */
public class Selenium_Final {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) throws InterruptedException {
        // Set the path to the ChromeDriver executable.
        System.setProperty("webdriver.chrome.driver", "C:\\chromedriver\\chromedriver.exe");
        // Instantiate a new ChromeDriver.
        WebDriver driver = new ChromeDriver();
        
        //Let the testing begin!
        
        //click the "Click Here" link to move to the Signup page 
        //EXPECTED RESULT: PASS
        boolean Test01 = UnitTests.ClickSignupLink(driver);
        System.out.println("Test 01: Click Signup Link: " + Test01);
        
        //Attempt to sign up with incorrect information (first name blank)
        //EXPECTED RESULT: FAIL
        boolean Test02 = UnitTests.CreateAccount(driver, "", "Brewer", "email@email.com", "thisismyscreenname", "qqqqq", "qqqqq", "(506)555-5555", "234 Main Street", 
                "Ontario", "M5H 2G4", "google.com", "hello", "Toronto");
        System.out.println("Test 02: Sign up with incorrect information (first name blank): " + Test02);
        
        //Attempt to sign up with incorrect information (password and confirm password mismatch)
        //EXPECTED RESULT: FAIL
        boolean Test03 = UnitTests.CreateAccount(driver, "Adam", "Brewer", "email@email.com", "thisismyscreenname", "qqqqq", "11111", "(506)555-5555", "234 Main Street", 
                "Ontario", "M5H 2G4", "google.com", "hello", "Toronto");
        System.out.println("Test 03: Sign up with incorrect information (password/confirm password mismatch): " + Test03);
        
        //Attempt to sign up with incorrect information (incorrect phone number format)
        //EXPECTED RESULT: FAIL
        boolean Test04 = UnitTests.CreateAccount(driver, "Adam", "Brewer", "email@email.com", "thisismyscreenname", "qqqqq", "qqqqq", "5555555", "234 Main Street", 
                "Ontario", "M5H 2G4", "google.com", "hello", "Toronto");
        System.out.println("Test 04: Sign up with incorrect information (incorrect phone number format): " + Test04);
        
        //Attempt to sign up with incorrect information (postal code wrong provice)
        //EXPECTED RESULT: FAIL
        boolean Test05 = UnitTests.CreateAccount(driver, "Adam", "Brewer", "email@email.com", "thisismyscreenname", "qqqqq", "qqqqq", "(506)555-5555", "234 Main Street", 
                "Ontario", "E3B 3B4", "google.com", "hello", "Toronto");
        System.out.println("Test 05: Sign up with incorrect information (postal code/province mismatch): " + Test05);
        
        //Attempt to sign up with correct information
        //EXPECTED RESULT: PASS
        boolean Test06 = UnitTests.CreateAccount(driver, "Fake", "Name", "email@email.com", "usethisone", "qqqqq", "qqqqq", "(506)555-5555", "234 Main Street", 
                "Ontario", "M5H 2G4", "google.com", "hello", "Toronto");
        System.out.println("Test 06: Sign up with correct information: " + Test06);
        
        //Attempt to sign up with username that already exists
        //EXPECTED RESULT: FAIL
        boolean Test07 = UnitTests.CreateAccount(driver, "Adam", "Brewer", "email@email.com", "thisismyscreenname", "qqqqq", "qqqqq", "(506)555-5555", "234 Main Street", 
                "Ontario", "M5H 2G4", "google.com", "hello", "Toronto");
        System.out.println("Test 07: Create account with duplicate username: " + Test07);
        
        //Attempt to login without username or password
        //EXPECTED RESULT: FAIL
        boolean Test08 = UnitTests.Login(driver, " ", " ");
        System.out.println("Test 08: Attempt to login without entering login credentials: " + Test08);
        
        //Attempt to login without username or password
        //EXPECTED RESULT: FAIL
        boolean Test09 = UnitTests.Login(driver, "thisisadam", "q");
        System.out.println("Test 09: Attempt to login with incorrect password: " + Test09);
        
        //Attempt to login with valid credentials
        //EXPECTED RESULT: PASS
        boolean Test10 = UnitTests.Login(driver, "thisisadam", "qqqqq");
        System.out.println("Test 10: Attempt to login with valid credentials: " + Test10);
        
        //Attempt to send a blank tweet
        //EXPECTED RESULT: FAIL
        boolean Test11 = UnitTests.Tweet(driver, "");
        System.out.println("Test 11: Attempt to send a blank tweet: " + Test11);
        
        //Attempt to send a tweet
        //EXPECTED RESULT: PASS
        boolean Test12 = UnitTests.Tweet(driver, "test");
        System.out.println("Test 12: Attempt to send a tweet: " + Test12);

        //Attempt to click on "Contact Us" link in header
        //EXPECTED RESULT: PASS
        boolean Test13 = UnitTests.ContactUs(driver);
        System.out.println("Test 13: Attempt to click \"Contact Us\": " + Test13);
        
        //Attempt to use search function
        //EXPECTED RESULT: PASS
        boolean Test14 = UnitTests.Search(driver, "test");
        System.out.println("Test 14: Attempt to use search function: " + Test14);

        //Attempt to search without entering text in search bar
        //EXPECTED RESULT: PASS
        boolean Test15 = UnitTests.Search(driver, "");
        System.out.println("Test 15: Attempt to use search function: " + Test15);

        //Attempt to reach Edit Profile Picture page
        //EXPECTED RESULT: PASS
        boolean Test16 = UnitTests.EditPicturePage(driver);
        System.out.println("Test 16: Attempt to reach Edit Profile Picture page: " + Test16);

        //Attempt to log out
        //EXPECTED RESULT: PASS
        boolean Test17 = UnitTests.Logout(driver);
        System.out.println("Test 17: Attempt to log out: " + Test17);

        //Attempt to click "Show Replies" button to view reply on tweet feed
        //EXPECTED RESULT: PASS
        boolean Test18 = UnitTests.ShowReplies(driver);
        System.out.println("Test 18: Attempt to click \"Show Replies\" button to view reply on tweet feed: " + Test18);

        //Attempt to view the userpage of the first user in the Who To Troll div
        //EXPECTED RESULT: PASS
        boolean Test19 = UnitTests.WhoToTrollUser1(driver);
        System.out.println("Test 19: Attempt to view the userpage of the first user in the Who To Troll div: " + Test19);
        
        //Attempt to view the userpage of the first user in the Who To Troll div
        //EXPECTED RESULT: PASS
        boolean Test20 = UnitTests.WhoToTrollUser2(driver);
        System.out.println("Test 20: Attempt to view the userpage of the first user in the Who To Troll div: " + Test20);
        
        //Attempt to view the userpage of the first user in the Who To Troll div
        //EXPECTED RESULT: PASS
        boolean Test21 = UnitTests.WhoToTrollUser3(driver);
        System.out.println("Test 21: Attempt to view the userpage of the first user in the Who To Troll div: " + Test21);

        //Attempt to view User Page of the logged in user
        //EXPECTED RESULT: PASS
        boolean Test22 = UnitTests.ViewUserPage(driver);
        System.out.println("Test 22: Attempt to view User Page of the logged in user: " + Test22);

        //Attempt to follow the first user in the Who To Troll div
        //EXPECTED RESULT: PASS 
        boolean Test23 = UnitTests.WhoToTroll_Follow1(driver);
        System.out.println("Test 23: Attempt to follow the first user in the Who To Troll div: " + Test23);
        
        //Attempt to follow the first user in the Who To Troll div
        //EXPECTED RESULT: PASS 
        boolean Test24 = UnitTests.WhoToTroll_Follow2(driver);
        System.out.println("Test 24: Attempt to follow the first user in the Who To Troll div: " + Test24);
        
        //Attempt to follow the first user in the Who To Troll div
        //EXPECTED RESULT: PASS 
        boolean Test25 = UnitTests.WhoToTroll_Follow3(driver);
        System.out.println("Test 25: Attempt to follow the first user in the Who To Troll div: " + Test25);

        //Attempt to access Bitter login page while not logged in
        //EXPECTED RESULT: PASS 
        boolean Test26 = UnitTests.LoginScreen(driver);
        System.out.println("Test 26: Attempt to access Bitter login page while not logged in: " + Test26);
        
        //Attempt to access Bitter login page while not logged in
        //EXPECTED RESULT: FAIL 
        boolean Test27 = UnitTests.MainPage(driver);
        System.out.println("Test 27: Attempt to access Bitter main page while not logged in: " + Test27);
        
        //Attempt to access Bitter search page while not logged in
        //EXPECTED RESULT: FAIL     
        boolean Test28 = UnitTests.SearchPage(driver);
        System.out.println("Test 28: Attempt to access Bitter search page while not logged in: " + Test28);
        
        //Attempt to access Bitter Contact Us page while not logged in
        //EXPECTED RESULT: FAIL 
        // FOUND A BUG!
        boolean Test29 = UnitTests.ContactUsPage(driver);
        System.out.println("Test 29: Attempt to access Bitter Contact Us page while not logged in: " + Test29);
    }
}
