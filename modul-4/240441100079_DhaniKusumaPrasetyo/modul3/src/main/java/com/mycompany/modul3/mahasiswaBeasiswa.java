package com.mycompany.modul3;

import java.util.Scanner;

public class mahasiswaBeasiswa extends Mahasiswa {
    public String jenisBeasiswa;
    
    public mahasiswaBeasiswa(Scanner input) {
        super(input);
        System.out.print("Masukkan jenis Beasiswa: ");
        this.jenisBeasiswa=input.nextLine();
    }
    
    public void infoBeasiswa(){
        System.out.println("========= Output Data =========");
        System.out.println("nama: " + nama);
        System.out.println("nim: " + nim);
        System.out.println("jenis beasiswa: " + jenisBeasiswa);
        System.out.println("=================================");
    }
}
