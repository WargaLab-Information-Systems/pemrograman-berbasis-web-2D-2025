package com.mycompany.modul3;

import java.util.Scanner;

public class MahasiswaReguler extends Mahasiswa {
    public String kelas;

    public MahasiswaReguler(Scanner input) {
        super(input);
        System.out.print("Masukkan Kelas :");
        this.kelas = input.nextLine();
    }

    public void infoReguler() {
        System.out.println("========= Output Data =========");
        System.out.println("Nama: " + nama );
        System.out.println("nim: " + nim);
        System.out.println("Kelas: " +kelas);
        System.out.println("===============================");
    }
}

