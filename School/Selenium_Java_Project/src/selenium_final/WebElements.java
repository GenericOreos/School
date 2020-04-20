/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package selenium_final;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

/**
 *
 * @author adamb
 */
public class WebElements {
    
    static WebElement loginTxtScreenName(WebDriver driver) {
        WebElement loginTxtScreenName = driver.findElement(By.id("username"));
        return loginTxtScreenName;
    }
    
    static WebElement loginTxtPassword(WebDriver driver) {
        WebElement loginTxtPassword = driver.findElement(By.id("password"));
        return loginTxtPassword;
    }
    
    static WebElement loginBtn(WebDriver driver) {
        WebElement loginBtn = driver.findElement(By.id("button"));
        return loginBtn;
    }
    
    static WebElement signupLink(WebDriver driver) {
        WebElement signupLink = driver.findElement(By.linkText("Click Here"));
        return signupLink;
    }
    
    static WebElement signupFirstName(WebDriver driver) {
        WebElement signupFirstName = driver.findElement(By.id("firstname"));
        return signupFirstName;
    }
    
    static WebElement signupLastName(WebDriver driver) {
        WebElement signupLastName = driver.findElement(By.id("lastname"));
        return signupLastName;
    }
    
    static WebElement signupEmail(WebDriver driver) {
        WebElement signupEmail = driver.findElement(By.id("email"));
        return signupEmail;
    }
    
    static WebElement signupUsername(WebDriver driver) {
        WebElement signupUsername = driver.findElement(By.id("username"));
        return signupUsername;
    }
    
    static WebElement signupPassword(WebDriver driver) {
        WebElement signupPassword = driver.findElement(By.id("password"));
        return signupPassword;
    }
    
    static WebElement signupConfirm(WebDriver driver) {
        WebElement signupConfirm = driver.findElement(By.id("confirm"));
        return signupConfirm;
    }
    
    static WebElement signupPhone(WebDriver driver) {
        WebElement signupPhone = driver.findElement(By.id("phone"));
        return signupPhone;
    }
    
    static WebElement signupAddress(WebDriver driver) {
        WebElement signupAddress = driver.findElement(By.id("address"));
        return signupAddress;
    }
    
    static WebElement signupProvince(WebDriver driver) {
        WebElement signupProvince = driver.findElement(By.id("province"));
        return signupProvince;
    }
    
    static WebElement signupPostalCode(WebDriver driver) {
        WebElement signupPostalCode = driver.findElement(By.id("postalCode"));
        return signupPostalCode;
    }
    
    static WebElement signupUrl(WebDriver driver) {
        WebElement signupUrl = driver.findElement(By.id("url"));
        return signupUrl;
    }
    
    static WebElement signupDescription(WebDriver driver) {
        WebElement signupDescription = driver.findElement(By.id("desc"));
        return signupDescription;
    }
    
    static WebElement signupLocation(WebDriver driver) {
        WebElement signupLocation = driver.findElement(By.id("location"));
        return signupLocation;
    }
    
    static WebElement signupButton(WebDriver driver) {
        WebElement signupButton = driver.findElement(By.id("button"));
        return signupButton;
    }
    
    static WebElement tweetText(WebDriver driver) {
        WebElement tweetText = driver.findElement(By.id("myTweet"));
        return tweetText;
    }
    
    static WebElement tweetBtn(WebDriver driver) {
        WebElement tweetBtn = driver.findElement(By.id("button"));
        return tweetBtn;
    }
    
    static WebElement contactBtn(WebDriver driver) {
        WebElement contactBtn = driver.findElement(By.xpath("/html[1]/body[1]/nav[1]/div[1]/ul[1]/li[5]/a[1]"));
        return contactBtn;
    }
    
    static WebElement searchBar(WebDriver driver) {
        WebElement searchBar = driver.findElement(By.xpath("/html[1]/body[1]/nav[1]/div[1]/form[1]/input[1]"));
        return searchBar;
    }
    
    static WebElement searchBtn(WebDriver driver) {
        WebElement searchBtn = driver.findElement(By.xpath("/html[1]/body[1]/nav[1]/div[1]/form[1]/button[1]"));
        return searchBtn;
    }
    
    static WebElement headerDropdown(WebDriver driver) {
        WebElement headerDropdown = driver.findElement(By.xpath("//a[@id='dropdown01']//img[@class='bannericons']"));
        return headerDropdown;
    }
    
    static WebElement editProfPic(WebDriver driver) {
        WebElement editProfPic = driver.findElement(By.xpath("//a[contains(text(),'Edit Profile Picture')]"));
        return editProfPic;
    }
    
    static WebElement logoutOption(WebDriver driver) {
        WebElement logoutOption = driver.findElement(By.xpath("//a[contains(text(),'Logout')]"));
        return logoutOption;
    }
    
    static WebElement ShowRepliesBtn(WebDriver driver) {
        WebElement ShowRepliesBtn = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[2]/div[2]/button[1]"));
        return ShowRepliesBtn;
    }
    
    static WebElement ReplyDiv(WebDriver driver) {
        WebElement ReplyDiv = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[2]/div[2]/div[10]"));
        return ReplyDiv;
    }
    
    static WebElement whoToTrollUser1(WebDriver driver) {
        WebElement whoToTrollUser1 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[3]/div[1]/a[1]"));
        return whoToTrollUser1;
    }
    
    static WebElement whoToTrollUser2(WebDriver driver) {
        WebElement whoToTrollUser2 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[3]/div[1]/a[2]"));
        return whoToTrollUser2;
    }
    
    static WebElement whoToTrollUser3(WebDriver driver) {
        WebElement whoToTrollUser3 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[3]/div[1]/a[3]"));
        return whoToTrollUser3;
    }
    
    static WebElement userpageLink(WebDriver driver) {
        WebElement userpageLink = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[1]/div[1]/div[1]/a[1]"));
        return userpageLink;
    }
    
    static WebElement whoToTroll_Follow1(WebDriver driver) {
        WebElement whoToTroll_Follow1 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[3]/div[1]/button[1]"));
        return whoToTroll_Follow1;
    }
    
    static WebElement whoToTroll_Follow2(WebDriver driver) {
        WebElement whoToTroll_Follow2 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[3]/div[1]/button[2]"));
        return whoToTroll_Follow2;
    }
    
    static WebElement whoToTroll_Follow3(WebDriver driver) {
        WebElement whoToTroll_Follow3 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[3]/div[1]/button[3]"));
        return whoToTroll_Follow3;
    }
    
    static WebElement replyButton1(WebDriver driver) {
        WebElement replyButton1 = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[2]/div[2]/a[2]/img[1]"));
        return replyButton1;
    }
    
    static WebElement replyTextArea(WebDriver driver) {
        WebElement replyTextArea = driver.findElement(By.id("reply_tweet"));
        return replyTextArea;
    }
    
    static WebElement replyBtn(WebDriver driver) {
        WebElement replyBtn = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[2]/div[2]/div[4]/div[1]/div[1]/div[1]/form[1]/input[1]"));
        return replyBtn;
    }
    
    static WebElement tweetDiv(WebDriver driver) {
        WebElement tweetDiv = driver.findElement(By.xpath("/html[1]/body[1]/div[1]/div[1]/div[2]/div[2]"));
        return tweetDiv;
    }
}
