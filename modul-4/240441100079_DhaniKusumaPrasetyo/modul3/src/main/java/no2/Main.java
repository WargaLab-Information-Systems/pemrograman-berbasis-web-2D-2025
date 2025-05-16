package no2;

import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        
        perpustakaan p1 = new perpustakaan();
        
        bukuFiksi b1 = new bukuFiksi(input); 
//        bukuFiksi b2 = new bukuFiksi(input); 
//        bukuFiksi b3 = new bukuFiksi(input); 
        nonFiksi n1 = new nonFiksi(input);
//        nonFiksi n2 = new nonFiksi(input);
//        nonFiksi n3 = new nonFiksi(input);
        
        
        p1.tambahBukuFiksi(b1);
//        p1.tambahBukuFiksi(b2);
//        p1.tambahBukuFiksi(b3);
        p1.tambahBukuNonFiksi(n1);
//        p1.tambahBukuNonFiksi(n2);
//        p1.tambahBukuNonFiksi(n3);
        p1.tampilkanKoleksi();

    }
}
