package no2;

import java.util.Scanner;

public class bukuFiksi extends Buku{
    public String genre;
    
    public bukuFiksi(Scanner input){
        super(input);
        System.out.print("Masukkan genre: ");
        this.genre=input.nextLine();
    }
    public void infoFiksi(){
        System.out.println("\njudul :" + judul);
        System.out.println("penulis :" + penulis);
        System.out.println("genre :" + genre);
    
}
}
