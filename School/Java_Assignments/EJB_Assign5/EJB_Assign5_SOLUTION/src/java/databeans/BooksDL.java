/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package databeans;

import businessobjects.Book;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.annotation.PreDestroy;
import javax.ejb.Singleton;

/**
 *
 * @author nick.taggart
 */
@Singleton
public class BooksDL {
    private static BooksDL instance;

    public static BooksDL getInstance() {
        if (instance == null) {
            //first person in, we need to instantiate the object
            instance = new BooksDL();
            conn = GetConnection(); 
        }
        return instance;
    }    
   
    protected BooksDL() {
        //just so that nobody can create an instance of it
        //default constructor
        
    }
    
    private static Connection conn;

    @PreDestroy
    public void CloseConnection() {
        try {
            conn.close();
        } catch (SQLException ex) {
            Logger.getLogger(BooksDL.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public static Connection GetConnection() {

        String dbUrl = "jdbc:mysql://localhost:3306/students";
        String username ="root";
        String password = "";

        try {
            Class.forName("com.mysql.jdbc.Driver");
            conn = DriverManager.getConnection(dbUrl, username, password);
            conn.setAutoCommit(true);
        } catch (SQLException ex) {
            for (Throwable t:ex) t.printStackTrace();
        } catch (ClassNotFoundException ex) {
            ex.printStackTrace();
        }

        return conn;
    }

        //Inserts a new record into booksdb.books with the provided values
        public boolean InsertBook(String title, String genre, String author, String date_published) {

            String sql = "INSERT INTO books(TITLE, GENRE, AUTHOR, DATE_PUBLISHED) VALUES(?, ?, ?, ?);";

            try {
                PreparedStatement stmt = conn.prepareStatement(sql);

                stmt.setString(1, title);
                stmt.setString(2, genre);
                stmt.setString(3, author);
                stmt.setString(4, date_published);

                if(stmt.executeUpdate() > 0) {
                    return true;
                } else {
                    return false;
                }
            } catch(SQLException ex) {
                ex.printStackTrace();
                return false;
            }
        }
        public Book FetchBookById(int id) {
            String genre, author, datePublished, title;
            String sql = "select title, genre, author, date_published from books where bookid = ?";
            try {
                //Statement s = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
                PreparedStatement s = conn.prepareStatement(sql, ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
                s.setInt(1, id);
                ResultSet rs = s.executeQuery();
                title = rs.getString(1);
                genre = rs.getString(2);
                author = rs.getString(3);
                datePublished = rs.getString(4);
                Book b = new Book(title, genre, author, id, datePublished);
                return b;

            } catch (SQLException ex) {
                //swallow the exception
            }
            //only gets here if an error occurs
            return null;

        }
        public ArrayList<Book> FetchAllBooks() {
            String genre, author, datePublished, title;
            String sql = "select bookid, title, genre, author, date_published from books";
            int id = 0;
            try {
                PreparedStatement s = conn.prepareStatement(sql, ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
                ArrayList<Book> bookList = new ArrayList<>();
                ResultSet rs = s.executeQuery();
                rs.first();//move cursor to the first row
                do {
                    id = rs.getInt(1);
                    title = rs.getString(2);
                    genre = rs.getString(3);
                    author = rs.getString(4);
                    datePublished = rs.getString(5);
                    Book b = new Book(genre, author, datePublished, id, title);
                    bookList.add(b);
                } while (rs.next());
                return bookList;

            } catch (SQLException ex) {
                //swallow the exception
            }
            //only gets here if an error occurs
            return null;

        }
        public Book FetchBookByTitle(String title) {
            String genre, author, datePublished;
            int id;
            String sql = "select bookid, genre, author, date_published from books where title = ?";
            try {
                PreparedStatement s = conn.prepareStatement(sql, ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
                s.setString(1, title);
                ResultSet rs = s.executeQuery();
                rs.last();
                int rowCount = rs.getRow();
                rs.first();
                if (rowCount > 0) {
                    id = rs.getInt(1);
                    genre = rs.getString(2);
                    author = rs.getString(3);
                    datePublished = rs.getString(4);
                    Book b = new Book(title, genre, author, id, datePublished);
                    return b;
                }
                else {//resultset was empty
                    return null;
                }

            } catch (SQLException ex) {
                //swallow the exception
                int x=1;
            }
            //only gets here if an error occurs
            return null;

        }

}
