package no2;
import java.util.Scanner;

public class Buku {
    public String judul; 
    public String penulis;
    
    public Buku(Scanner input){
        System.out.println("\n===== input data Buku =====");
        System.out.print("masukkan judul buku: ");
        this.judul=input.nextLine();
        System.out.print("masukkan penulis buku: ");
        this.penulis=input.nextLine();
    }
    
    public void info(){
        System.out.println("judul buku :" + judul);
        System.out.println("penulis buku :" + penulis);
    }
}
