/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Servlets;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 *
 * @author adamb
 */
@WebServlet(name = "Products", urlPatterns = {"/Products"})
public class Products extends HttpServlet {

    /**
     * Processes requests for both HTTP <code>GET</code> and <code>POST</code>
     * methods.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     * @throws java.sql.SQLException
     */
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException, SQLException {
        
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet Products</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("<h1>Add Product</h1>");
            out.println("<BR>");
            out.println("<form name=\"productForm\" method=\"post\" action=\"product_proc\">");
            out.println("Category: ");
            out.println("<input type=\"text\" name=\"category\">");
            out.println("<BR>");
            out.println("Description: ");
            out.println("<input type=\"text\" name=\"description\">");
            out.println("<BR>");
            out.println("Image: ");
            out.println("<input type=\"text\" name=\"image\">");
            out.println("<BR>");
            out.println("Price: ");
            out.println("<input type=\"text\" name=\"price\">");
            out.println("<BR>");
            out.println("<input type=\"submit\">");
            out.println("<BR>");
            out.println("<table border='1'>");
            out.println("<tr>");
            out.println("<th>Category</th><th>Description</th><th>Image</th><th>Price</th>");
            out.println("</tr>");
            Connection conn;
            try {
                conn = GetConnection();
                ResultSet rs = GetRecords(conn);
                rs.first();
                if(conn == null) {
                    out.println("not connected");
                    }
                do {
                   out.println("<tr>");
                    out.println("<td>"  + rs.getString("Category") + "</td>");
                    out.println("<td>" + rs.getString("Description") + "</td>");
                    out.println("<td>" + rs.getString("Image") + "</td>");
                    out.println("<td>" + rs.getDouble("Price") + "</td>");
                } while(rs.next());
                Disconnect(conn);
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
            }
            out.println("</table>");
            out.println("</form>");
            out.println("</body>");
            out.println("</html>"); 
        }
    }

    // <editor-fold defaultstate="collapsed" desc="HttpServlet methods. Click on the + sign on the left to edit the code.">
    /**
     * Handles the HTTP <code>GET</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doGet(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Handles the HTTP <code>POST</code> method.
     *
     * @param request servlet request
     * @param response servlet response
     * @throws ServletException if a servlet-specific error occurs
     * @throws IOException if an I/O error occurs
     */
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        try {
            processRequest(request, response);
        } catch (SQLException ex) {
            Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    /**
     * Returns a short description of the servlet.
     *
     * @return a String containing servlet description
     */
    @Override
    public String getServletInfo() {
        return "Short description";
    }// </editor-fold>
    
    public static Connection GetConnection() throws ClassNotFoundException{
        //JDBC
        String dbURL = "jdbc:mysql://localhost:3306/productsdemo";
        String username = "root";
        String password = "";
        try {
            Class.forName("com.mysql.jdbc.Driver"); 
            Connection conn = DriverManager.getConnection(dbURL, username, password);
            return conn;
        } catch (SQLException ex) {
            Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        } 
    }
    
    public static void Disconnect(Connection conn) {
        try {
            conn.close();
        } catch (SQLException ex) {
            Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
    
    public static ResultSet GetRecords(Connection conn){
        String sql = "select * from products";
        try {
            Statement s = conn.createStatement(ResultSet.TYPE_SCROLL_INSENSITIVE, ResultSet.CONCUR_UPDATABLE);
            return s.executeQuery(sql);
        } catch (SQLException ex) {
            Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
            return null;
        }
    }
}
