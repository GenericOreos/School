<%-- 
    Document   : index
    Created on : Nov 21, 2018, 7:58:52 PM
    Author     : nick.taggart
--%>

<%@page import="java.util.ArrayList"%>
<%@page import="businessobjects.Book"%>
<%@page import="businessobjects.BooksBL"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Advanced Java Assignment #5 - EJBs</title>
    </head>
    <body>
        <%
        if (!(request.getParameter("message")==null)) {
            out.println("<h1>" + request.getParameter("message") + "</h1>");
            
        }
        %>
        <form action="BookServlet" method="post">
            <label>Book Title: <input type="text" name="title" maxlength="255" required></label><br>
            <label>Genre: <input type="text" name="genre" maxlength="255" required></label><br>
            <label>Author: <input type="text" name="author" maxlength="255" required></label><br>
            <label>Date Published: <input type="date" name="date_published" required></label><br>
            <input type="submit" name="submit" value="Insert Book!">
        </form>
        <%
            BooksBL booksBL = new BooksBL();
        ArrayList<Book> books = booksBL.GetBooks();
        for (int i = 0; i<books.size(); i++) {
            Book b = books.get(i);
            out.println (b.getId() + "&nbsp;" + b.getTitle() + "&nbsp;" + b.getAuthor() + "&nbsp;" + b.getGenre() + "&nbsp;" + b.getDatePublished() + "<BR>");
        }
        %>
    </body>
</html>

