package com.mycompany.modul3;
import java.util.Scanner;

public class Mahasiswa {
    public String nama;
    public String nim;
    
    public Mahasiswa(Scanner input){
        System.out.println("\n========= Intput Data =========");
        System.out.print("Masukkan nama: ");
        this.nama=input.nextLine();
        System.out.print("Masukkan nim: ");
        this.nim=input.nextLine();
    }
    public void infoMahasiswa(){
        System.out.println("nama "+ nama);
        System.out.println("nim "+ nim);
    }
}

