package com.mycompany.modul3;

import java.util.Scanner;

public class Modul3 {
    public static void main(String[] args) {
        Scanner input = new Scanner(System.in);
        
        MahasiswaReguler objek =new MahasiswaReguler(input);
        objek.infoReguler();
        
        mahasiswaBeasiswa objek1 = new mahasiswaBeasiswa(input);
        objek1.infoBeasiswa();
        
    }
}
