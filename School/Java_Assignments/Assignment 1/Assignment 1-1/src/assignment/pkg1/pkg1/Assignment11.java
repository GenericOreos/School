/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package assignment.pkg1.pkg1;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.PrintWriter;
import java.nio.file.Files;
import java.nio.file.Path;
import java.nio.file.Paths;

/**
 *
 * @author adamb
 */
public class Assignment11 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        try {
            String directory = "C:\\Chapter15";
            Path path = Paths.get(directory);
            
            if(Files.notExists(path)) {
                try {
                    Files.createDirectory(path);
                }
                catch (IOException ex){
                    System.out.println("Couldn't create directory");
                }
            }
            String fileName = "myFile.txt";
            Path filePath = Paths.get(directory, fileName);
            String bookDirectory = "Books.txt";
            Path bookPath = Paths.get(directory, bookDirectory);
            String bookFile = bookPath.toString();
            
            if(Files.notExists(filePath)){
                try {
                    Files.createFile(filePath);
                } catch (IOException ex) {
                    System.out.println(ex.getMessage());
                }
            }
            File file = filePath.toFile();
            
            PrintWriter pw = new PrintWriter(new BufferedWriter(new FileWriter(file, true)));
            BufferedReader br = new BufferedReader(new FileReader(bookFile));
            String line = br.readLine();
            
            while(line != null) {
                    pw.write(line + "\n");
                    line = br.readLine();
            }
            pw.close();
            br.close();
            System.out.println("FILE SIZE: " + Files.size(filePath));
        }
        catch(IOException ex) {
            System.out.println(ex.getMessage());
        }
    }
}
