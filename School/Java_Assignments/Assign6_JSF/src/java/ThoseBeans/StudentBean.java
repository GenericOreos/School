/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ThoseBeans;

import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.ArrayList;
import javax.ejb.Stateless;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;

/**
 *
 * @author adamb
 */
@Stateless
public class StudentBean {
    
    public StudentBean() {
    }
    
    public static Connection GetConnection(){
        String dbUrl = "jdbc:mysql://localhost:3306/nbcc";
        String username ="root";
        String password = "";
        Connection conn = null;
        
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
    
    public static boolean InsertStudent(Student s) {
        String sql = "INSERT INTO students (id, name, program, courses) VALUES(?,?,?,?)";
        Connection conn = GetConnection();
        try {
            PreparedStatement stmt = conn.prepareStatement(sql);
            
                stmt.setInt(1, s.getId());
                stmt.setString(2, s.getName());
                stmt.setString(3, s.getProgram());
                stmt.setString(4, s.getCourses());
                
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
    
    public static ArrayList<Student> FetchAllStudents() {
        int id;
        String name = "";
        String program = "";
        String courses = "";
        String sql = "SELECT id, name, program, courses FROM students";
        Connection conn = GetConnection();
        try {
            PreparedStatement s = conn.prepareStatement(sql, ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            ArrayList<Student> studentList = new ArrayList<>();
            ResultSet rs = s.executeQuery();
            rs.first();//move cursor to the first row
            do {
                id = rs.getInt(1);
                name = rs.getString(2);
                program = rs.getString(3);
                courses = rs.getString(4);
                Student student = new Student(id, name, program, courses);
                studentList.add(student);
            } while (rs.next());
            return studentList;
        } catch (SQLException ex) {
            //swallow the exception
        }
        return null;
    }
}
