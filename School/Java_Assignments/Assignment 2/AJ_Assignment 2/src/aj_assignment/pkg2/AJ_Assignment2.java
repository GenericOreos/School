/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package aj_assignment.pkg2;

import java.sql.*;
import java.util.logging.Level;
import java.util.logging.Logger;

/**
 *
 * @author adamb
 */
public class AJ_Assignment2 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Connection conn = GetConnection();
        ResultSet rs = GetRecords(conn);
        ResultSet third = GetThirdResult(conn);
        ResultSet reverse = DisplayRecordsInReverse(conn);
        try {
            third.first();
            System.out.println(third.getString(2) + " - " + third.getString(3) + " - " + third.getString(4) + " - " + third.getString(5));
            System.out.println("----------------------------------------------------------------------------\n");
            reverse.first();
            System.out.println(reverse.getString(2) + " - " + reverse.getString(3) + " - " + reverse.getString(4) + " - " + reverse.getString(5));
            reverse.next();
            System.out.println(reverse.getString(2) + " - " + reverse.getString(3) + " - " + reverse.getString(4) + " - " + reverse.getString(5));
            reverse.next();
            System.out.println(reverse.getString(2) + " - " + reverse.getString(3) + " - " + reverse.getString(4) + " - " + reverse.getString(5));
            reverse.next();
            System.out.println(reverse.getString(2) + " - " + reverse.getString(3) + " - " + reverse.getString(4) + " - " + reverse.getString(5));
            System.out.println("----------------------------------------------------------------------------\n");
            UpdateRecords(conn, rs);
            rs.first();
            System.out.println(rs.getString(2) + " - " + rs.getString(3) + " - " + rs.getString(4) + " - " + rs.getString(5));
            rs.next();
            System.out.println(rs.getString(2) + " - " + rs.getString(3) + " - " + rs.getString(4) + " - " + rs.getString(5));
            rs.next();
            System.out.println(rs.getString(2) + " - " + rs.getString(3) + " - " + rs.getString(4) + " - " + rs.getString(5));
            rs.next();
            System.out.println(rs.getString(2) + " - " + rs.getString(3) + " - " + rs.getString(4) + " - " + rs.getString(5));
            System.out.println("----------------------------------------------------------------------------\n");
            DisplayMetaData(conn, rs);
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);
        }
        Disconnect(conn);
    }
    public static Connection GetConnection(){
        Connection conn = null;
        //JDBC
        String dbURL = "jdbc:mysql://localhost:3306/booksdb";
        String username = "root";
        String password = "";
        try {
            conn = (Connection) DriverManager.getConnection(dbURL, username, password);
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);
        }

        return conn;
    }
    public static void Disconnect(Connection conn) {
        try {
            conn.close();
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    public static ResultSet GetRecords(Connection conn){
        String sql = "select * from books";
        try {
            Statement s = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            return s.executeQuery(sql);
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    public static ResultSet GetThirdResult(Connection conn) {
        String sql = "select * from books where bookid = 3";
        try {
            Statement s = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            return s.executeQuery(sql);
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    public static ResultSet DisplayRecordsInReverse(Connection conn){
        String sql = "select * from books order by bookid desc";
        try {
            Statement s = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            return s.executeQuery(sql);
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
    public static void UpdateRecords(Connection conn, ResultSet rs) {
        try {
            rs.absolute(2);
            rs.updateString("Genre", "Fiction Novel");
            rs.updateRow();
            rs.next();
            rs.updateString("Genre", "Fiction Novel");
            rs.updateRow();
            rs.next();
            rs.updateString("Genre", "Fiction Novel");
            rs.updateRow();
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);   
        }
    }
    public static void DisplayMetaData(Connection conn, ResultSet rs) {
        try {
            ResultSetMetaData md = rs.getMetaData();
            int numColumns = md.getColumnCount();
            for(int i = 1; i < numColumns; i++) {
                System.out.println("COLUMN NAME: " + md.getColumnName(i));
                System.out.println("COLUMN TYPE: " + md.getColumnTypeName(i));
            }
        } catch (SQLException ex) {
            Logger.getLogger(AJ_Assignment2.class.getName()).log(Level.SEVERE, null, ex);  
        }
    }
}
