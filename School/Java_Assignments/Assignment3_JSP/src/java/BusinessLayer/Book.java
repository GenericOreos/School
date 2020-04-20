/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package BusinessLayer;

import static java.lang.System.out;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author adamb
 */
public class Book {
    private String title;
    private String genre;
    private String author;
    private String date;

    public String getTitle() {
        return title;
    }

    public String getGenre() {
        return genre;
    }

    public String getAuthor() {
        return author;
    }

    public String getDate() {
        return date;
    }

    public void setTitle(String title) {
        this.title = title;
    }

    public void setGenre(String genre) {
        this.genre = genre;
    }

    public void setAuthor(String author) {
        this.author = author;
    }

    public void setDate(String date) {
        this.date = date;
    }

    public Book() { //default constructor 
    }

    public Book(String title, String genre, String author, String date) {
        this.title = title;
        this.genre = genre;
        this.author = author;
        this.date = date;
    }
    
    public static Connection GetConnection(){
        Connection conn = null;
        //JDBC
        String dbURL = "jdbc:mysql://localhost:3306/booksdb";
        String username = "root";
        String password = "";
        
        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection(dbURL, username, password);
            out.println("CONNECTION CREATED");
        } catch (ClassNotFoundException | SQLException ex) {
            Logger.getLogger(Book.class.getName()).log(Level.SEVERE, null, ex);
        }
        return conn;
    }
    
    public static void Disconnect(Connection conn) {
        try {
            conn.close();
        } catch (SQLException ex) {
           ex.getMessage();
        }
    } 
    
    public static ResultSet GetRecords(Connection conn){
        out.println("GET RECORDS");
        String sql = "select * from books";
        try {
            Statement s = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            return s.executeQuery(sql);
        } catch (SQLException ex) {
            ex.getMessage();
            return null;
        }
    }
    
    public static void AddRecordRS(Connection conn, ResultSet rs, String title, String genre, String author, String date) {
        try {
            out.println("ADD RECORD RS");
            rs.moveToInsertRow();
            rs.updateString("TITLE", title);
            rs.updateString("GENRE", genre);
            rs.updateString("AUTHOR", author);
            rs.updateString("DATE_PUBLISHED", date);
            rs.insertRow(); //commits changes to the database 
        } catch (SQLException ex) {
            out.println("ADD RECORD RS CATCH");
        }
    }
}
