<%-- 
    Document   : AddBookProc
    Created on : Nov. 12, 2019, 4:47:18 p.m.
    Author     : adamb
--%>

<%@page import="java.util.logging.Logger"%>
<%@page import="BusinessLayer.Book"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<%@page import="java.sql.*"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%
        try {
            String title = request.getParameter("title");
            String genre = request.getParameter("genre");
            String author = request.getParameter("author");
            String date = request.getParameter("date");
            out.println(title);
            Book b = new Book();
            Connection conn = b.GetConnection();
            out.println(conn);
            ResultSet rs = b.GetRecords(conn);
            b.AddRecordRS(conn, rs, title, genre, author, date);
            
            if(rs.rowInserted()) {
                out.println("Record inserted into database!");
                response.sendRedirect("AddBook.jsp");
            }
            else {
                out.println("Record not inserted!");
                response.sendRedirect("AddBook.jsp");
            }
            
        } catch(Exception ex) {
            out.println(ex.getStackTrace().toString());
        } 
        %>
    </body>
</html>
