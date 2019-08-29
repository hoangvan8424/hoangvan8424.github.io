/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package shiftcipher;

import java.util.Scanner;

/**
 *
 * @author Hoang Van
 */
public class ShiftCipher {
    public static String encrypt(String planText, int shift){
        if(shift>26){
            shift=shift%26;
        }else if(shift<0){
            shift=(shift%26)+26;
        }
        String cipherText="";
        int lenght= planText.length();
        for (int i = 0; i < lenght; i++) {
            char ch = planText.charAt(i);
            if(Character.isLetter(ch)){
                if(Character.isLowerCase(ch)){
                    char c = (char)(ch + shift);
                    if(c >'z'){
                        cipherText = cipherText + (char)(ch - (26-shift));
                    }else{
                        cipherText=cipherText+c;
                    }
                }else if(Character.isUpperCase(ch)){
                    char c = (char)(ch + shift);
                    if(c > 'Z'){
                        cipherText = cipherText + (char)(ch - (26-shift));
                    }else{
                        cipherText=cipherText+c;
                    }
                } 
            }else{
                cipherText+=ch;
            }
            
        }
        
        return cipherText;
    }
    public static String decrypt(String cipherText, int shift){
        if(shift>26){
            shift=shift%26;
        }else if(shift<26){
            shift=(shift%26)+26;
        }
        String planText="";
        int lenght= cipherText.length();
        for (int i = 0; i < lenght; i++) {
            char ch = cipherText.charAt(i);
            if(Character.isLetter(ch)){
                if(Character.isLowerCase(ch)){
                    char c = (char)(ch - shift);
                    if(c <'a'){
                        planText = planText + (char)(ch + (26-shift));
                    }else{
                        planText=planText+c;
                    }
                }else if(Character.isUpperCase(ch)){
                    char c = (char)(ch - shift);
                    if(c < 'A'){
                        planText = planText + (char)(ch + (26-shift));
                    }else{
                        planText=planText+c;
                    }
                } 
            }else{
                planText+=ch;
            }
            
        }
        
        return planText;
    }
    public static void main(String[] args) {
      
        Scanner sr = new Scanner(System.in);
        System.out.println("Input planText:");
        String plantext = sr.nextLine();
        System.out.println("Input key k= ");
        int k = sr.nextInt();
        String cipherText = encrypt(plantext,k);
        System.out.println(cipherText);
        
        String decryptText = decrypt(cipherText, k);
        System.out.println(decryptText);
//               String text ="XYZ Is bEst";
//               String cipher = encrypt(text, 5);
//               System.out.println("Cipher Text of plantext: "+text+" is: ");
//               System.out.println(cipher);
               
    }
    
}
