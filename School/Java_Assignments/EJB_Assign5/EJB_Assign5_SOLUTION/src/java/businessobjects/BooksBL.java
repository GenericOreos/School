/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package businessobjects;

import databeans.BooksDL;
import java.util.ArrayList;
import javax.ejb.Stateless;

/**
 *
 * @author nick.taggart
 */
@Stateless
public class BooksBL {
    
    BooksDL booksDL= BooksDL.getInstance();

   public boolean AddBook(String title, String genre, String author, String date_published) throws Exception {
       Book b = booksDL.FetchBookByTitle(title);
       if (b == null) {
            return booksDL.InsertBook(title, genre, author, date_published);
       }
       else {
           return false;
           //throw new Exception("Book title already exists");
       }
   }
   public Book GetBook(int id) {
       Book b = booksDL.FetchBookById(id);
       return b;
   }
   public Book GetBook(String title) {
       Book b = booksDL.FetchBookByTitle(title);
       return b;
   }
   
   public  ArrayList<Book> GetBooks() {
       return booksDL.FetchAllBooks();
   }
}
