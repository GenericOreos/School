/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ThoseBeans;

import java.io.IOException;
import java.util.ArrayList;
import javax.ejb.EJB;
import javax.ejb.Stateless;
import javax.inject.Named;
import javax.faces.context.ExternalContext;
import javax.faces.context.FacesContext;

/**
 *
 * @author adamb
 */
@Named(value = "studentBackingBean")
@Stateless
public class StudentBackingBean {
    @EJB
    private Student student;
    private ArrayList<String> courses;
    private String courseString = "";
    
    /**
     * Creates a new instance of StudentBackingBean
     */
    public StudentBackingBean() {
    }

    public Student getStudent() {
        return student;
    }

    public ArrayList<String> getCourses() {
        return courses;
    }
    
    public ArrayList<Student> GetAllStudents(){
        return StudentBean.FetchAllStudents();
    }

    public void setStudent(Student student) {
        this.student = student;
    }

    public void setCourses(ArrayList<String> courses) {
        this.courses = courses;
    }
    
    public String AddStudent() throws IOException {
        String result = "";
        courses.forEach((c) -> {
            courseString += (c + "|");
        });
        this.student.setCourses(courseString);
        Boolean b = StudentBean.InsertStudent(student);
        if(b == true) {
            result = "Student added to database";
        } else {
            result = "Error: student was not added to the database";
        }
        ExternalContext externalContext = FacesContext.getCurrentInstance().getExternalContext();
        externalContext.redirect("DisplayStudents.xhtml");
        return result;
    }
}
