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
@WebServlet(name = "product_proc", urlPatterns = {"/product_proc"})
public class product_proc extends HttpServlet {
    protected void processRequest(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {
        response.setContentType("text/html;charset=UTF-8");
        try (PrintWriter out = response.getWriter()) {
            /* TODO output your page here. You may use following sample code. */
            String category = request.getParameter("category");
            String description = request.getParameter("description"); 
            String image = request.getParameter("image"); 
            String priceString = request.getParameter("price"); 
            double price = Double.parseDouble(priceString);
            Connection conn;
            try {
                conn = GetConnection();
                ResultSet rs = GetRecords(conn);
                AddRecordRS(conn, rs, category, description, image, price);
                Disconnect(conn);
            } catch (ClassNotFoundException ex) {
                Logger.getLogger(product_proc.class.getName()).log(Level.SEVERE, null, ex);
            }
            out.println("<!DOCTYPE html>");
            out.println("<html>");
            out.println("<head>");
            out.println("<title>Servlet product_proc</title>");            
            out.println("</head>");
            out.println("<body>");
            out.println("</body>");
            out.println("</html>");
            response.sendRedirect("Products");
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
        processRequest(request, response);
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
        processRequest(request, response);
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
    
    public static void AddRecordRS(Connection conn, ResultSet rs, String category, String description, String image, double price) {
        try {
            rs.moveToInsertRow();
            rs.updateString("Category", category);
            rs.updateString("Description", description);
            rs.updateString("Image", image);
            rs.updateDouble("Price", price);
            rs.insertRow(); //commits changes to the database 
        } catch (SQLException ex) {
             Logger.getLogger(Products.class.getName()).log(Level.SEVERE, null, ex);
        }
    }
}
