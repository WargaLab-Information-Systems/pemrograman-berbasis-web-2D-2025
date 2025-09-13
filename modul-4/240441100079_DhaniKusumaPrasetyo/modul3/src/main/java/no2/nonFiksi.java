package no2;
import java.util.Scanner;

public class nonFiksi extends Buku{
    public String topik;
    
    public nonFiksi(Scanner input){
        super(input);
        System.out.print("Masukkan Topik: ");
        this.topik=input.nextLine();
    }
    public void infoNonFiksi(){
        System.out.println("\njudul :" + judul);
        System.out.println("penulis :" + penulis);
        System.out.println("topik :" + topik);
    }
}
