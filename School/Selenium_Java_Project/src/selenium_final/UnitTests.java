/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package selenium_final;

import org.openqa.selenium.NoAlertPresentException;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.support.ui.Select;

/**
 *
 * @author adamb
 */
public class UnitTests {
    
    static boolean ClickSignupLink(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/login.php");
        WebElement signupLink = WebElements.signupLink(driver);
        signupLink.click();
        
        String strCurrentURL = driver.getCurrentUrl();
        String strSuccessURL = "http://10.10.0.30/qa/peters/signup.php";
        
        if (strCurrentURL.equalsIgnoreCase(strSuccessURL)) {
                return true;
            } else {
                return false;
        }
    }//end of method
    
    static boolean CreateAccount(WebDriver driver, String firstName, String lastName, String email, String username, String password, String confirm, 
            String phone, String address, String province, String postal, String url, String desc, String location) throws InterruptedException {
        driver.get("http://10.10.0.30/qa/peters/signup.php");
        WebElement signupFirstName = WebElements.signupFirstName(driver);
        WebElement signupLastName = WebElements.signupLastName(driver);
        WebElement signupEmail = WebElements.signupEmail(driver);
        WebElement signupUsername = WebElements.signupUsername(driver);
        WebElement signupPassword = WebElements.signupPassword(driver);
        WebElement signupConfirm = WebElements.signupConfirm(driver);
        WebElement signupPhone = WebElements.signupPhone(driver);
        WebElement signupAddress = WebElements.signupAddress(driver);
        Select signupProvince = new Select (WebElements.signupProvince(driver));
        WebElement signupPostalCode = WebElements.signupPostalCode(driver);
        WebElement signupUrl = WebElements.signupUrl(driver);
        WebElement signupDescription = WebElements.signupDescription(driver);
        WebElement signupLocation = WebElements.signupLocation(driver);
        WebElement signupButton = WebElements.signupButton(driver);
        
        signupFirstName.sendKeys(firstName);
        signupLastName.sendKeys(lastName);
        signupEmail.sendKeys(email);
        signupUsername.sendKeys(username);
        signupPassword.sendKeys(password);
        signupConfirm.sendKeys(confirm);
        signupPhone.sendKeys(phone);
        signupAddress.sendKeys(address);
        signupProvince.selectByVisibleText(province);
        signupPostalCode.sendKeys(postal);
        signupUrl.sendKeys(url);
        signupDescription.sendKeys(desc);
        signupLocation.sendKeys(location);
        signupButton.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        Thread.sleep(2000);
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/Login.php?message=Signup%20successful,%20login%20now%20to%20begin%20your%20Bitter%20experience.";
        
        if (currentURL.equalsIgnoreCase(successURL)) {
            return true;
        } else {
            return false;
        }
    } //end of method
    
    static boolean Login(WebDriver driver, String user, String pass) throws InterruptedException {
        driver.get("http://10.10.0.30/qa/peters/login.php");
        WebElement txtLoginUser = WebElements.loginTxtScreenName(driver);
        WebElement txtLoginPass = WebElements.loginTxtPassword(driver);
        WebElement btnLogin = WebElements.loginBtn(driver);
        txtLoginUser.sendKeys(user);
        txtLoginPass.sendKeys(pass);
        btnLogin.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        Thread.sleep(2000);
        
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/index.php";
        
        if (currentURL.equalsIgnoreCase(successURL)) {
            return true;
        } else {
            return false;
        }
    } //end of method
    
    static boolean Tweet(WebDriver driver, String text) throws InterruptedException{
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement tweetText = WebElements.tweetText(driver);
        WebElement tweetBtn = WebElements.tweetBtn(driver);
        tweetText.click();
        tweetText.sendKeys(text);
        tweetBtn.click();
        tweetBtn.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/index.php?message=Tweet%20successful.";
        
        if (currentURL.equalsIgnoreCase(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean ContactUs(WebDriver driver){
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement contactBtn = WebElements.contactBtn(driver);
        contactBtn.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/ContactUs.php";
        
        if (currentURL.equalsIgnoreCase(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean Search(WebDriver driver, String text) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement searchBar = WebElements.searchBar(driver);
        WebElement searchBtn = WebElements.searchBtn(driver);
        searchBar.sendKeys(text);
        searchBtn.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/search.php?search=";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean EditPicturePage(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement headerDropdown = WebElements.headerDropdown(driver);
        WebElement editProfPic = WebElements.editProfPic(driver);
        headerDropdown.click();
        editProfPic.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/edit_photo.php";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean Logout(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement headerDropdown = WebElements.headerDropdown(driver);
        WebElement logoutOption = WebElements.logoutOption(driver);
        headerDropdown.click();
        logoutOption.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/login.php";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of function
    
    static boolean ShowReplies(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement ShowRepliesBtn = WebElements.ShowRepliesBtn(driver);
        WebElement ReplyDiv = WebElements.ReplyDiv(driver);
        ShowRepliesBtn.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        if(ReplyDiv.getText().contains("TestVII: Adrian\\'s Revenge")) {
            return true;
        } else {
            return false;
        }
    }
    
    static boolean WhoToTrollUser1(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement whoToTrollUser1 = WebElements.whoToTrollUser1(driver);
        whoToTrollUser1.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/userpage.php?user_id=";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean WhoToTrollUser2(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement whoToTrollUser2 = WebElements.whoToTrollUser2(driver);
        whoToTrollUser2.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/userpage.php?user_id=";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean WhoToTrollUser3(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement whoToTrollUser3 = WebElements.whoToTrollUser3(driver);
        whoToTrollUser3.click();
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/userpage.php?user_id=";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of method
    
    static boolean ViewUserPage(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement userpageLink = WebElements.userpageLink(driver);
        userpageLink.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/userpage.php?user_id=";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of function
    
    static boolean WhoToTroll_Follow1(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement whoToTroll_Follow1 = WebElements.whoToTroll_Follow1(driver);
        whoToTroll_Follow1.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/index.php?message=You%27re%20now%20trolling%";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of function
    
    static boolean WhoToTroll_Follow2(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement whoToTroll_Follow2 = WebElements.whoToTroll_Follow2(driver);
        whoToTroll_Follow2.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/index.php?message=You%27re%20now%20trolling%";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of function
    
    static boolean WhoToTroll_Follow3(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/index.php");
        WebElement whoToTroll_Follow3 = WebElements.whoToTroll_Follow3(driver);
        whoToTroll_Follow3.click();
        
        if(AlertExists(driver)){
            driver.switchTo().alert().accept();
        }
        
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/index.php?message=You%27re%20now%20trolling%";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }//end of function
    
    static boolean LoginScreen(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/login.php");
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/login.php";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }
    
    static boolean MainPage(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/Index.php");
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/Index.php";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }
    
    static boolean ContactUsPage(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/ContactUs.php");
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/ContactUs.php";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }
    
    static boolean SearchPage(WebDriver driver) {
        driver.get("http://10.10.0.30/qa/peters/Search.php");
        String currentURL = driver.getCurrentUrl();
        String successURL = "http://10.10.0.30/qa/peters/Search.php";
        
        if (currentURL.contains(successURL)) {
            return true;
        } else {
            return false;
        }
    }
    
    static boolean AlertExists(WebDriver driver) {
        try { 
            driver.switchTo().alert(); 
            return true; 
        } catch (NoAlertPresentException Ex) { 
            return false; 
        }  
    }//end of method
}
