/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package businessobjects;

import javax.ejb.Stateless;

/**
 *
 * @author nick.taggart
 */
@Stateless
//@LocalBean
public class Book {

    private String genre;

    public Book() {
    }

    public Book(String genre, String author, String datePublished, int id, String title) {
        this.genre = genre;
        this.author = author;
        this.datePublished = datePublished;
        this.id = id;
        this.title = title;
    }

    /**
     * Get the value of genre
     *
     * @return the value of genre
     */
    public String getGenre() {
        return genre;
    }

    /**
     * Set the value of genre
     *
     * @param genre new value of genre
     */
    public void setGenre(String genre) {
        this.genre = genre;
    }

    private String author;

    /**
     * Get the value of author
     *
     * @return the value of author
     */
    public String getAuthor() {
        return author;
    }

    /**
     * Set the value of author
     *
     * @param author new value of author
     */
    public void setAuthor(String author) {
        this.author = author;
    }

    private String datePublished;

    /**
     * Get the value of datePublished
     *
     * @return the value of datePublished
     */
    public String getDatePublished() {
        return datePublished;
    }

    /**
     * Set the value of datePublished
     *
     * @param datePublished new value of datePublished
     */
    public void setDatePublished(String datePublished) {
        this.datePublished = datePublished;
    }

    private int id;

    /**
     * Get the value of id
     *
     * @return the value of id
     */
    public int getId() {
        return id;
    }

    /**
     * Set the value of id
     *
     * @param id new value of id
     */
    public void setId(int id) {
        this.id = id;
    }

    private String title;

    /**
     * Get the value of title
     *
     * @return the value of title
     */
    public String getTitle() {
        return title;
    }

    /**
     * Set the value of title
     *
     * @param title new value of title
     */
    public void setTitle(String title) {
        this.title = title;
    }

    // Add business logic below. (Right-click in editor and choose
    // "Insert Code > Add Business Method")
}