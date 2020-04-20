/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package assignment.pkg1.pkg2;

import java.io.BufferedInputStream;
import java.io.BufferedOutputStream;
import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.io.FileInputStream;
import java.io.FileOutputStream;

/**
 *
 * @author adamb
 */
public class Assignment12 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        // TODO code application logic here
        try {
            String binFile = "C:\\Chapter15\\myBinaryFile.bin";
            DataOutputStream dataOut = new DataOutputStream(new BufferedOutputStream(new FileOutputStream(binFile, true)));
            DataInputStream dataIn = new DataInputStream(new BufferedInputStream(new FileInputStream(binFile)));
            
            dataOut.writeUTF("Hammer        19.99");
            dataOut.writeUTF("Screwdriver	9.99");
            dataOut.writeUTF("Vise Grips	25.50");
            dataOut.close();
            
            while(dataIn.available() > 0){
                String myData = dataIn.readUTF();
                System.out.println(myData);
            }
            dataIn.close();
            
        }
        catch(Exception ex) {
            ex.getMessage();
        }
    }
    
}
