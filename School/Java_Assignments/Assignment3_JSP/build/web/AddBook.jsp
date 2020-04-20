<%-- 
    Document   : AddBook
    Created on : Nov. 12, 2019, 4:46:52 p.m.
    Author     : adamb
--%>
<%@page import="java.io.IOException"%>
<%@page import="BusinessLayer.Book"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>JSP Page</title>
    </head>
    <body>
        <%  
        %>
        <form action="AddBookProc.jsp" method="GET">
        Book Title:     <input type="text" name="title" id="title" /><br>
        Genre:          <input type="text" name="genre" id="genre"/><br>
        Author:         <input type="text" name="author" id="author" /><br>
        Date Published: <input type="text" name="date" id="date" /><br>
        <input type="submit" value="Insert Book"/>
        </form>
    </body>
</html>
