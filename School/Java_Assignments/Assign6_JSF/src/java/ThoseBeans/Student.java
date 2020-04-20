/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ThoseBeans;

import javax.ejb.Stateless;

/**
 *
 * @author adamb
 */
@Stateless
public class Student {
    
    private int id;
    private String name;
    private String program;
    private String courses;
    
    
    /**
     * Creates a new instance of Student
     */
    public Student() {
    }

    public Student(int id, String name, String program, String courses) {
        this.id = id;
        this.name = name;
        this.program = program;
        this.courses = courses;
    }

    public int getId() {
        return id;
    }

    public String getName() {
        return name;
    }

    public String getProgram() {
        return program;
    }

    public String getCourses() {
        return courses;
    }

    public void setId(int id) {
        this.id = id;
    }

    public void setName(String name) {
        this.name = name;
    }

    public void setProgram(String program) {
        this.program = program;
    }

    public void setCourses(String courses) {
        this.courses = courses;
    }
    
}
